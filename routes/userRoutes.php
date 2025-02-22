<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\AllUserController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', AllUserController::class);
});
