<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Especialista;
use App\Models\Discapacitado;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ape_pat' => ['nullable', 'string', 'max:255'],
            'ape_mat' => ['nullable', 'string', 'max:255'],
            'fec_nacimiento' => ['nullable', 'date'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'conadis_number' => ['nullable', 'string', 'max:255'],
            'id_tipo' => ['nullable'],
            'grado' => ['nullable', 'string', 'max:255'],
            'tipo_id' => ['nullable'],
            'licencia' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'ape_pat' => $data['ape_pat'],
                'ape_mat' => $data['ape_mat'],
                'fec_nacimiento' => $data['fec_nacimiento'],
                'direccion' => $data['direccion'],
                'password' => Hash::make($data['password']),
            ]);

            if (!$user) {
                throw new \Exception('Error al crear el usuario.');
            }

            // Asignación de roles según tipo
            $this->assignRoleByType($user, $data);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Asigna roles según el tipo de usuario.
     *
     * @param  \App\Models\User  $user
     * @param  array  $data
     * @return void
     */
    private function assignRoleByType(User $user, array $data)
    {
        $tipo = isset($data['tipo']) ? $data['tipo'] : 2; // Ajusta según tus necesidades

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        if ($tipo == 3) {
            Discapacitado::create([
                'id' => $data['conadis_number'],
                'id_user' => $user->id,
                'id_tipo' => $data['id_tipo'],
                'grado' => $data['grado'],
            ]);

            $user->assignRole('Discapacitado');
        } elseif ($tipo == 2) {
            Especialista::create([
                'id_user' => $user->id,
                'tipo_id' => $data['tipo_id'],
                'licencia' => $data['licencia'],
            ]);

            $user->assignRole('Especialista');
        }
    }
}
