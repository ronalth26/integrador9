<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Config;

class PermisosController extends Controller
{
    protected $notificationService;
    private $msg;
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->msg = Config::get('strings.messages');
    }
    public function index()
    {
        $usuarios = User::where('estado', 1)->paginate(100);
        return view('permisos.index', compact('usuarios'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->feedback = $request->input('feedback');
        $usuario->consulta = $request->input('consulta');
        $usuario->post = $request->input('post');
        $usuario->save();

        return redirect()->route('permisos.index')->with('success', 'Usuario actualizado correctamente.');
    }
}