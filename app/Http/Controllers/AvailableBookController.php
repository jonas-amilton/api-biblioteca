<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Services\LoanService;

class AvailableBookController
{
    private $bookService;
    private $loanService;

    public function __construct()
    {
        $this->bookService = new BookService();
        $this->loanService = new LoanService();
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $idNotAvailable = $this->loanService->idNotAvailable();

        if (isset($idNotAvailable)) {
            $booksAvailables = $this
                ->bookService
                ->booksAvailable($idNotAvailable);
        }

        if (!$booksAvailables) {
            return response()->json([
                'message' => 'Nenhum livro está disponível'
            ], 404);
        }

        return response()->json([
            'message' => 'Livros disponíveis',
            'booksAvailables' => $booksAvailables
        ], 200);
    }
}
