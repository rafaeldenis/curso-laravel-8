<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'cliente_id' => 'required',
            'produto_id' => 'required',
            'quantidade' => 'required',
            'total' => 'required'
        ];
    }

    public function messages()
    {
        return [
            //
            'cliente_id.required' => 'Selecione ao menos um cliente  ',
            'produto_id.required' => 'Selecione um produto'
            
        ];
    }
}
