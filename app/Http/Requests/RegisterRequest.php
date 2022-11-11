<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'bail|required|string|unique:users|between:5,20',
            'email' => 'bail|required|string|email|unique:users',
            'password' => 'bail|required|string|between:5,20',
            'phone_number' => 'bail|required|string|between:10,13',
            'address' => 'bail|required|string|min:5'
        ];
    }
}
