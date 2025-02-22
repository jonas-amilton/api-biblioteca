<?php
use Illuminate\Support\Facades\Route;

require_once __DIR__ ."/authRoutes.php";


use App\Http\Controllers\Book\{
    AvailableBookController,
    StoreBookController,
    ShowBookController,
    DestroyBookController,
    UpdateBookController,
    BookByIdController
};

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
    Route::post('/books', StoreBookController::class);
    Route::get('/books', ShowBookController::class);
    Route::get('/books/{id}', BookByIdController::class);
    Route::delete('/books/{id}', DestroyBookController::class);
    Route::put('/books/{id}', UpdateBookController::class);
    Route::get('/available-books', AvailableBookController::class);
    Route::post('/loans', StoreLoanController::class);
    Route::get('/loans', ShowLoanController::class);
    Route::get('/loans/{id}', LoanByIdController::class);
    Route::put('/loans/{id}', UpdateStatusLoanController::class);
    Route::delete('/loans/{id}', DestroyLoanController::class);
    Route::get('/pending', PendingLoanController::class);
    Route::get('/my-loans', ShowLoanByAuthUserController::class);
});
