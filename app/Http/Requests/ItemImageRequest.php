<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemImageRequest extends FormRequest
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
            'image' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,jpg,png',
                'dimensions:ming_width=50,min_height=50,max_width=1000,max_hieght=1000',
            ]
        ];
    }
}
