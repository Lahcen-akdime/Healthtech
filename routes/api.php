<?php

use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenMiddlware;
use Illuminate\Support\Facades\Route;
Route::middleware(TokenMiddlware::class)->group(function () {
    Route::apiResource('traitement',TraitementController::class);
    Route::apiResource('medicament',MedicamentsController::class); 
});

Route::controller(UserController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/refresh','refresh');
    Route::post('/logout','logout');
});
