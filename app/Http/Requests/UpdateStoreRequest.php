<?php

namespace App\Http\Requests;

use App\Rules\phoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
            'phone' => ['required', new PhoneNumber()],
            "store_site" => "required",
            "delivery_type" => "required",
            "delivery_price" => "required",

        ];
    }

    public function authorize()
    {
        return true;
    }
}
