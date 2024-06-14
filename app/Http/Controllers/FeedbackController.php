<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\TipoFeedback;
use Illuminate\Http\Request;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Notifications\Notification;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class FeedbackController extends Controller
{
    protected $notificationService;
    private $msg;

    public function __construct(NotificationService $notificationService)
    {
        $this->middleware('can:usuarios')->only('index');
        $this->middleware('can:usuarios')->only('store');
        $this->middleware('can:usuarios')->only('destroy');
        $this->middleware('can:usuarios')->only('edit');
        $this->middleware('can:usuarios')->only('update');

        $this->notificationService = $notificationService;
        $this->msg = Config::get('strings.messages');
    }

    public function index()
    {
        $opcionesTransformadas = $this->opcionesTransformadas();

        return view('feedbacks.index', compact('opcionesTransformadas'));
    }

    public function opcionesTransformadas()
    {
        $opciones = TipoFeedback::all();
        $opcionesTransformadas = $opciones->pluck('nombre', 'id')->toArray();

        return $opcionesTransformadas;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required',
            'tipo' => 'required',
        ]);

        $input = $request->all();
        $input['id_user'] = Auth::id();
        $input['fecha'] = \Carbon\Carbon::now()->format('Y-m-d');
        $input['hora'] = \Carbon\Carbon::now()->format('H:i:s');
        $input['estado_feedback'] = 1; // Añade el campo 'estado_feedback'

        Feedback::create($input);

        $this->notificationService->success($this->msg['feedbackMsgSuccess']);

        // Marcar el formulario como enviado correctamente usando sesión flash
        Session::flash('feedbackStored', true);

        // Redirigir a la página de index de feedbacks
        return redirect()->route('feedbacks.index');
    }

    public function showHistorial($id)
    {
        $feedbacks = Feedback::with('estadoFeedback')
                            ->where('id_user', Auth::id())
                            ->get();

        $view = view('feedbacks.modal.showHistorial', compact('feedbacks'));

        if (request()->ajax()) {
            return response()->json(['html' => $view->render()]);
        } else {
            return $view;
        }
    }
    


}