<?php


namespace App\Services;

use App\Http\Requests\UserRegistration;
use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserService
{
    public function login($credentials)
    {

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return ['error' => 'Unauthorized'];
    }

    public function me()
    {
        return $this->guard()->user();
    }

    public function logout()
    {
        $this->guard()->logout();
        return ['message' => 'Successfully logged out'];
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function register($valid)
    {
        $cred = [
            'email' => $valid['email'],
            'password' => $valid['password']
        ];
        $valid['password'] = bcrypt($valid['password']);
        User::create($valid);

        return $this->login($cred);
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ];
    }

    public function guard()
    {
        return Auth::guard();
    }
}
