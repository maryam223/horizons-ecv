<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\BudgetTotalController;
use App\Http\Controllers\DashboardController;

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


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');;

    Route::get('/agenda', [FullCalenderController::class, 'index']);
    Route::post('/store', [EventController::class, 'store'])->name('eventStore');
    Route::get('/index', [EventController::class, 'index'])->name('allEvent');

    Route::get('/add-document', [DocumentController::class, 'uploadpage']);
    Route::post('/uploaddocument', [DocumentController::class, 'store']);
    Route::get('/documents', [DocumentController::class, 'show']);
    Route::get('/download/{file}', [DocumentController::class, 'download']);
    Route::get('/view/{id}', [DocumentController::class, 'view']);
    Route::get('/delete/{id}', [DocumentController::class, 'delete']);

    Route::get('/budget/{id}', [BudgetController::class, 'index']);
    Route::post('/storebudget/{id}', [BudgetController::class, 'store']);

    Route::get('/newbudget', [BudgetTotalController::class, 'index']);
    Route::post('/storenewbudget', [BudgetTotalController::class, 'store']);

});

Route::get('/random-country', function () {
    return view('random-country');
});

Route::get('/notes', function () {
    return view('notes');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});


