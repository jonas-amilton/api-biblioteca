<?php
use Illuminate\Support\Facades\Route;

require_once __DIR__ ."/authRoutes.php";
require_once __DIR__ ."/bookRoutes.php";

use App\Http\Controllers\Loan\{
    StoreLoanController,
    ShowLoanController,
    LoanByIdController,
    UpdateStatusLoanController,
    DestroyLoanController,
    PendingLoanController,
    ShowLoanByAuthUserController
};

use App\Http\Controllers\User\AllUserController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', AllUserController::class);
    Route::post('/loans', StoreLoanController::class);
    Route::get('/loans', ShowLoanController::class);
    Route::get('/loans/{id}', LoanByIdController::class);
    Route::put('/loans/{id}', UpdateStatusLoanController::class);
    Route::delete('/loans/{id}', DestroyLoanController::class);
    Route::get('/pending', PendingLoanController::class);
    Route::get('/my-loans', ShowLoanByAuthUserController::class);
});
