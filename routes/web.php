<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EntregaController;

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

Route::get('/', [LoginController::class, 'index']);
Route::redirect('/', '/login');

Route::get('/register', function () {
    return view('login.register');
});
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('login.index');
});
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::resource('entregas', EntregaController::class)->middleware('auth');
Route::post('/entrega', [EntregaController::class, 'index'])->name('entregas');
Route::get('/entrega', [EntregaController::class, 'index'])->name('entregas');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Você saiu com sucesso!');
})->name('logout');
