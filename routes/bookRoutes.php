<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Book\{
    AvailableBookController,
    StoreBookController,
    ShowBookController,
    DestroyBookController,
    UpdateBookController,
    BookByIdController
};

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/books', StoreBookController::class);
    Route::get('/books', ShowBookController::class);
    Route::get('/books/{id}', BookByIdController::class);
    Route::delete('/books/{id}', DestroyBookController::class);
    Route::put('/books/{id}', UpdateBookController::class);
    Route::get('/available-books', AvailableBookController::class);
});
