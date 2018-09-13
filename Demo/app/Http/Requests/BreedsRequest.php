<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BreedsRequest extends FormRequest
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
            'name'=>'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Cột :attribute là bắt buộc.',
            'max' => 'Cột :attribute độ dài phải nhỏ hơn :max.',
        ];
    }
}
