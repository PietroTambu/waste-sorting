<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CollectionsController;

Route::get('/', function () {
    $title = 'Home Page';
    return view('index', compact('title'));
});

Route::get('/daily', [CollectionsController::class, 'showDaily']);
Route::get('/weekly', [CollectionsController::class, 'showWeekly']);

Route::get('/change/create', function () {
    $title = 'Create Collection';
    return view('change/create', compact('title'));
});
Route::post('/change/create', [CollectionsController::class, 'insertData']);

Route::get('/change/update', function () {
    $title = 'Change Collection';
    return view('change/update', compact('title'));
});

Route::get('/change/delete', [CollectionsController::class, 'deleteData']);
