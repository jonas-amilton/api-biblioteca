<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanController
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

    public function loanById(Request $request)
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

    public function update(Request $request)
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

    public function destroy(Request $request)
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

    public function pending()
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

    public function showLoansByAuthUser()
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
