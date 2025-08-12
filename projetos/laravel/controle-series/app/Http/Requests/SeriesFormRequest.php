<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
           'nome' => ['required', 'min:3', 'max:45'],
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigátorio',
            'nome.min' => 'É obrigatório ao menos :min caracteres',
            'nome.max' => 'O nome não pode ultrapassar :max caracteres',
        ];
    }
}
