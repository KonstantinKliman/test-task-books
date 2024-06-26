<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\IAuthorRepository;
use App\Http\Repositories\Interfaces\IBookRepository;
use App\Http\Requests\Author\CreateRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Services\Interfaces\IAuthorService;
use App\Models\Author;

class AuthorService implements IAuthorService
{
    private IAuthorRepository $repository;

    private IBookRepository $bookRepository;

    public function __construct(IAuthorRepository $repository, IBookRepository $bookRepository)
    {
        $this->repository = $repository;
        $this->bookRepository = $bookRepository;
    }

    public function create(CreateRequest $request)
    {
        $authorData = [
            'first_name' => $request->validated('firstName'),
            'last_name' => $request->validated('lastName'),
            'slug' => str_replace([' ', ',', '.'], '-', trim(strtolower($request->validated('firstName')))) . '-' . str_replace([' ', ',', '.'], '-', trim(strtolower($request->validated('lastName')))),
        ];

        $booksData = [];

        foreach ($request->validated('books') as $book) {
            $bookData = [
                'name' => $book['name'],
                'slug' => str_replace([' ', ',', '.'], '-', trim(strtolower($book['name'])))
            ];

            $booksData[] = $bookData;
        }

        $author = $this->repository->firstOrCreate($authorData);

        $books = [];

        foreach ($booksData as $book) {
            $books[] = $this->bookRepository->firstOrCreate($book)->id;
        }

        $this->repository->syncAuthorToBooks($author,$books);

        $this->repository->load($author, $table);

        return new AuthorResource($author);
    }


    public function show(Author $author)
    {
        $this->repository->load($author, 'books');
        return new AuthorResource($author);
    }

    public function getById(int $authorId)
    {
        $author = $this->repository->getById($authorId);
        $this->repository->load($author, 'books');
        return new AuthorResource($author);
    }
}
