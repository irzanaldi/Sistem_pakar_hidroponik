<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnsurController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\BagianTumbuhanController;
use App\Http\Controllers\KesimpulanController;
use App\Http\Controllers\WelcomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/formlogin', [UserController::class, 'FormLogin'])->name('FormLogin');
// Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('actionlogin', [UserController::class, 'actionlogin'])->name('actionlogin');
Route::get('/dassboard', [UserController::class, 'dassboard'])->name('dassboard');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::resource('gejala', GejalaController::class);
Route::resource('kesimpulan', KesimpulanController::class);
Route::resource('tanaman', TanamanController::class);
Route::put('tanaman-update/{id}', [TanamanController::class, 'update'])->name('update');
Route::resource('unsur', UnsurController::class);
Route::resource('bagian', BagianTumbuhanController::class);
Route::delete('tanaman-destroy/{id}', [TanamanController::class, 'delete'])->name('tanaman.destroy');
