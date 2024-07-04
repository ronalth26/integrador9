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

class SesionController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
    }


    public function create(Request $request)
    {

        $seguimiento_id = $request->seguimiento_id;
        $ultimo_numero_sesion = $request->ultimo_numero_sesion + 1;

        // // Obtener los contactos donde el usuario autenticado es el emisor con estado_id igual a 2
        // $contactosComoEmisor = Contacto::where('id_emisor', auth()->user()->id)
        //     ->where('estado_id', 2)
        //     ->pluck('id_receptor');
        $fechaActual = date('Y-m-d');

        $view = view('sesiones.modal.create', compact('seguimiento_id', 'fechaActual', 'ultimo_numero_sesion'));


        // Si la solicitud es ajax, retornar la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }

    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'seguimiento_id' => 'required|integer',
            'numero' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'medicacion' => 'required|string',
            'diagnostico' => 'required|string',
            'observaciones' => 'required|string',
            // Añadir más validaciones según necesites
        ]);


        // Crear nueva sesión
        $sesion = new Sesion([
            'seguimiento_id' => $request->seguimiento_id,
            'numero' => $request->numero,
            'fecha_inicio' => $request->fecha_inicio,
            'medicación' => $request->medicacion,
            'diagnóstico' => $request->diagnostico,
            'observaciones' => $request->observaciones,
            'fecha_fin' => $request->fecha_fin,
            'resultado' => $request->resultados,
            // Añadir más campos si es necesario
        ]);

        if ($request->numero == 1) {
            $seguimiento = Seguimiento::findOrFail($request->seguimiento_id);
            $seguimiento->estado = 3; // Estado de diagnóstico
            $seguimiento->save();
        }

        // Guardar la sesión
        $sesion->save();
        $this->notificationService->success('Sesión creado correctamente');
        // Redireccionar a donde desees después de guardar
        return redirect()->route('seguimientos.index');
    }

    public function update(Request $request)
    {
        $seguimiento = Seguimiento::findOrFail($request->seguimiento_id);
        $seguimiento->estado = 4; // Estado de diagnóstico
        $seguimiento->save();
        return redirect()->route('seguimientos.index');
    }

    public function destroy($sesione)
    {
        $seguimiento = Seguimiento::findOrFail($sesione);
        $seguimiento->estado = 4; // Estado de finalizado
        $seguimiento->save();

        return redirect()->route('seguimientos.index');
    }
    public function show($sesione)
    {
        $sesiones = Sesion::where('seguimiento_id', $sesione)->get();
        $view = view('sesiones.modal.show', compact('sesiones'));
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }
}
