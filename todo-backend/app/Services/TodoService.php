<?php


namespace App\Services;

use App\Contract\TodoContract as TodoContract;
use App\Todo as Todo;

class TodoService implements TodoContract
{
    public function getAll($user)
    {
        return $user->todos;
    }

    public function getOne(Todo $todo)
    {
        return $todo;
    }

    public function addNew($todo)
    {
        return Todo::create($todo);
    }

    public function update($valid, Todo $todo)
    {
        $todo->update($valid);
        return $todo;
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return $todo;
    }


}
