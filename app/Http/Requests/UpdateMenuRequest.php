<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'store_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
