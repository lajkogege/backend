<?php

use App\Http\Controllers\KepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
   
    return $request->user();
})->middleware('auth:sanctum');

Route::get('file-upload', [KepController::class, 'index'])->name('file.upload');
Route::post('file-upload', [KepController::class, 'store'])->name('file.upload.store');