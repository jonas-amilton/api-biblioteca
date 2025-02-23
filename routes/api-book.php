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

Route::post('', StoreBookController::class);
Route::get('', ShowBookController::class);
Route::get('/available', AvailableBookController::class);
Route::get('/{id}', BookByIdController::class);
Route::delete('/{id}', DestroyBookController::class);
Route::put('/{id}', UpdateBookController::class);
