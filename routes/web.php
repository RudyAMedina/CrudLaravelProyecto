<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorCrud;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('post/create', [ControladorCrud::class, 'create']);
Route::get('post/{post}/edit', [ControladorCrud::class, 'edit']);
Route::post('post', [ControladorCrud::class, 'store']);
Route::put('post/{post}', [ControladorCrud::class, 'update']);
Route::delete('post/{post}', [ControladorCrud::class, 'destroy']);

Route::post('post', [ControladorCrud::class, 'store'])->name('store');




Route::resource('categories', CategoryController::class);