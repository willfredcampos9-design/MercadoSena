<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('index');
});

Route::resource('categorias', CategoriaController::class);
