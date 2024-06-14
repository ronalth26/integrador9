<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Config;

class EstadosController extends Controller
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
        $feedbacks = Feedback::all();
        return view('estados.index', compact('feedbacks'));
    }

    public function update(Request $request, $id)
    {
        $nuevoEstado = $request->input('estado_feedback');

        $feedback = Feedback::find($id);
        if ($feedback) {
            $feedback->estado_feedback = $nuevoEstado;
            $feedback->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'No se pudo encontrar el feedback']);
    }

}