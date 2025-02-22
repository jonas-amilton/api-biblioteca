<?php
namespace App\Services;

use App\Models\Book;

class BookService
{
    public function booksAvailable()
    {
        return Book::select(
            'books.id',
            'books.title',
            'books.isbn',
            'books.author',
            'books.publisher',
            'books.subject',
            'books.summary'
        )
            ->leftJoin('loans', 'books.id', '=', 'loans.book_id')
            ->where(function ($query) {
                $query->whereNull('loans.id')
                    ->orWhere('loans.status', '!=', 'pending');
            })
            ->groupBy('books.id', 'books.title', 'books.isbn', 'books.author', 'books.publisher', 'books.subject', 'books.summary')
            ->get();
    }
}
