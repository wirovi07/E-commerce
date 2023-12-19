<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});

Route::get('/carrito', function () {
    return view('public.carrito');
})->name('carrito');

Route::get('/detalle/{id}', function ($id) {
    return view('public.detalle')->with('id', $id);
});
