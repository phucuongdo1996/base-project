<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Enums\User\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService.
 *
 * @package namespace App\Services;
 */
class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $filters
     * @return mixed
     */
    public function getUsers($filters)
    {
        return $this->userRepository->getUsers($filters);
    }

    /**
     * @param ...$role
     * @return mixed
     */
    public function getUserByRole(...$role)
    {
        return $this->userRepository->getUserByRole(...$role);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data): bool
    {
        try {
            $data['password'] = Hash::make($data['password']);
            $data['partner_id'] = ($data['role'] == Role::PARTNER_USER) ? $data['partner_id'] : null;
            $newUser = $this->userRepository->create($data);
            $this->userRepository->storeApiToken($newUser);
            Log::info('Created User', $newUser->toArray());
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    /**
     * @param User $user
     * @param $data
     * @return bool
     */
    public function update(User $user, $data): bool
    {
        try {
            $data['password'] = empty($data['password']) ? $user['password'] : Hash::make($data['password']);
            $data['partner_id'] = $data['role'] == Role::PARTNER_USER ? $data['partner_id'] : null;
            $user->update($data);
            Log::info('Updated User', $user->toArray());
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }

    /**
     * @param User $user
     * @return bool
     */
    public function storeApiToken(User $user): bool
    {
        try {
            $this->userRepository->storeApiToken($user);
            Log::info('Create API token', ['user' => $user->id]);
            return true;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
    }
}
