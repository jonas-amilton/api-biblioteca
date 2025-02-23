<?php
namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class LoginController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        $user = $this->userService->findByEmail($request->validated('email'));

        if (
            !$user || !Hash::check(
                $request->validated('password'),
                $user->password
            )
        ) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
    }
}
