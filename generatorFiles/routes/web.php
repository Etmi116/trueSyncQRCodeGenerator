<?php

use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'home'])->name('home');//base page
Route::get('/menu',[homeController::class, 'menu'])->name('menu');//list of generated codes
Route::get('/index/{id?}/{title?}', [QRCodeController::class, 'index'])->name('index');//qr code generator

Route::get('/scan/{id}', [QRCodeController::class, 'scan'])->name('scan');//scan route

Route::post('/generate', [QRCodeController::class, 'generate'])->name('generate');//generate route
Route::post('/download/{id}', [QRCodeController::class, 'download'])->name('download');
Route::post('/edit/{id}', [QRCodeController::class, 'edit'])->name('edit');
Route::post('/delete/{id}', [QRCodeController::class, 'delete'])->name('delete');