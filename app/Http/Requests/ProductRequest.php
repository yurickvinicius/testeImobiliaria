<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'code' => 'required|min:3|max:10',
            'title' => 'required|min:3|max:40',
            'price' => 'required',
            'observation' => 'max:250',
            'image' => 'image|mimes:jpg|max:5000',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Codigo é obrigatório',
            'code.min' => 'Codigo é necessario no minímo 3 caracteres',
            'code.max' => 'Codigo é permetido 10 caracteres no máximo',
            'title.required' => 'Titulo é obrigatório',
            'title.min' => 'Título é necessário no minímo 3 caractres',
            'title.max' => 'Título é permetido 40 caracteres no maxímo',
            'price.required' => 'Valor é obrigatório',
            'observation.max' => 'Observação é premetido no maxímo 250 caracteres',
            'image.mimes' => 'Imagem somente do tipo jpg é permetido',
            'category.required' => 'Categoria é obrigátorio',
        ];
    }
}
