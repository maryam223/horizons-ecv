<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FullCalenderController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [IndexController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/random-country', function () {
    return view('random-country');
});

Route::get('/notes', function () {
    return view('notes');
});

Route::get('/agenda', function () {
    return view('agenda');
});

Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::get('/uploadpage', [DocumentController::class, 'uploadpage']);
Route::post('/uploaddocument', [DocumentController::class, 'store']);
Route::get('/showdocument', [DocumentController::class, 'show']);
Route::get('/download/{file}', [DocumentController::class, 'download']);
Route::get('/view/{id}', [DocumentController::class, 'view']);
Route::get('/delete/{id}', [DocumentController::class, 'delete']);
