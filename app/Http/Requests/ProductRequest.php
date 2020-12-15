<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'price' => 'required',
            'quantity' => 'required|integer',
            'menu_id' => 'required|integer',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }
}
