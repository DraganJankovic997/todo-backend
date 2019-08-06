<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTodos extends FormRequest
{


    public function rules()
    {
        return [
            'do'=>'required|max:255',
            'untill'=>'required',
            'done'=>'required|boolean'
        ];
    }


}
