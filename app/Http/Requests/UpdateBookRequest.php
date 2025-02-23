<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'id' => 'int|required',
            'title' => 'string|max:60',
            'author' => 'string|max:60',
            'publisher' => 'string|max:255',
            'publication_date' => 'date',
            'subject' => 'string|max:50',
            'summary' => 'string|max:255'
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
            'id.required' => 'O campo ID é obrigatório',
            'title.max' => 'O campo titulo deve ter no máximo 60 caracteres',
            'author.max' => 'O campo autor deve ter no máximo 60 caracteres',
            'publisher.max' => 'O campo publicadora deve ter no máximo 255 caracteres',
            'subject.max' => 'O campo assunto deve ter no máximo 50 caracteres',
            'summary.max' => 'O campo resumo deve ter no máximo 255 caracteres'
        ];
    }
}
