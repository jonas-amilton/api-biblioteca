<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookByIdController
{
    private $bookService;

    public function __construct(BookService $bookService){
        $this->bookService = $bookService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $book = $this->bookService->findBookById($request->id);

        if (!$book) {
            return response()->json([
                'message' => 'Livro não encontrado'
            ], 404);
        }

        $book = Book::fromBook($book);

        return response()->json([
            'message' => 'Detalhes do livro',
            'book' => $book
        ], 200);
    }
}
