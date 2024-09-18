<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ApprovalController;

Route::get('/', [
    VerificationController::class, 'homePageView'
])->name('home');

Route::post('/submit-id-card-no', [
    VerificationController::class, 'verificationCheck'
])->name('submit-id-card-no');

Route::get('/add-approval', [
    ApprovalController::class, 'addApprovalView'
])->name('add-approval');

Route::post('/submit-add-approval', [
    ApprovalController::class, 'addApproval'
])->name('submit-add-approval');

Route::get('/approval-list', [
    ApprovalController::class, 'listApprovalView'
])->name('approval-list');