<?php


namespace App\Services;

use App\Todo as Todo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTodos;
use App\Http\Requests\UpdateTodos;
use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoService
{
    use AuthorizesRequests;
    public function getAll()
    {
        return Auth::user()->todos;
    }

    public function getOne(Todo $todo)
    {
        $this->authorize('view', $todo);
        return $todo;
    }

    public function addNew(StoreTodos $request)
    {
        return Todo::create(array_merge(['user_id'=>Auth::id()], $request->validated()));
    }

    public function update(UpdateTodos $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $todo->update($request->validated());
        return $todo;
    }

    public function delete(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
    }


}
