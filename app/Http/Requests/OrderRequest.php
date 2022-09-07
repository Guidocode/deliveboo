<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
          'client_name'=>'required | min:3 ',
          'client_surname'=>'required | min:3 ',
          'client_email'=>'required | min:3 ',
          'client_phone'=>'required | min:3 ',
          'client_address'=>'required | min:3 ',
          'total_price'
        ];
    }

}
