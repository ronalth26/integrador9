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
                'ape_pat' => $data['ape_pat'] ?? null,
                'ape_mat' => $data['ape_mat'] ?? null,
                'fec_nacimiento' => $data['fec_nacimiento'] ?? null,
                'direccion' => $data['direccion'] ?? null,
                'password' => Hash::make($data['password']),
            ]);

            if (!$user) {
                throw new \Exception('Error al crear el usuario.');
            }

            // Asignación de roles
            $this->assignRoleByType($user, $data);

            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    private function assignRoleByType(User $user, array $data)
    {
        $tipo = isset($data['tipo']) ? $data['tipo'] : 2;

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
