<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;
use Validator;

class StoreBookController
{
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isbn' => 'required|string|max:13|unique:books',
            'title' => 'required|string|max:60',
            'author' => 'required|string|max:60',
            'publisher' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'subject' => 'required|string|max:50',
            'summary' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $book = Book::create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_date' => $request->publication_date,
            'subject' => $request->subject,
            'summary' => $request->summary
        ]);

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
