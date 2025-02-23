<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;

class RegisterController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = $this->userService->registerUser($request->validated());

        if (!$user) {
            return response()->json([
                'message' => 'Registro de usuário falhou. Email já está em uso.'
            ], 422);
        }

        $user = User::fromUser($user);

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user
        ], 201);
    }
}
