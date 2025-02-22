<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController,
    LogoutController,
    MeController
};

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', MeController::class);
    Route::post('/logout', LogoutController::class);
});
