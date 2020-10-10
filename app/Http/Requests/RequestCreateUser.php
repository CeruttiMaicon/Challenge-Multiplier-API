<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\API\FormRequestAPI;

class RequestCreateUser extends FormRequestAPI
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
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => trans('validation_custom.name_required'),
            'name.min' => trans('validation_custom.name_min'),
            'password.min' => trans('validation_custom.password_min'),
            'password.required' => trans('validation_custom.password_required'),
            'password.confirmed' => trans('validation_custom.password_confirmed'),
            'email.required' => trans('validation_custom.email_required'),
            'email.unique' => trans('validation_custom.email_unique'),
        ];
    }
}
