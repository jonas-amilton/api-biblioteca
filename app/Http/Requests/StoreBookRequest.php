<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'isbn' => 'required|string|max:13|unique:books',
            'title' => 'required|string|max:60',
            'author' => 'required|string|max:60',
            'publisher' => 'required|string|max:255',
            'publication_date' => 'required|date',
            'subject' => 'required|string|max:50',
            'summary' => 'required|string|max:255'
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
            'isbn.required' => 'O ISBN é obrigatório',
            'isbn.unique' => 'O ISBN já esta em cadastrado em outro livro',
            'isbn.max' => 'O tamanho máximo do ISBN é de 13 caracteres',
            'title.required' => 'O titulo é obrigatório',
            'title.max' => 'O tamanho máximo do titulo é de 60 caracteres',
            'author.required' => 'O Autor é obrigatório',
            'author.max' => 'O tamanho máximo do autor é de 60 caracteres',
            'publisher.required' => 'A publicadora é obrigatória',
            'publisher.max' => 'o tamanho máximo da publicadora é de 255 caracteres',
            'publication_date.required' => 'A data de publicação é obrigatória',
            'subject.required' => 'A categoria é obrigatória',
            'subject.max' => 'O tamanho máximo da categoria é de 50 caracteres',
            'summary.required' => 'O resumo é obrigatório',
            'summary.max' => 'O tamanho máximo do resumo é de 255 caracteres'
        ];
    }
}
