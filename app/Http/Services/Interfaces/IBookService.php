<?php

namespace App\Http\Services\Interfaces;

use App\Http\Requests\Book\CreateRequest;
use App\Models\Book;

interface IBookService
{
    public function create(CreateRequest $request);

    public function show(Book $book);

    public function getById(int $bookId);
}
