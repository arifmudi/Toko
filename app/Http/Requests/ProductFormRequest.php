<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'description' => 'required|min:20',
            'categories' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ];

        if ($this->getMethod() == "POST") {
            $rules += ['image' => 'required|image'];
        }

        return $rules;
    }
}
