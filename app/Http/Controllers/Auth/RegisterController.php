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
        $tipo = isset($data['tipo']) ? $data['tipo'] : 2;

        $userNew = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'ape_pat' => $data['ape_pat'],
            'ape_mat' => $data['ape_mat'],
            'fec_nacimiento' => $data['fec_nacimiento'],
            'direccion' => $data['direccion'],
            'password' => Hash::make($data['password']),
        ]);

        DB::table('model_has_roles')->where('model_id', $userNew->id)->delete();

        if ($tipo == 3) {
            Discapacitado::create([
                'id' => $data['conadis_number'],
                'id_user' => $userNew->id,
                'id_tipo' => $data['id_tipo'],
                'grado' => $data['grado'],
            ]);

            $userNew->assignRole('Discapacitado');
        } elseif ($tipo == 2) {

            Especialista::create([
                'id_user' => $userNew->id,
                'tipo_id' => $data['tipo_id'],
                'licencia' => $data['licencia'],
            ]);
            $userNew->assignRole('Especialista');
        }

        return $userNew;
    }
}
