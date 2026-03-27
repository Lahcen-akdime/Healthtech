<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\RefreshTokenController;
use App\Http\Controllers\TraitementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome');});
Route::get('generate/{id}',[TraitementController::class ,'getPdf']);
Route::post('refresh_token',[RefreshTokenController::class,'refresh']);

