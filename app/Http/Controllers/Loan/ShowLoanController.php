<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;

class ShowLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $loans = Loan::all();

        if (!$loans) {
            return response()->json([
                'message' => 'Nenhum emprestimo encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Listagem de emprestimos',
            'loans' => $loans
        ], 200);
    }
}
