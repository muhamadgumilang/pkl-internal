<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//contoh
Route::get('/tentang', function () {
    return view('tentang');
});


//latihan 1
Route::get('/sapa/{nama}', function ($nama) {
   return "Halo, $nama! Selamat datang di Toko Online.";
});


//latihan 2
Route::get('/kategori/{nama?}', function ($nama = 'Semua') {
    return "Kategori komik: $nama";
});