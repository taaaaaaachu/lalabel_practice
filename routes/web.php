<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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

// お問合せフォーム
Route::get('/form', [FormController::class, 'index'])->name('form');
Route::post('/form/confirm', [FormController::class, 'sendMail']);
Route::get('/form/confirm', [FormController::class, 'confirm'])->name('form.confirm');
Route::get('/form/complete', [FormController::class, 'complete'])->name('form.complete');