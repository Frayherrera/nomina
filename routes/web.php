<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/empleados', function () {
    return view('empleados');
})->name('empleados');

Route::get('/parametros', function () {
    return view('parametros');
})->name('parametros');

Route::get('/periodos', function () {
    return view('periodos');
})->name('periodos');

Route::get('/usuarios', function () {
    return view('usuarios');
})->name('usuarios');

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
