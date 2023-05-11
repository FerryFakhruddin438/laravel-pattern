<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $payload = $request->validated();
        if ($this->userService->login($payload)) {
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Email or password is incorrect');
    }
}
