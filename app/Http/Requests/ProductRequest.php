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
                        'price' => 'required|numeric',
                        'status' => 'required|boolean',
                        'image' => 'required|image',
                        'description' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH': {

                    return [
                        // 'email' => 'required|max:255|email|unique:users,email,' . $this->route()->product,
                        'name' => 'required|max:255|string',
                        'user_id' => 'required|exists:users,id',
                        'price' => 'required|numeric',
                        'status' => 'required|boolean',
                        'image' => 'nullable|image',
                        'description' => 'required',
                    ];
                }
            default:
                break;
        }
    }
}