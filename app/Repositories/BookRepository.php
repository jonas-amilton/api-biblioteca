<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    protected $bookModel;

    public function __construct(Book $bookModel)
    {
        $this->bookModel = $bookModel;
    }
    public function findById(int $id)
    {
        return $this->bookModel->where('id', $id)->first();
    }
}
