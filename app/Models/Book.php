<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'isbn',
        'title',
        'author',
        'publisher',
        'publication_date',
        'subject',
        'summary'
    ];

    public static function fromBook($book)
    {
        return new self([
            'isbn' => $book->isbn,
            'title' => $book->title,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'publication_date' => $book->publication_date,
            'subject' => $book->subject,
            'summary' => $book->summary
        ]);
    }
}
