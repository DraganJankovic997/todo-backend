<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodos extends FormRequest
{


    public function rules()
    {
        $arr = ['LOW', 'MEDIUM', 'HIGH'];

        return [
            'title' => 'required|max:40',
            'description' => 'nullable|max:255',
            'priority'=>'required|in:LOW,MEDIUM,HIGH',
            'done'=>'boolean|required'
        ];
    }


}
