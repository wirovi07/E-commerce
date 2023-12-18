<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.index');
});

Route::get('/detalle/{id}', function ($id) {
    return view('public.detalle')->with('id', $id);
});
