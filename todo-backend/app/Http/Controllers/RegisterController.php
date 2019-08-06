<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration;
use App\Http\Controllers\AuthController as AuthController;

class RegisterController extends Controller
{

    public function create(UserRegistration $request)
    {
        $user = $request->validated();
        $user['password'] = bcrypt($user['password']);
        User::create($user);

        $ac = new AuthController;
        return $ac->login($request);
    }


}
