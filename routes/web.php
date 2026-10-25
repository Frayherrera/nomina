<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/gestion', function () {
    return view('gestion');
})->name('gestion');

Route::prefix('demo')->name('demo.')->group(function () {
    Route::view('/', 'demo.inicio')->name('inicio');
    Route::view('/carga', 'demo.carga')->name('carga');
    Route::view('/cruce', 'demo.cruce')->name('cruce');
    Route::view('/hallazgos', 'demo.hallazgos')->name('hallazgos');
    Route::view('/informe', 'demo.informe')->name('informe');
});
