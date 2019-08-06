<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodos;
use App\Http\Requests\UpdateTodos;
use Illuminate\Support\Facades\Auth;
use App\Todo as Todo;

class TodoController extends Controller
{

    public function index()
    {
        return Auth::user()->todos;
    }

    public function show($id){
        $todo = Todo::findOrFail($id);
        $this->authorize('view', $todo);
        return $todo;
    }

    public function store(StoreTodos $request)
    {
        Todo::create(array_merge(['user_id' => Auth::id()], $request->validated()));
    }

    public function update(UpdateTodos $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $todo->update($request->validated());
        return $todo;
    }

    public function destroy($id)
    {
        $todoDelete = Todo::findOrFail($id);
        $this->authorize('delete', $todoDelete);
        $todoDelete->delete();

    }
}
