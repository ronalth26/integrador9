<?php

use Illuminate\Support\Facades\Route;
//Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DiscapacitadoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
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
});


Route::get('usuarios.createEspecialista', [UsuarioController::class, 'createEspecialista'])->name('usuarios.createEspecialista');

Route::get('/index-discapacitado', [DiscapacitadoController::class,'index'])->name('discapacitado.index');
Route::get('/index-especialista', [EspecialistaController::class,'index'])->name('especialista.index');


Route::get('/register-especialista', function () {
    return view('auth.registerEspecialista');
})->name('register-especialista');