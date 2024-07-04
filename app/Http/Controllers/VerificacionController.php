<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificacionController extends Controller
{
    public function index()
    {
        // Consulta utilizando Eloquent para obtener todas las revisiones
        $revisiones = User::select('revisions.id_revision','users.name as nombre', 'especialistas.licencia', 'revisions.hora', 'revisions.fecha', 'revisions.estado', 'revisions.pdf')
            ->join('especialistas', 'users.id', '=', 'especialistas.id_user')
            ->join('revisions', 'users.id', '=', 'revisions.id_especialista')
            ->get();

        return view('verificacion.index', compact('revisiones'));
    }

    public function update(Request $request, $id)
    {
        $nuevoEstado = $request->input('estado_revision');
    
        $revision = Revision::find($id);
    
        if (!$revision) {
            return response()->json(['success' => false, 'message' => 'Revisión no encontrada.'], 404);
        }
    
        // Actualizar el estado de la revisión
        $revision->estado = $nuevoEstado;
        $revision->save();
    
        return response()->json(['success' => true, 'message' => 'Estado de la revisión actualizado correctamente.']);
    }
    
}
