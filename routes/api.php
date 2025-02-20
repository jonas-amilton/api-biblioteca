<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController,
    LogoutController
};

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
    ShowLoanController
};
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/logout', LogoutController::class);
    Route::post('/books', StoreBookController::class);
    Route::get('/books', ShowBookController::class);
    Route::get('/books/{id}', BookByIdController::class);
    Route::delete('/books/{id}', DestroyBookController::class);
    Route::put('/books/{id}', UpdateBookController::class);
    Route::get('/available-books', AvailableBookController::class);
    Route::post('/loans', StoreLoanController::class);
    Route::get('/loans', ShowLoanController::class);
    Route::get('/loans/{id}', [LoanController::class, 'loanById']);
    Route::put('/loans/{id}', [LoanController::class, 'update']);
    Route::delete('/loans/{id}', [LoanController::class, 'destroy']);
    Route::get('/pending', [LoanController::class, 'pending']);
    Route::get('/my-loans', [LoanController::class, 'showLoansByAuthUser']);
});
