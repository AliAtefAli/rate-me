<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'display_name' => 'min:3|max:191',
            'description' => 'min:3|max:191'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
