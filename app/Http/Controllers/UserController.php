<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
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

    public function me(Request $request)
    {
        $user = $request->user();

        $user = User::fromUser($user);

        return response()->json([
            'result' => true,
            'message' => 'Informações do usuário',
            'user' => $user,
        ], 200);
    }
}
