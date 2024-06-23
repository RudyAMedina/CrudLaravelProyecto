<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCrud;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('post', ControladorCrud::class);

Route::resource('categories', CategoryController::class);