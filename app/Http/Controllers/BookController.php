<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateRequest;
use App\Http\Resources\BookResource;
use App\Http\Services\Interfaces\IBookService;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    private IBookService $service;

    public function __construct(IBookService $service)
    {
        $this->service = $service;
    }

    public function create(CreateRequest $request)
    {
        return new JsonResponse($this->service->create($request), 200);
    }

    public function show(Book $book)
    {
        return new JsonResponse($this->service->show($book), 200);
    }

    public function getById(int $bookId)
    {
        return new JsonResponse($this->service->getById($bookId), 200);
    }
}
