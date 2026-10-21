<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/categoria", CategoriaController::class);
Route::resource("/producto", ProductoController::class);
Route::get("/pdfProductos", [PdfController::class, 'pdfProductos'])->name('pdf.productos');