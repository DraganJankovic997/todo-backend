<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistration extends FormRequest
{

    public function rules()
    {
        return [
            'email'=>'required|unique:users|email',
            'password'=>'required|min:8',
            'name'=>'required'
        ];
    }
}
