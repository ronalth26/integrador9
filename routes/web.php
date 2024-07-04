<?php

use App\Http\Controllers\SeguimientoController;
use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DiscapacitadoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EstadosController;
use App\Models\Feedback;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('feedbacks/showHistorial/{id}', [FeedbackController::class, 'showHistorial'])->name('feedbacks.showHistorial')->middleware('auth');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BLogController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('contactos', ContactoController::class);
    Route::resource('posts', PostController::class);
    Route::resource('estados', EstadosController::class);
    Route::resource('seguimientos', SeguimientoController::class);
});





Route::get('usuarios.createEspecialista', [UsuarioController::class, 'createEspecialista'])->name('usuarios.createEspecialista');

Route::get('/personalizar/{id}', [UsuarioController::class, 'personalizar'])->name('usuarios.personalizar');

Route::get('/index-discapacitado', [DiscapacitadoController::class,'index'])->name('discapacitado.index');
Route::get('/index-especialista', [EspecialistaController::class,'index'])->name('especialista.index');

Route::get('/contactos/{id}', [ContactoController::class,'show'])->name('contactos.show');
Route::get('/contactos/solicitud/{id}', [ContactoController::class, 'solicitud'])->name('contactos.solicitud');
Route::get('/contactos/showListaContactos/{id}', [ContactoController::class, 'showListaContactos'])->name('contactos.showListaContactos');

Route::get('/contactos/estado/{id}/{opcion}', [ContactoController::class,'estado'])->name('contactos.estado');

Route::get('/register-especialista', function () {
    return view('auth.registerEspecialista');
})->name('register-especialista');

