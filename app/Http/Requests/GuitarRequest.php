<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuitarRequest extends FormRequest
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
            'model' => "required|max:255|unique:guitars",
            'pickups' => "required|max:20",
            'body_shape' => "required|max:20",
            'string' => "required|max:10"
        ];
    }
}
