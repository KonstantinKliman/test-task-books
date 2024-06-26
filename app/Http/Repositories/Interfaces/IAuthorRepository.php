<?php

namespace App\Http\Repositories\Interfaces;

use App\Models\Author;

interface IAuthorRepository
{
    public function firstOrCreate(array $author);

    public function syncAuthorToBooks(Author $author,array $books);

    public function load(Author $author, string $table);

    public function getById(int $authorId);
}
