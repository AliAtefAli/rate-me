<?php

namespace App\Http\Requests;

use App\Rules\phoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ar.name' => 'required|min:3|max:255',
            'en.name' => 'required|min:3|max:255',
            'ar.policies' => 'required|min:3',
            'en.policies' => 'required|min:3',
            'ar.description' => 'required|min:3',
            'en.description' => 'required|min:3',
            'ar.about' => 'required|min:3',
            'en.about' => 'required|min:3',
            'site_link' => 'required|url',
            'android_link' => 'required|url',
            'ios_link' => 'required|url',
            'email' => 'required|email',
            'logo' => 'image|mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
