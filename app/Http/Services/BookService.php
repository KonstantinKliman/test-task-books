<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\IAuthorRepository;
use App\Http\Repositories\Interfaces\IBookRepository;
use App\Http\Requests\Book\CreateRequest;
use App\Http\Resources\BookResource;
use App\Http\Services\Interfaces\IBookService;
use App\Models\Book;

class BookService implements IBookService
{
    private IBookRepository $repository;

    private IAuthorRepository $authorRepository;

    public function __construct(IBookRepository $repository, IAuthorRepository $authorRepository)
    {
        $this->repository = $repository;
        $this->authorRepository = $authorRepository;
    }

    public function create(CreateRequest $request)
    {
        $bookData = [
            'name' => $request->validated('name'),
            'slug' => str_replace([' ', ',', '.'], '-', trim(strtolower($request->validated('name'))))
        ];

        $authorsData = [];

        foreach ($request->validated('authors') as $author) {
            $authorData = [
                'first_name' => $author['firstName'],
                'last_name' => $author['lastName'],
                'slug' => str_replace([' ', ',', '.'], '-', trim(strtolower($author['firstName']))) . '-' . str_replace([' ', ',', '.'], '-', trim(strtolower($author['lastName']))),
            ];

            $authorsData[] = $authorData;
        }

        $book = $this->repository->firstOrCreate($bookData);

        $authors = [];
        foreach ($authorsData as $author) {
            $authors[] = $this->authorRepository->firstOrCreate($author)->id;
        }

        $this->repository->syncBookToAuthors($book, $authors);

        $this->repository->load($book, 'authors');

        return new BookResource($book);
    }

    public function show(Book $book)
    {
        $this->repository->load($book, 'authors');
        return new BookResource($book);
    }

    public function getById(int $bookId)
    {
        $book = $this->repository->getById($bookId);
        $this->repository->load($book, 'authors');
        return new BookResource($book);
    }
}
