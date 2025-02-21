<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController,
    LogoutController,
    MeController
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
    ShowLoanController,
    LoanByIdController,
    UpdateStatusLoanController,
    DestroyLoanController,
    PendingLoanController,
    ShowLoanByAuthUserController
};

use App\Http\Controllers\User\AllUserController;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', AllUserController::class);
    Route::get('/me', MeController::class);
    Route::post('/logout', LogoutController::class);
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
