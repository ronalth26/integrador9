<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipoDiscapacidad;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Config;

class DiscapacitadoController extends Controller
{
    protected $notificationService;
    private $msg;
    /**
     * Constructor de la clase DiscapacitadoController.
     *
     * @param NotificationService $notificationService
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->msg = Config::get('strings.messages');
    }
    
    /**
     * Muestra la lista de tipos de discapacidades en la vista de registro.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tipoAll = TipoDiscapacidad::all();
        $tipoDiscapacidad = $tipoAll->pluck('nombre', 'id')->toArray();
        return view('auth.register', compact('tipoDiscapacidad'));
    }
}
