<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;

class ShowBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $books = Book::all();

        if (!$books) {
            return response()->json([
                'message' => 'Nenhum livro encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Listagem de livros',
            'books' => $books
        ], 200);
    }
}
