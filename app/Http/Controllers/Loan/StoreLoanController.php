<?php

namespace App\Http\Controllers\Loan;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoanRequest;

class StoreLoanController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->validated());

        if (!$loan) {
            return response()->json([
                'message' => 'Erro ao registrar empréstimo'
            ], 500);
        }

        return response()->json([
            'message' => 'Emprestimo registrado com sucesso',
            'loan' => $loan
        ], 201);
    }
}
