<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'authors' => ['required', 'array'],
            'authors.*.firstName' => ['required', 'string', 'max:255'],
            'authors.*.lastName' => ['required', 'string', 'max:255']
        ];
    }
}
