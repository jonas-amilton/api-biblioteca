<?php
namespace App\Services;

use App\Models\{
    Book,
    Loan
};

class BookService
{
    public function booksAvailable($idNotAvailable)
    {
        return Book::select(
            'books.id',
            'books.title',
            'books.isbn',
            'books.author',
            'books.publisher',
            'books.subject',
            'books.summary'
        )->whereNotIn('books.id', $idNotAvailable)
            ->get();
    }
}
