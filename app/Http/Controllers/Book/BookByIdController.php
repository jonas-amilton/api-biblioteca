<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;

class BookByIdController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $book = Book::find($request->id);

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
