<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;

class PendingLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $loans = Loan::where(
            'status',
            'pending'
        )->get();

        if (!$loans) {
            return response()->json([
                'message' => 'Nenhum empréstimo pendente encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Listagem de empréstimos pendentes',
            'loans' => $loans
        ], 200);
    }
}
