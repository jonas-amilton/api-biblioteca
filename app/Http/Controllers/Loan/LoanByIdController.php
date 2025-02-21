<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanByIdController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $loan = Loan::find($request->id);

        if (!$loan) {
            return response()->json([
                'message' => 'Empréstimo não encontrado'
            ], 404);
        }

        $loan = Loan::fromLoan($loan);

        return response()->json([
            'message' => 'Detalhes do empréstimo',
            'loan' => $loan
        ], 200);
    }
}
