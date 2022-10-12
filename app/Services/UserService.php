<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService.
 *
 * @package App\Services;
 * @version 8.x
 */
class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * Construct function
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get all data
     *
     * @return Collection|Model[]
     */
    public function index()
    {
        return $this->userRepository->getAll();
    }
}
