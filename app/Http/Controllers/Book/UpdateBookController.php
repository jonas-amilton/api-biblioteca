<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use App\Http\Requests\UpdateBookRequest;

class UpdateBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateBookRequest $request)
    {
        $book = Book::find($request->validated('id'), 'id');

        if (!$book) {
            return response()->json([
                'message' => 'Livro não encontrado',
            ], 404);
        }

        $book->update($request->validated());

        return response()->json([
            'message' => 'Livro atualizado com sucesso',
        ], 202);
    }
}
