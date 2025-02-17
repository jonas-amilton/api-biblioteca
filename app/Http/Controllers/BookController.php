<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
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
            ]);
        }

        $book = Book::create([
            'user_id'=> $request->user_id,
            'isbn' => $request->isbn,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication_date' => $request->publication_date,
            'subject' => $request->subject,
            'summary' => $request->summary
        ]);

        return response()->json([
            'message'=> 'Livro cadastrado com sucesso',
            'book'=> $book,
        ], 201);
    }
}
