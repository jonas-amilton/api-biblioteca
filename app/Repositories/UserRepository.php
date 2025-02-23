<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function findByEmail($email): User|null
    {
        return $this->userModel->where('email', $email)->first();
    }

    public function isEmailUnique($email): bool
    {
        return $this->userModel->where('email', $email)->doesntExist();
    }

    public function createUser(array $userData): User
    {
        return $this->userModel->create($userData);
    }
}
