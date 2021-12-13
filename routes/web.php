<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldstaffController;
use App\Http\Controllers\KantahController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StagesController;
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

Route::get('/', function () {
    return view('kanwil.index');
});

route::get('/dashboard',[DashboardController::class,'index']);
Route::resource('/kantah',KantahController::class);
Route::resource('/fieldstaff',FieldstaffController::class)->middleware('auth');
Route::resource('/laporan',ReportController::class)->middleware('auth');
Route::resource('/tahapan',StagesController::class)->middleware('auth');
Route::resource('/rencanaBulanan',PlanController::class)->middleware('auth');
