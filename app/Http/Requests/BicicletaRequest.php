<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BicicletaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'modelo' => [
                'required', 
                'string',  
                'min:3',  
                'max:255', 
            ],
            'valor_aluguel' => [
                'required', 
                'numeric'
            ],
            'tipo' => [
                'required', 
                'string',  
                 
            ],
            'imagem' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:20048868'
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
            'modelo.required' => 'O campo Modelo é obrigatório.',
            'modelo.string' => 'O Modelo deve ser um texto.',
            'modelo.min' => 'O Modelo deve ter pelo menos 3 caracteres.',
            'modelo.max' => 'O Modelo deve ter no máximo 255 caracteres.',
            'valor_aluguel.required' => 'O campo Valor Aluguel é obrigatório.',
            'valor_aluguel.numeric' => 'O campo Valor Aluguel deve ser um número.',
            'tipo.required' => 'O campo Tipo é obrigatória.',
            'tipo.string' => 'O Tipo deve ser um texto.',
            'imagem.required' => 'O campo Imagem é obrigatório.',
            'imagem.image' => 'O arquivo enviado deve ser uma imagem.',
            'imagem.mimes' => 'A imagem deve ter um formato JPEG, PNG, JPG ou GIF.',
            'imagem.max' => 'A imagem não deve ter mais de - kilobytes.'
        ];
    }
}
