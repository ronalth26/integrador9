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
        $query = User::where('estado', 1)
            ->whereHas('roles', function ($query) use ($request) {
                if ($request->has('filter_role') && $request->filter_role != '') {
                    $query->where('name', $request->filter_role);
                } else {
                    $query->whereIn('name', ['especialista', 'discapacitado']);
                }
            });

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $usuarios = $query->with('roles')->get();

        $contacto_encontrado = Contacto::where('id_emisor', auth()->user()->id)
            ->where('estado', '!=', 2)
            ->pluck('id_receptor');


        return view('contactos.index', compact('usuarios','contacto_encontrado'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'mensaje' => 'required',
        ]);

        // Obtener la fecha y hora actual
        $fechaHoraActual = now();

        // Obtener el ID del usuario autenticado
        $id_emisor = Auth::id();
        // Agregar la fecha y hora actual y el ID del usuario autenticado al request
        $request->merge([
            'id_emisor' => $id_emisor,
            'fecha_envio' => $fechaHoraActual
        ]);

        Contacto::create($request->all());

        $usuarios = User::where('estado', 1)
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['especialista', 'discapacitado']);
            })
            ->with('roles')
            ->get();
        $this->notificationService->success('Solicitud enviado correctamente');

        return redirect()->route('contactos.index', compact('usuarios'));
    }

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
}
