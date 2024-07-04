<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Seguimiento;
use App\Models\User;
use App\Services\NotificationService;
use App\Models\Sesion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class SeguimientoController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        // Obtener todos los seguimientos del especialista actual
        $seguimientos = Seguimiento::where('especialista_id', auth()->user()->id)->get();

        // Recorrer cada seguimiento para obtener el último número de sesión o establecerlo en 0 si no hay sesiones
        foreach ($seguimientos as $seguimiento) {
            // Obtener el máximo número de sesión para este seguimiento
            $ultimoNumeroSesion = Sesion::where('seguimiento_id', $seguimiento->id)
                ->max('numero');

            // Si no hay sesiones, establecer el último número de sesión en 0
            $seguimiento->ultimo_numero_sesion = $ultimoNumeroSesion ?? 0;
            $ultimaSesion = Sesion::where('seguimiento_id', $seguimiento->id)
                ->orderBy('fecha_fin', 'desc')
                ->first();

            // Si existe una última sesión, asignar su fecha fin como la siguiente sesión; de lo contrario, establecer como "-"
            $seguimiento->sesion_siguiente = $ultimaSesion ? $ultimaSesion->fecha_fin : '-';
        }

        // Devolver la vista con los seguimientos y sus últimos números de sesión
        return view('seguimientos.index', compact('seguimientos'));
    }


    public function create(Request $request)
    {
        // Obtener los contactos donde el usuario autenticado es el emisor con estado_id igual a 2
        $contactosComoEmisor = Contacto::where('id_emisor', auth()->user()->id)
            ->where('estado_id', 2)
            ->pluck('id_receptor');

        // Obtener los contactos donde el usuario autenticado es el receptor con estado_id igual a 2
        $contactosComoReceptor = Contacto::where('id_receptor', auth()->user()->id)
            ->where('estado_id', 2)
            ->pluck('id_emisor');

        // Combinar ambas listas de IDs en una sola colección y eliminar duplicados
        $idsAmigos = $contactosComoEmisor->merge($contactosComoReceptor)->unique();

        // Obtener los detalles de los usuarios que son amigos
        $pacientes = User::whereIn('id', $idsAmigos)->get(['id', 'name', 'ape_pat']);
        $fechaActual = date('Y-m-d');

        $view = view('seguimientos.modal.create', compact('pacientes', 'fechaActual'));

        // Si la solicitud es ajax, retornar la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre_paciente' => 'required|exists:users,id',
            'observaciones' => 'required',
            'medicacion' => 'required',
            'diagnostico' => 'required',
            'fecha_inicio' => 'required|date',
        ]);

        // Crear el seguimiento
        $seguimiento = new Seguimiento();
        $seguimiento->paciente_id = $request->nombre_paciente;
        $seguimiento->especialista_id = auth()->user()->id; // Opcional: si el especialista está autenticado
        $seguimiento->observaciones = $request->observaciones;
        $seguimiento->medicacion = $request->medicacion;
        $seguimiento->diagnostico = $request->diagnostico;
        $seguimiento->fecha_inicio = $request->fecha_inicio;
        $seguimiento->estado = 1; // Estado inicial del seguimiento, asume que 1 es un estado válido
        $seguimiento->save();

        // Crear la primera sesión
        // $sesion = new Sesion();
        // $sesion->numero = 1; // Número de sesión inicial
        // $sesion->seguimiento_id = $seguimiento->id;
        // $sesion->fecha_inicio = $request->fecha_inicio;
        // $sesion->fecha_fin = $request->fecha_inicio;
        // Puedes ajustar estos campos según tus necesidades
        // $sesion->save();

        $this->notificationService->success('Seguimiento creado correctamente');

        return redirect()->route('seguimientos.index');
    }

    public function show($sesione)
    {
    
    }
}
