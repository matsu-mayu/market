<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemEditRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'integer', 'min:0'],
            'category_id' => ['exists:categories,id'],
            'shape_id' => ['exists:shapes,id'],
            'rim_id' => ['exists:rims,id'],
            'gender_id' => ['exists:genders,id'],
            'size_id' => ['exists:sizes,id'],
        ];
    }
}
