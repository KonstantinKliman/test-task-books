<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\IBookRepository;
use App\Models\Book;

class BookRepository implements IBookRepository
{

    public function firstOrCreate(array $bookData)
    {
        return Book::query()->firstOrCreate($bookData);
    }

    public function syncBookToAuthors(Book $book, array $authors)
    {
        $book->authors()->sync($authors);
    }

    public function load(Book $book, string $table)
    {
        $book->load($table);
    }

    public function getById(int $bookId)
    {
        return Book::query()->where('id', $bookId)->first();
    }
}
