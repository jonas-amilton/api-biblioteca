<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|in:pending,returned,late',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first()
            ], 400);
        }

        $loan = Loan::create([
            'loan_date' => $request->loan_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ]);

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

    public function show()
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
