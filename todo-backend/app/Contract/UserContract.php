<?php


namespace App\Contract;


interface UserContract
{
    public function login($credentials);
    public function me();
    public function logout();
    public function refresh();
    public function register($valid);
}
