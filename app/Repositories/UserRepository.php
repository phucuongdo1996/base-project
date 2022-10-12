<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Str;

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

    /**
     * @param $filters
     * @return mixed
     */
    public function getUsers($filters)
    {
        return $this->model
            ->when(isset($filters['name']), function ($query) use ($filters) {
                $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
            })
            ->when(isset($filters['email']), function ($query) use ($filters) {
                $query->where('email', 'LIKE', '%' . $filters['email'] . '%');
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(PER_PAGE_DEFAULT);
    }

    /**
     * @param ...$roles
     * @return mixed
     */
    public function getUserByRole(...$roles)
    {
        return $this->model
            ->when(!empty($roles), function ($query) use ($roles) {
                $query->whereIn('role', $roles);
            })
            ->get();
    }

    /**
     * @param User $user
     * @return void
     */
    public function storeApiToken(User $user)
    {
        $token = Str::random(80);
        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();
    }
}
