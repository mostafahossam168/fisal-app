<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'name' => 'required|max:255|string',
                        'user_id' => 'required|exists:users,id',
                        'category_id' => 'required|exists:categories,id',
                        'product_number' => 'required|numeric',
                        'barcode' => 'required|numeric',
                        'status' => 'required|boolean',
                        'image' => 'nullable|image',
                        'certificate' => 'nullable|mimes:pdf',
                    ];
                }
            case 'PUT':
            case 'PATCH': {

                    return [
                        'name' => 'required|max:255|string',
                        'user_id' => 'required|exists:users,id',
                        'category_id' => 'required|exists:categories,id',
                        'product_number' => 'required|numeric',
                        'barcode' => 'required|numeric',
                        'status' => 'required|boolean',
                        'image' => 'nullable|image',
                        'certificate' => 'nullable|mimes:pdf',
                    ];
                }
            default:
                break;
        }
    }
}
