<?php
namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(array $userData)
    {
        if (!($this->userRepository->isEmailUnique($userData['email']))) {
            return null;
        }

        $userData['password'] = Hash::make($userData['password']);
        $user = $this->userRepository->createUser($userData);

        return $user;
    }

    public function findByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }
}
