<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'bail|required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Faild is required',
            'content.required' => 'Faild is required'
        ];
    }
}
