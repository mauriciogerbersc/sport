<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:50',
            'position' => 'required|string|max:1',
            'country' => 'required|string|max:3',
            'team_id' => 'required|integer|exists:teams,id',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'O campo Nome é obrigatório.',
            'first_name.string' => 'O campo Nome deve ser uma string.',
            'first_name.max' => 'O campo Nome não pode ter mais que 100 caracteres.',

            'last_name.required' => 'O campo Sobrenome é obrigatório.',
            'last_name.string' => 'O campo Sobrenome deve ser uma string.',
            'last_name.max' => 'O campo Sobrenome não pode ter mais que 50 caracteres.',

            'position.required' => 'O campo Posição é obrigatório.',
            'position.string' => 'O campo Posição deve ser uma string.',
            'position.max' => 'O campo Posição deve ter no máximo 1 caractere.',

            'country.required' => 'O campo País é obrigatório.',
            'country.string' => 'O campo País deve ser uma string.',
            'country.max' => 'O campo País deve ter no máximo 3 caracteres.',

            'team_id.required' => 'O campo ID do Time é obrigatório.',
            'team_id.integer' => 'O campo ID do Time deve ser um número inteiro.',
        ];
    }
}
