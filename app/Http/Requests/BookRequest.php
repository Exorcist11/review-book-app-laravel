<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        if (request()->isMethod('post')){
            return [
                'book_name' => 'required|string|max:258',
                'author_id' => 'required',
                'publisher_id' => 'required',
                'category_id' => 'required'
            ];
        } else {
            return [
                'book_name' => 'required|string|max:258',
                'author_id' => 'required',
                'publisher_id' => 'required',
                'category_id' => 'required'
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')){
            return [
                'book_name.required' => 'Book name is required!',
                'author_id.required' => 'Author is required!',
                'publisher_id.required' => 'Publisher is required!',
                'category_id.required' => 'Category is required!'
            ];
        } else {
            return [
                'book_name.required' => 'Book name is required!',
                'author_id.required' => 'Author is required!',
                'publisher_id.required' => 'Publisher is required!',
                'category_id.required' => 'Category is required!'
            ];
        }
    }
}
