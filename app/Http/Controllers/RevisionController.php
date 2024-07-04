<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class RevisionController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Consulta utilizando Eloquent para obtener las revisiones del usuario actual
        $revisiones = User::select('users.name as nombre', 'especialistas.licencia', 'revisions.hora', 'revisions.fecha', 'revisions.estado', 'revisions.pdf')
            ->join('especialistas', 'users.id', '=', 'especialistas.id_user')
            ->join('revisions', 'users.id', '=', 'revisions.id_especialista')
            ->where('revisions.id_especialista', $userId)
            ->where('users.id', $userId)
            ->get();

        return view('revision.index', compact('revisiones'));
    }

    public function upload(Request $request)
    {
        // Validación del archivo PDF
        $request->validate([
            'pdfFile' => 'required|mimes:pdf|max:2048', // PDF requerido, máximo 2MB
        ]);

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Guardar el archivo PDF en el almacenamiento
        $file = $request->file('pdfFile');
        $fileName = $file->getClientOriginalName();

        // Verificar y crear la carpeta 'uploads' si no existe
        $uploadPath = public_path('uploads');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Mover el archivo a la carpeta 'uploads'
        $file->move($uploadPath, $fileName);

        // Crear una nueva revisión con los datos necesarios
        Revision::create([
            'id_especialista' => $userId,
            'hora' => Carbon::now()->toTimeString(), // Hora actual en formato HH:MM:SS
            'fecha' => Carbon::now()->toDateString(), // Fecha actual en formato YYYY-MM-DD
            'estado' => 'Pendiente', // Estado inicial
            'pdf' => $fileName, // Nombre del archivo PDF guardado
        ]);

        return redirect()->back()->with('success', 'Archivo PDF subido exitosamente.');
    }
}
