<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;

class StoreBookController
{
    public function __invoke(StoreBookRequest $request)
    {
        $book = Book::create($request->validated());

        if (!$book) {
            return response()->json([
                'message' => 'Erro ao registrar livro'
            ], 500);
        }

        return response()->json([
            'message' => 'Livro cadastrado com sucesso',
            'book' => $book,
        ], 201);
    }
}
