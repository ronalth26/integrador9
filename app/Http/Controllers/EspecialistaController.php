<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TipoDiscapacidad;
use App\Models\TipoEspecialista;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Config;

class EspecialistaController extends Controller
{
    protected $notificationService;
    private $msg;
    
    /**
     * Constructor de la clase EspecialistaController.
     *
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->msg = Config::get('strings.messages');
    }

    /**
     * Muestra la lista de tipos de especialistas en la vista de registro.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tipoAll = TipoEspecialista::all();
        $tipoEspecialista = $tipoAll->pluck('nombre', 'id')->toArray();
        return view('auth.registerEspecialista', compact('tipoEspecialista'));
    }
}
