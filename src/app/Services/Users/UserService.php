<?php

namespace App\Services\Users;

use App\Http\Requests\UserRequest;
use App\Services\Users\Contracts\UserServiceContract;
use App\Repositories\Users\Contracts\UserRepositoryContract;
use Exception;


class UserService implements UserServiceContract
{
    private $userRepository;

    public function __construct(
        UserRepositoryContract $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function login(UserRequest $request)
    {
        $user = $this->userRepository->getByAttribute('email', $request->email)->firstOrFail();
        
        if (! $user)
            return false;
 
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
