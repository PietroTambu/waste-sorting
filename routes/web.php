<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GarbageController;

Route::get('/', function () {
    $title = 'Home Page';
    return view('index', compact('title'));
});

Route::get('/daily', [GarbageController::class, 'showDaily']);

Route::get('/weekly', [GarbageController::class, 'showWeekly']);

Route::get('/change/create', [GarbageController::class, 'showCreateSchedule']);

Route::get('/seedDB', [GarbageController::class, 'seedDB']);

Route::get('/change/delete/{id}', [GarbageController::class, 'deleteSchedule']);

Route::get('/change/update/{id}', [GarbageController::class, 'showUpdateSchedule']);

Route::post('/change/create', [GarbageController::class, 'storeSchedule']);

Route::post('/change/update', [GarbageController::class, 'updateSchedule']);
