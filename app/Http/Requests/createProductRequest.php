<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required|max:5000|mimes:jpeg,jpg,png',
            'inventory' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required'
        ];
    }
}
