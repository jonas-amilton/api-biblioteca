<?php
use Illuminate\Support\Facades\Route;

require_once __DIR__ ."/authRoutes.php";
require_once __DIR__ ."/bookRoutes.php";
require_once __DIR__ ."/loanRoutes.php";


use App\Http\Controllers\User\AllUserController;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', AllUserController::class);
});
