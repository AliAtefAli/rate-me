<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => 'url',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
