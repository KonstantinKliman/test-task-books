<?php

namespace App\Http\Repositories\Interfaces;

use App\Models\Book;

interface IBookRepository
{
    public function firstOrCreate(array $bookData);

    public function syncBookToAuthors(Book $book, array $authors);

    public function load(Book $book, string $table);

    public function getById(int $bookId);
}
