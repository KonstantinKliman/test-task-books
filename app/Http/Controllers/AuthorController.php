<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\CreateRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Services\Interfaces\IAuthorService;
use App\Models\Author;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    private IAuthorService $service;

    public function __construct(IAuthorService $service)
    {
        $this->service = $service;
    }

    public function create(CreateRequest $request)
    {
        return new JsonResponse($this->service->create($request), 200);
    }

    public function show(Author $author)
    {
        return new JsonResponse($this->service->show($author), 200);
    }

    public function getById(int $authorId)
    {
        return new JsonResponse($this->service->getById($authorId), 200);
    }
}
