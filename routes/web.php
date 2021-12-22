<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KantahController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldstaffController;
use App\Models\Fieldstaff;
use GuzzleHttp\Middleware;

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
    return redirect()->intended('/login');
});
Route::get('dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
route::get('/', [AuthController::class, 'index']);
Route::get('/dataLaporan/cetak', [ReportController::class, 'cetak'])->middleware('auth');
Route::get('/dataRencana/cetak', [PlanController::class, 'cetak'])->middleware('auth');
Route::get('/dataKantah/{id}/detail', [KantahController::class, 'detKantah'])->middleware('auth');
Route::get('/dataFieldstaff/{id}/detail', [FieldstaffController::class, 'detFieldstaff'])->middleware('auth');
route::get('/editAkun', [UserController::class, 'editAkun'])->middleware('auth');
Route::resource('/dataKantah', KantahController::class)->middleware('kanwil');
Route::resource('/dataFieldstaff', FieldstaffController::class)->middleware('auth');
Route::resource('/dataLaporan', ReportController::class)->middleware('auth');
Route::resource('/dataTahapan', StagesController::class)->middleware('auth');
Route::resource('/dataRencana', PlanController::class)->middleware('auth');
