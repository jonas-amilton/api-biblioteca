<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'loan_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required|in:pending,returned,late',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'loan_date.required' => 'o campo data de empréstimo é obrigatório',
            'return_date.required' => 'O campo data de retorno de empréstimo é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'user_id.required' => 'O campo ID do usuário é obrigatório',
            'book_id.required' => 'o campo ID do livro é obrigatório'
        ];
    }
}
