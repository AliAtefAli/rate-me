<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'display_name' => 'required|min:3|max:191',
            'description' => 'required|min:3|max:191'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
