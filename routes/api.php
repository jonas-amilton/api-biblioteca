<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix("/users")
        ->group(base_path('routes/api-user.php'));

    Route::prefix('/loans')
        ->group(base_path('routes/api-loan.php'));

    Route::prefix('/books')
        ->group(base_path('routes/api-book.php'));

    Route::prefix('/auth')
        ->group(base_path('routes/api-auth.php'));
});
