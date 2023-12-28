<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $categoria = $request->get('categoria');
    $nombre = $request->get('nombre');
    return view('public.index', compact('categoria', 'nombre'));
});

Route::get('/detalle/{id}', function ($id) {
    return view('public.detalle')->with('id', $id);
});

Route::get('/carrito', function () {
    return view('public.carrito');
})->name('carrito');

Route::get('/categoria', function () {
    return view('public.categoria');
})->name('categoria');
