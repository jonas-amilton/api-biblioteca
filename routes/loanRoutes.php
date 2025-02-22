<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Loan\{
    StoreLoanController,
    ShowLoanController,
    LoanByIdController,
    UpdateStatusLoanController,
    DestroyLoanController,
    PendingLoanController,
    ShowLoanByAuthUserController
};

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/loans', StoreLoanController::class);
    Route::get('/loans', ShowLoanController::class);
    Route::get('/loans/{id}', LoanByIdController::class);
    Route::put('/loans/{id}', UpdateStatusLoanController::class);
    Route::delete('/loans/{id}', DestroyLoanController::class);
    Route::get('/pending', PendingLoanController::class);
    Route::get('/my-loans', ShowLoanByAuthUserController::class);
});
