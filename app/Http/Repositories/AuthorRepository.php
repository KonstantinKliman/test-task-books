<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\IAuthorRepository;
use App\Models\Author;

class AuthorRepository implements IAuthorRepository
{
    public function firstOrCreate(array $author)
    {
        return Author::query()->firstOrCreate($author);
    }

    public function syncAuthorToBooks(Author $author, array $books)
    {
        $author->books()->sync($books);
    }

    public function load(Author $author, string $table)
    {
        $author->load($table);
    }

    public function getById(int $authorId)
    {
        return Author::query()->where('id', $authorId)->first();
    }
}
