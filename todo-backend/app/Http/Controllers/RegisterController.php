<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegistration;

class RegisterController extends Controller
{

    public function create(UserRegistration $request)
    {
        $v = $request->validated();
        $v['password'] = bcrypt($v['password']);
        User::create($v);
    }


}
