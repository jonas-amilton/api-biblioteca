<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;

class ShowLoanByAuthUserController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $id = auth()->user()->getAuthIdentifier();

        $loans = Loan::where(
            'user_id',
            $id
        )->get();

        if (!$loans) {
            return response()->json([
                'message' => 'Nenhum empréstimo pendente encontrado'
            ], 404);
        }

        return response()->json([
            'message' => 'Empréstimos do usuário autenticado',
            'loans' => $loans
        ], 200);
    }
}
