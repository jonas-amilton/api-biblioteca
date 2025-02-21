<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateStatusLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,returned,late',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $loan = Loan::find($request->id);

        if (!$loan) {
            return response()->json([
                'message' => 'Emprestimo nao encontrado'
            ], 404);
        }

        $loan->update([
            'status' => $request->status
        ]);

        $loan = Loan::fromLoan($loan);

        return response()->json([
            'message' => 'Status do emprestimo atualizado com sucesso',
            'loan' => $loan
        ], 200);
    }
}
