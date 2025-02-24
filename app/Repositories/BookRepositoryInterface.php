<?php
namespace App\Repositories;

use App\Models\Book;

interface BookRepositoryInterface
{
    public function findById(int $id);
    public function createBook(array $data);
    public function findAll(): array;
    public function booksAvailable(): array;
    public function updateBook(array $data): bool;
}
