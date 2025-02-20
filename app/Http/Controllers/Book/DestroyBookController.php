<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;

class DestroyBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $book = Book::find($request->id, 'id');

        if (!$book) {
            return response()->json([
                'message' => 'Livro não encontrado',
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Livro deletado com sucesso'
        ], 200);
    }
}
