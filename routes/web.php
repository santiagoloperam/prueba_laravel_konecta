<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\UserController as SUserController;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->middleware('can:dashboard')->name('dashboard');

Route::resource('users',SUserController::class)->middleware('can:super.users.index')->names('superadmin.users');
