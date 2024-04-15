<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PontoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'descricao' => [
                'required', 
                'string',  
                'min:3',  
                'max:255'
            ],
            'tipo_logradouro' => [
                'required',
                'string',
                'max:255'
            ],
            'logradouro' => [
                'required',
                'string',
                'max:255'
            ],
            'numero' => [
                'required',
                'numeric',
                'min:1'
            ],
            'cep' => [
                'required',
                'string'
            ],
            'bairro' => [
                'required',
                'string',
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
            'descricao.required' => 'O campo Descrição é obrigatório.',
            'descricao.string' => 'O Descrição deve ser um texto.',
            'descricao.min' => 'O Descrição deve ter pelo menos 3 caracteres.',
            'descricao.max' => 'O Descrição deve ter no máximo 255 caracteres.',
            'tipo_logradouro.required' => 'O campo Tipo de Logradouro é obrigatório.',
            'tipo_logradouro.string' => 'O Tipo de Logradouro deve ser um texto.',
            'tipo_logradouro.max' => 'O Tipo de Logradouro deve ter no máximo 255 caracteres.',
            'logradouro.required' => 'O campo Logradouro é obrigatório.',
            'logradouro.string' => 'O Logradouro deve ser um texto.',
            'logradouro.max' => 'O Logradouro deve ter no máximo 255 caracteres.',
            'numero.required' => 'O campo Número é obrigatório.',
            'numero.numeric' => 'O Número deve ser um valor numérico.',
            'numero.min' => 'O Número deve ser pelo menos 1.',
            'cep.required' => 'O campo CEP é obrigatório.',
            'cep.string' => 'O CEP deve ser um texto.',
            'bairro.required' => 'O campo Bairro é obrigatório.',
            'bairro.string' => 'O Bairro deve ser um texto.',
            'bairro.max' => 'O Bairro deve ter no máximo 255 caracteres.'
        ];
    }
}
