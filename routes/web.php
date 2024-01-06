<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

// Route::get('/table', function () {
//     return view('table');
// });
Route::get('/',[FormController::class,'index']);
Route::post('/add_data',[FormController::class,'add_data']);
Route::get('/table',[FormController::class,'view']);
Route::get('/deletetable/{id}', [FormController::class, 'deletetable']);
Route::get('/view/edit/{id}', [FormController::class, 'edit']);
Route::post('/update/{id}',[FormController::class,'update']);
// Route::get('/view/update/{id}',[FormController::class,'update']);

