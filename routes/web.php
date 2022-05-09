<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BudgetController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/agenda', [FullCalenderController::class, 'index']);
    Route::post('/store', [EventController::class, 'store'])->name('eventStore');
    Route::get('/index', [EventController::class, 'index'])->name('allEvent');

    Route::get('/add-document', [DocumentController::class, 'uploadpage']);
    Route::post('/uploaddocument', [DocumentController::class, 'store']);
    Route::get('/documents', [DocumentController::class, 'show']);
    Route::get('/download/{file}', [DocumentController::class, 'download']);
    Route::get('/view/{id}', [DocumentController::class, 'view']);
    Route::get('/delete/{id}', [DocumentController::class, 'delete']);

    Route::get('/budget', [BudgetController::class, 'index']);
    Route::post('/storebudget', [BudgetController::class, 'store']);

});

Route::get('/random-country', function () {
    return view('random-country');
});

Route::get('/notes', function () {
    return view('notes');
});


Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});


