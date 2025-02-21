<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class MeController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        $user = User::fromUser($user);

        return response()->json([
            'message' => 'Informações do usuário autenticado',
            'user' => $user,
        ], 200);
    }
}
