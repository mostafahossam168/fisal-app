<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                        'name' => 'required|max:255|string|unique:categories,name',
                        'status' => 'required|boolean',
                    ];
                }
            case 'PUT':
            case 'PATCH': {

                    return [
                        'name' => 'required|max:255|string|unique:categories,name,' . $this->category,
                        'status' => 'required|boolean',
                    ];
                }
            default:
                break;
        }
    }
}
