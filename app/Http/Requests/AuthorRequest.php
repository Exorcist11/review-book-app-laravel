<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|string|max:258',
                'image_path' => 'required|max:2048|image|mimes:jpeg,png,jpg,gif,svg',
                'introduction' => 'required|string'
            ];
        } else {
            return [
                'name' => 'required|string|max:258',
                'image_path' => 'required|max:2048|image|mimes:jpeg,png,jpg,gif,svg',
                'introduction' => 'required|string'
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'name.required' => 'Name is required',
                'image_path.required' => 'Image is required',
                'introduction.required' => 'Introduction is required'
            ];
        } else {
            return [
                'name.required' => 'Name is required',
                'introduction.required' => 'Introduction is required'
            ];
        }
    }
}
