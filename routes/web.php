<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;

Route::get('/', [
    VerificationController::class, 'index'
]);


Route::post('/submit-id-card-no', [
    VerificationController::class, 'submit'
])->name('submit-id-card-no');
