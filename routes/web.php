<?php

use App\Http\Controllers\DonationPdfController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/donaciones/{donation}/preview', [DonationPdfController::class, 'preview'])
        ->name('donaciones.preview');

    Route::get('/donaciones/{donation}/pdf/certificado', [DonationPdfController::class, 'certificado'])
        ->name('donaciones.pdf.certificado');

    Route::get('/donaciones/{donation}/pdf/soporte', [DonationPdfController::class, 'documentoSoporte'])
        ->name('donaciones.pdf.soporte');
});