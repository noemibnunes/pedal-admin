<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'tipo_plano' => [
                'required', 
                'string',  
                'min:3',  
                'max:255' 
            ],
            'valor_plano' => [
                'required', 
                'numeric'
            ],
            'descricao' => [
                'required', 
                'string',  
                'min:3',  
                'max:255'
            ]
        ];
    }

    /**
     * Get custom validation messages for attributes.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'tipo_plano.required' => 'O campo Tipo do plano é obrigatório.',
            'tipo_plano.string' => 'O Tipo do plano deve ser um texto.',
            'tipo_plano.min' => 'O Tipo do plano deve ter pelo menos 3 caracteres.',
            'tipo_plano.max' => 'O Tipo do plano deve ter no máximo 255 caracteres.',
            'valor_aluguel.required' => 'O campo Valor do plano é obrigatório.',
            'valor_plano.numeric' => 'O campo Valor do plano deve ser um número.',
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.string' => 'O Descrição deve ser um texto.',
            'descricao.min' => 'O Descrição deve ter pelo menos 3 caracteres.',
            'descricao.max' => 'O Descrição deve ter no máximo 255 caracteres.'
        ];
    }
}
