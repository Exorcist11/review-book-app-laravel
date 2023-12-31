<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'username' => 'required|string|max:258',
                'phoneNumber' => 'string',
                'email' => 'email|required|unique:posts',
                'password' => 'string|required'
            ];
        } else {
            return [
                'username' => 'required|string|max:258',
                'phoneNumber' => 'string',
                'email' => 'email|required|unique:posts',
                'password' => 'string|required'
            ];
        }
    }

    // public function messages()
    // {
    //     if (request()->isMethod('post')) {
    //         return [
    //             'name.required' => 'Name is required',
    //             'image_path.required' => 'Image is required',
    //             'introduction.required' => 'Introduction is required'
    //         ];
    //     } else {
    //         return [
    //             'name.required' => 'Name is required',
    //             'introduction.required' => 'Introduction is required'
    //         ];
    //     }
    // }
}
