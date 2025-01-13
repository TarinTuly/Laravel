<?php

use App\Http\Controllers\CrudeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[CrudeController::class,'showData'])->name('show-data');
Route::get('/add-data',[CrudeController::class,'addData']);
Route::post('/store-data',[CrudeController::class,'storeData']);
Route::get('/edit-data/{id}',[CrudeController::class,'editData']);
//Route::post('/update-data/{id}',[CrudeController::class,'updateData']);
Route::post('/update-data/{id}',[CrudeController::class,'updateData'])->name('update-data');
Route::get('/delete-data/{id}',[CrudeController::class,'deleteData']);
