<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\OperatorController;

Route::get('/', [
    VerificationController::class, 'homePageView'
])->name('home');

Route::get('/operator', [
    VerificationController::class, 'operatorView'
])->name('operator');

Route::post('/operator-sign-in', [
    VerificationController::class, 'operatorVerificationCheck'
])->name('operator-sign-in');

Route::get('/operator-documents/{approval}/{action}', [
    OperatorController::class, 'documentView'
])->name('operator-documents');

Route::get('/operator-add-billing/{approval}', [
    OperatorController::class, 'addBillingView'
])->name('operator-add-billing');

Route::get('/operator-billing', [
    OperatorController::class, 'billingView'
])->name('operator-billing');

Route::post('/submit-billing', [
    OperatorController::class, 'submitBilling'
])->name('submit-billing');

Route::get('/sign-out', [
    VerificationController::class, 'verificationFlush'
])->name('sign-out');

Route::get('/operator-dashboard', [
    OperatorController::class, 'dashboardView'
])->name('operator-dashboard');

Route::get('/operator-list', [
    OperatorController::class, 'operatorListView'
])->name('operator-list');

Route::get('/operator-detail/{user}', [
    OperatorController::class, 'operatorDetailView'
])->name('operator-detail');

Route::get('/add-operator', [
    OperatorController::class, 'operatorDetailView'
])->name('add-operator');

Route::post('/submit-operator', [
    OperatorController::class, 'submitOperator'
])->name('submit-operator');

Route::get('/operator-dashboard', [
    OperatorController::class, 'dashboardView'
])->name('operator-dashboard');

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