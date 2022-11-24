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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'catalog_ID' => [
                'required',
                'integer'
            ],
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'max:255'
            ],
            'price' => [
                'required'
            ],
            'amount' => [
                'required',
                'integer'
            ],
            'image' => [
                'nullable',
                // 'required',
                // 'image',
                // 'file_extension:jpeg,png',
                // 'mimes:jpeg,png',
                // 'mimetypes:image/jpeg,image/png',
                // 'max:2048'
            ],
        ];
    }
}
