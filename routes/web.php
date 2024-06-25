<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCrud;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('posts', ControladorCrud::class);
Route::put('posts/{post}', [ControladorCrud::class, 'update']);
Route::resource('categories', CategoryController::class);