<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class SeguimientoController extends Controller
{
    public function index()
    {

        // return view('posts.index', compact('posts'));
        return view('seguimientos.index');
    }

    
    public function create(Request $request)
    {
        
        // Obtener los contactos donde el usuario autenticado está como emisor o receptor y el estado es 2 (aceptado)
        // $contactos = Contacto::where(function ($query) {
        //     $query->where('id_emisor', auth()->user()->id)
        //           ->where('estado_id', 2);
        // })->orWhere(function ($query) {
        //     $query->where('id_receptor', auth()->user()->id)
        //           ->where('estado_id', 2);
        // })->get();

        // Renderizar la vista de lista de contactos
        $view = view('seguimientos.modal.create');

        // Si la solicitud es ajax, retornar la vista renderizada en formato JSON
        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }
}