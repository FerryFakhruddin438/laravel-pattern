<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use Illuminate\Http\Request;
use App\Services\Book\BookService;
use App\Services\User\UserService;

class BookController extends Controller
{
    private $bookService;
    private $userService;

    public function __construct(BookService $bookService, UserService $userService)
    {
        $this->bookService = $bookService;
        $this->userService = $userService;
    }

    public function index()
    {
        $books = $this->bookService->all();
        $users = $this->userService->all();
        $books->load('user');
        return view('books.index', compact('books', 'users'));
    }

    public function create(CreateBookRequest $request)
    {
        $payload = $request->validated();
        $this->bookService->create($payload);
        return redirect()->route('books.index');
    }

    public function update(CreateBookRequest $request, $id)
    {
        $payload = $request->validated();
        if (!$this->bookService->find($id)) {
            return redirect()->route('books.index');
        }
        $this->bookService->update($id, $payload);
        return redirect()->route('books.index');
    }

    public function delete($id)
    {
        if (!$this->bookService->find($id)) {
            return redirect()->route('books.index');
        }
        $this->bookService->delete($id);
        return redirect()->route('books.index');
    }
}
