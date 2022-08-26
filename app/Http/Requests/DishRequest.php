<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:500',
            'price' => 'required|numeric|between:1.00,9999.00'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obbligatorio',
            'name.max' => 'Può contenere massimo :max caratteri',
            'name.min' => 'Deve contenere minimo :min caratteri',

            'description.required' => 'Campo obbligatorio',
            'description.max' => 'Può contenere massimo :max caratteri',
            'description.min' => 'Deve contenere minimo :min caratteri',

            'price.required' => 'Campo obbligatorio',
            'price.numeric' => 'Solo i numeri',
            'price.between' => 'Il prezzo deve essere compreso min: :min max::max',
        ];
    }
}
