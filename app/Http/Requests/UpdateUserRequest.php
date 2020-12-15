<?php

namespace App\Http\Requests;

use App\Rules\phoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:191'],
            'email' => ['email', 'max:255'],
            'password' => ['string', 'min:8', 'confirmed'],
            'phone' => ['required', new phoneNumber()],
            'commercial_register' => ['required', new phoneNumber()],
        ];
    }
}
