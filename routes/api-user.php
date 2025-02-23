<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\AllUserController;


Route::get('', AllUserController::class);
