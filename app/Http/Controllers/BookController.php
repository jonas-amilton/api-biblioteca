<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController
{
    public function store(Request $request)
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

    public function show()
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

    public function destroy(Request $request)
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

    public function update(Request $request)
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

    public function bookById(Request $request)
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
