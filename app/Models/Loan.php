<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    public $fillable = [
        'loan_date',
        'return_date',
        'status',
        'user_id',
        'book_id'
    ];

    public static function fromLoan($loan)
    {
        return new self([
            'loan_date' => $loan->loan_date,
            'return_date' => $loan->return_date,
            'status' => $loan->status,
            'user_id' => $loan->user_id,
            'book_id' => $loan->book_id
        ]);
    }
}
