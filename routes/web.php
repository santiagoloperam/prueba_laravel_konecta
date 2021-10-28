<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClienteController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->middleware('can:dashboard')->name('dashboard');

Route::resource('users',UserController::class)->middleware('can:admin.users.index')->names('admin.users');

Route::resource('clientes',ClienteController::class)->middleware('can:admin.clientes.index')->names('admin.clientes'); // El middleware lo puedo hacer con un solo permiso del superuser para no generar varios seeders con nuevos crud de permisos y migrar repetidamente (can:super.users.index)
