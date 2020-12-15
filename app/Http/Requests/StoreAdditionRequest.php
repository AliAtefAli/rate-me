<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdditionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'price' => 'required',
            'quantity' => 'required|integer',
            'product_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
