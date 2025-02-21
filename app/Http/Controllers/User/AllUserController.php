<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;

class AllUserController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = User::all();

        if (!$users) {
            return response()->json([
                'message' => 'Nenhum usuário encontrado'
            ], 404);
        }

        return response()->json([
            'users' => $users
        ], 200);
    }
}
