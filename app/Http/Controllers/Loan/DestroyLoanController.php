<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;

class DestroyLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $loan = Loan::find($request->id);

        if (!$loan) {
            return response()->json([
                'message' => 'Emprestimo não encontrado'
            ], 404);
        }

        $loan->delete();

        return response()->json([
            'message' => 'Empréstimo deletado com sucesso'
        ], 200);
    }
}
