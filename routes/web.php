<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\GatePassController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/report', action: [App\Http\Controllers\HomeController::class, 'report'])->name('report');

Route::resource('asset', AssetController::class);
Route::get('/pending', action: [GatePassController::class, 'pending'])->name('gate-passes.pending');
Route::resource('gate-passes', controller: GatePassController::class);
Route::resource('users', UserController::class);
Route::resource('dispatches', \App\Http\Controllers\DispatchController::class);

});
