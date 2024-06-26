<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\Author\CreateRequest;
use App\Models\Author;

interface IAuthorService
{
    public function create(CreateRequest $request);

    public function show(Author $author);

    public function getById(int $authorId);
}
