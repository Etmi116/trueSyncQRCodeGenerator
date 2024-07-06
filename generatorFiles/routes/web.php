<?php

use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QRCodeController::class, 'index'])->name('index');
Route::post('/generate', [QRCodeController::class, 'generate'])->name('generate');
Route::get('/scan/{id}', [QRCodeController::class, 'scan'])->name('scan');
