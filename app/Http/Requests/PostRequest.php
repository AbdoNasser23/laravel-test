<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
    */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'     =>  "bail|required|unique:posts,title,{$this->input('id')}",
            'body'      =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required'     => 'Title is required',
            'body.required'      => 'Body is required'
        ];
    }
}
