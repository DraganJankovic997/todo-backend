<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\UserRegistration;

class RegisterController extends Controller
{


    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(UserRegistration $request)
    {
        return $this->userService->register($request);
    }


}
