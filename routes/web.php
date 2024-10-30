<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\LocationController;
use App\Http\Middleware\OperatorMiddleware;
use App\Http\Middleware\ApplicantMiddleware;

Route::get('/', [
    VerificationController::class, 'homePageView'
])->name('home');

Route::middleware([OperatorMiddleware::class])->group(function () {
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
    
    Route::put('/update-approval/{approval}', [
        OperatorController::class, 'updateApproval'
    ])->name('update-approval');

    Route::get('/operator-dashboard', [
        OperatorController::class, 'dashboardView'
    ])->name('operator-dashboard');

    Route::get('/operator-list', [
        OperatorController::class, 'operatorListView'
    ])->name('operator-list');
    
    Route::get('/delete-operator/{user}', [
        OperatorController::class, 'destroyOperator'
    ])->name('delete-operator');

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
});
Route::get('/operator', [
    VerificationController::class, 'operatorView'
])->name('operator');

Route::post('/operator-sign-in', [
    VerificationController::class, 'operatorVerificationCheck'
])->name('operator-sign-in');

Route::middleware([ApplicantMiddleware::class])->group(function () {
    Route::get('/approval-list', [
        ApprovalController::class, 'listApprovalView'
    ])->name('approval-list');
    
    Route::get('/billing-list', [
        ApprovalController::class, 'listBillingView'
    ])->name('billing-list');
});

Route::get('/sign-out', [
    VerificationController::class, 'verificationFlush'
])->name('sign-out');

Route::post('/submit-id-card-no', [
    VerificationController::class, 'verificationCheck'
])->name('submit-id-card-no');

Route::get('/add-approval', [
    ApprovalController::class, 'addApprovalView'
])->name('add-approval');

Route::post('/submit-add-approval', [
    ApprovalController::class, 'addApproval'
])->name('submit-add-approval');

Route::get('/terminal-mengwi', [
    LocationController::class, 'terminalMengwiView'
])->name('terminal-mengwi');