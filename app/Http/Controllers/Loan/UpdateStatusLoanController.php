<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use App\Http\Requests\UpdateStatusLoanRequest;

class UpdateStatusLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateStatusLoanRequest $request)
    {
        $loan = Loan::find($request->validated('id'));

        if (!$loan) {
            return response()->json([
                'message' => 'Emprestimo nao encontrado'
            ], 404);
        }

        $loan->update($request->validated());

        $loan = Loan::fromLoan($loan);

        return response()->json([
            'message' => 'Status do emprestimo atualizado com sucesso',
            'loan' => $loan
        ], 200);
    }
}
