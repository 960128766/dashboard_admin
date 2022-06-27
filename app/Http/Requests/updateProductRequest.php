<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'max:5000|mimes:jpeg,jpg,png',
            'inventory' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ];
    }
}
