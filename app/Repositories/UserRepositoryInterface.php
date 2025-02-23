<?php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function findByEmail(string $email);
    public function isEmailUnique(string $email);
    public function createUser(array $user);
}
