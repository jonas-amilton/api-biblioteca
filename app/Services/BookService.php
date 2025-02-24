<?php
namespace App\Services;

use App\Repositories\BookRepository;
use App\Models\Book;

class BookService
{
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function findBookById($id): Book
    {
        return $this->bookRepository->findById($id);
    }

}
