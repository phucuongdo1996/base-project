<?php

namespace App\Contracts\Repositories;

interface UserRepositoryInterface
{
    public function getUsers($filters);
}
