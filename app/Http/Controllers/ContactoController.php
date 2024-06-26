<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ContactoController extends Controller
{
    protected $notificationService;
    private $msg;
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->msg = Config::get('strings.messages');
    }

    public function index(Request $request)
    {
        // Construir la consulta inicial filtrando por usuarios activos y roles específicos
        $query = User::where('estado', 1)
            ->whereHas('roles', function ($query) use ($request) {
                if ($request->has('filter_role') && $request->filter_role != '') {
                    // Filtrar por rol específico si se proporciona un filtro
                    $query->where('name', $request->filter_role);
                } else {
                    // Si no se proporciona filtro de rol, incluir roles 'especialista' y 'discapacitado'
                    $query->whereIn('name', ['especialista', 'discapacitado']);
                }
            });

        // Aplicar filtro de búsqueda por nombre de usuario si se proporciona
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Obtener todos los usuarios que cumplen con los criterios de la consulta
        $usuarios = $query->with('roles')->get();

        // Obtener los IDs de los contactos encontrados para el usuario autenticado
        $contacto_encontrado = Contacto::where('id_emisor', auth()->user()->id)
            ->where('estado_id', '!=', 2) // Excluir estados de contacto 'eliminado' u otros específicos
            ->pluck('id_receptor');

        // Excluir al usuario autenticado de la lista de usuarios para enviar solicitud de amistad
        $usuarios = $usuarios->reject(function ($usuario) {
            return $usuario->id === auth()->user()->id;
        });

        // Pasar los datos a la vista 'contactos.index'
        return view('contactos.index', compact('usuarios', 'contacto_encontrado'));
    }


    // Función para almacenar una nueva solicitud de contacto
    public function store(Request $request)
    {
        request()->validate([
            'mensaje' => 'required',
        ]);

        // Agregar la fecha y hora actual y el ID del usuario autenticado al request
        $request->merge([
            'id_emisor' => Auth::id(),
            'fecha_envio' => now(),
            'estado_id' => 1
        ]);

        Contacto::create($request->all());

        $usuarios = User::where('estado', 1)
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['especialista', 'discapacitado']);
            })
            ->with('roles')
            ->get();

        $this->notificationService->success('Solicitud enviada correctamente');

        return redirect()->route('contactos.index', compact('usuarios'));
    }

    // Función para mostrar el modal de contacto
    public function show($id)
    {
        $usuario = User::find($id);
        $view = view('contactos.modal.contact', compact('usuario'));

        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }

    // Función para mostrar las solicitudes de contacto pendientes
    public function solicitud(Request $request)
    {
        // Obtén las solicitudes del usuario autenticado que están en estado 0
        $solicitudes = Contacto::where('id_receptor', auth()->user()->id)
            ->where('estado_id', 1)
            ->get();

        // Crea la vista con las solicitudes
        $view = view('contactos.modal.solicitud', compact('solicitudes'));

        // Si la solicitud es ajax, retorna la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }


    // Función para actualizar el estado de una solicitud de contacto
    public function estado($id, $opcion)
    {
        $emisor = Contacto::where('id_receptor', auth()->user()->id)
            ->where('id_emisor', $id)
            ->where('estado_id', 1)
            ->first();

        if ($emisor) {
            $emisor->update(['fecha_revision' => now()]);
            $emisor->update(['estado_id' => $opcion]);
        }

        $usuarios = $this->visualizarContactos();

        $this->notificationService->success('Solicitud aceptada correctamente');

        return redirect()->route('contactos.index', compact('usuarios'));
    }

    public function visualizarContactos()
    {
        // Obtener los IDs de los usuarios que ya tienen contacto aceptado (ya sea como receptor o emisor) con el usuario autenticado
        $contactosAceptadosReceptor = Contacto::where('id_receptor', auth()->user()->id)
            ->where('estado_id', 2) // Estado 2 significa contacto aceptado
            ->pluck('id_emisor')
            ->toArray();

        $contactosAceptadosEmisor = Contacto::where('id_emisor', auth()->user()->id)
            ->where('estado_id', 2) // Estado 2 significa contacto aceptado
            ->pluck('id_receptor')
            ->toArray();

        $contactosAceptados = array_merge($contactosAceptadosReceptor, $contactosAceptadosEmisor);

        // Obtener usuarios activos que sean especialistas o discapacitados y no estén en la lista de contactos aceptados
        $usuarios = User::where('estado', 1)
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['especialista', 'discapacitado']);
            })
            ->whereNotIn('id', $contactosAceptados) // Excluir usuarios que ya están en la lista de contactos aceptados
            ->with('roles')
            ->get();


        // dd($usuarios);
        return $usuarios;
    }

    public function showListaContactos(Request $request)
    {
        // Obtener los contactos donde el usuario autenticado está como emisor o receptor y el estado es 2 (aceptado)
        $contactos = Contacto::where(function ($query) {
            $query->where('id_emisor', auth()->user()->id)
                  ->where('estado_id', 2);
        })->orWhere(function ($query) {
            $query->where('id_receptor', auth()->user()->id)
                  ->where('estado_id', 2);
        })->get();

        // Renderizar la vista de lista de contactos
        $view = view('contactos.modal.listaContactos', compact('contactos'));

        // Si la solicitud es ajax, retornar la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }
}
