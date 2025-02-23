<?php

namespace App\Http\Controllers\Book;

use App\Services\BookService;

class AvailableBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $bookService = new BookService();

        $booksAvailables = $bookService->booksAvailable();

        if (!$booksAvailables) {
            return response()->json([
                'message' => 'Nenhum livro está disponível'
            ], 404);
        }

        return response()->json([
            'message' => 'Livros disponíveis',
            'booksAvailables' => $booksAvailables
        ], 200);
    }
}
