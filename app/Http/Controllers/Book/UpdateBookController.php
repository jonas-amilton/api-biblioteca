<?php

namespace App\Http\Controllers\Book;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'string|max:60',
            'author' => 'string|max:60',
            'publisher' => 'string|max:255',
            'publication_date' => 'date',
            'subject' => 'string|max:50',
            'summary' => 'string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $book = Book::find($request->id, 'id');

        if (!$book) {
            return response()->json([
                'message' => 'Livro não encontrado',
            ], 404);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_date' => $request->publication_date,
            'subject' => $request->subject,
            'summary' => $request->summary
        ]);

        return response()->json([
            'message' => 'Livro atualizado com sucesso',
        ], 202);
    }
}
