<?php

namespace App\Services\User;

use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends Service implements UserService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(UserRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  // Define your custom methods :)
  public function login($payload)
  {
    $user = $this->mainRepository->findBy('email', $payload['email']);
    if ($user && Hash::check($payload['password'], $user->password)) {
      Auth::login($user);
      return true;
    }
    return false;
  }
}
