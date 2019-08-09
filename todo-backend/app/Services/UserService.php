<?php


namespace App\Services;

use App\User as User;
use Illuminate\Support\Facades\Auth;
use App\Contract\UserContract as UserContract;


class  UserService implements UserContract
{
    public function login($credentials)
    {

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return abort(401);
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
        try
        {
            $cred = [
                'email' => $valid['email'],
                'password' => $valid['password']
            ];
            $valid['password'] = bcrypt($valid['password']);
            User::create($valid);
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }

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
