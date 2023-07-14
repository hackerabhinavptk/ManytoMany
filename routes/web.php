<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\RegionController;

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

Route::get('/store/add', [StoreController::class, 'form']);
Route::post('/store/add', [StoreController::class, 'submit_store']);

Route::get('/region/add', [RegionController::class, 'form']);
Route::post('/region/add', [RegionController::class, 'submit_region']);

Route::get('/store/addrelation', [StoreController::class, 'relation_form']);
Route::post('/store/addrelation', [StoreController::class, 'submit']);

Route::get('/region/addrelation', [RegionController::class, 'relation_form']);
Route::post('/region/addrelation', [RegionController::class, 'submit']);
