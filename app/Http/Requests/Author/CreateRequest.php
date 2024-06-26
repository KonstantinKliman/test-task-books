<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'books' => ['required', 'array'],
            'books.*.name' => ['required', 'string', 'max:255']
        ];
    }
}
