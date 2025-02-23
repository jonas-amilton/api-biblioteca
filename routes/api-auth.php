<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    LogoutController,
    MeController
};

Route::get('/me', MeController::class);
Route::post('/logout', LogoutController::class);
