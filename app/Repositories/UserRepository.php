<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Define model
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}
