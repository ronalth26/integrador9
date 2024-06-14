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

class UsuarioController extends Controller
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
        $usuarios = User::where('estado', 1)->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {   
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.crear', compact('roles'));
    }

    public function createEspecialista()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('auth.registerEspecialista', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'

        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole('Discapacitado');

        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        // Implementa la lógica para mostrar un usuario específico
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name')->all();
        $view = view('usuarios.editar', compact('user', 'roles', 'userRole'));
        $view2 = view('usuarios.modal.editar', compact('user', 'roles', 'userRole'));
        if (request()->ajax()) {
            return response()->json(['html' => $view2->render()]);
        } else {
            return $view;
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $input = $request->all();


        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);
        $user->update($input);

        if ($request->has('roles')) {
            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($request->input('roles'));
        }

        $this->notificationService->success($this->msg['msg1']);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        User::where('id', $id)->update(['estado' => 0]);
        $this->notificationService->success($this->msg['alertDelete']);
        return redirect()->route('usuarios.index');
    }
}
