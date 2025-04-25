<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                        'phone' => 'required|max:15|string',
                        'email' => 'required|max:255|unique:users|email',
                        'status' => 'nullable|boolean',
                        'image' => 'nullable|image',
                        'password' => 'required|string|min:3|max:255',
                    ];
                }
            case 'PUT':
            case 'PATCH': {

                    return [
                        'name' => 'required|max:255|string',
                        'phone' => 'required|max:15|string',
                        'email' => 'required|max:255|email|unique:users,email,' . $this->route()->user,
                        'status' => 'required|boolean',
                        'image' => 'nullable|image',
                        'password' => 'nullable|string|min:3|max:255',
                    ];
                }
            default:
                break;
        }
    }
}