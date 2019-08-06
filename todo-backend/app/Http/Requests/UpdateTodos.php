<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodos extends FormRequest
{


    public function rules()
    {

        return [
            'title' => 'required|max:40',
            'description' => 'nullable|max:255',
            'priority'=>'required|in:' . implode(',', Todo::ARRAY),
            'done'=>'boolean|required'
        ];
    }


}
