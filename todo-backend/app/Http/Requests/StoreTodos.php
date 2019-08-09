<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Todo as Todo;

class StoreTodos extends FormRequest
{
    public function auth(){
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required|max:40',
            'description' => 'nullable|max:255',
            'priority'=>'required|in:' . implode(',', Todo::ARRAY),
        ];
    }
}
