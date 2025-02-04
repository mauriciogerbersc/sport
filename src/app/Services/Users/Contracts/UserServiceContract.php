<?php

namespace App\Services\Users\Contracts;

use App\Http\Requests\UserRequest;

interface UserServiceContract
{
    public function login(UserRequest $params);
}
