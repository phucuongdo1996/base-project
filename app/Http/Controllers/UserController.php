<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    protected $userService;

    /**
     * Dependency Injection
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Get list data
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $listData = $this->userService->index();
        return view('user.index', compact('listData'));
    }
}
