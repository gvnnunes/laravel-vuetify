<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/esqueceu-senha', [PasswordResetController::class, 'sendResetPasswordLink'])->name('password.forgot');
Route::get('/recuperar-senha/{token}', [PasswordResetController::class, 'index'])->name('password.reset');
Route::post('/recuperar-senha', [PasswordResetController::class, 'update'])->name('password.update');
Route::post('revalidar-token', [AuthController::class, 'revalidarCsrfToken'])->name('auth.revalidar.token');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
