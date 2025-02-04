<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Users\Contracts\UserRepositoryContract;

class UserRepository extends BaseRepository implements UserRepositoryContract {

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
