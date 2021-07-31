<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CollectionsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/daily', [CollectionsController::class, 'showDaily']);
Route::get('/weekly', [CollectionsController::class, 'showWeekly']);

Route::get('/change/create', function () { return view('change/create'); });
Route::post('/change/create', [CollectionsController::class, 'insertData']);

Route::get('/change/update', function () { return view('change/update'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
