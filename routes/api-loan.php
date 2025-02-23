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

Route::post('', StoreLoanController::class);
Route::get('', ShowLoanController::class);
Route::get('/pending', PendingLoanController::class);
Route::get('/my-loans', ShowLoanByAuthUserController::class);
Route::get('/{id}', LoanByIdController::class);
Route::put('/{id}', UpdateStatusLoanController::class);
Route::delete('/{id}', DestroyLoanController::class);
