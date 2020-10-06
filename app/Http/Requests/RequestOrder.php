<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\API\FormRequestAPI;

class RequestOrder extends FormRequestAPI
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
            'user_id' => 'required',
            'products.*' => 'required',
            'quantity.*' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'user_id.required' => trans('validation_custom.user_required'),
            'products.required' => trans('validation_custom.products_required'),
            'quantity.required' => trans('validation_custom.quantity_required'),
        ];
    }
}
