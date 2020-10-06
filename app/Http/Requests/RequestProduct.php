<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\API\FormRequestAPI;

class RequestProduct extends FormRequestAPI
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
            'name' => 'required|min:2',
            'value' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => trans('validation_custom.name_required'),
            'name.min' => trans('validation_custom.name_min'),
            'value.required' => trans('validation_custom.value_required'),
            'category_id.required' => trans('validation_custom.category_id_required'),
        ];
    }
}
