<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNoteRequest extends FormRequest
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
        return [
            'title' => 'required|max:20',
            'content' => 'required|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'content.required' => 'Content is required',
            'title.max' => 'Title is too long',
            'content.max' => 'Content is too long max 500 characters',
        ];
    }
}
