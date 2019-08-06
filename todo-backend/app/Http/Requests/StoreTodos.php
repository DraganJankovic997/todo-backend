<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodos extends FormRequest
{
    public function auth(){
        return true;
    }
    public function rules()
    {
        return [
            'do' => 'required|max:255',
            'untill' => 'required',
        ];
    }
}
