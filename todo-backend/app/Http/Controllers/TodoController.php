<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodos;
use App\Http\Requests\UpdateTodos;
use App\Services\TodoService;
use App\Todo as Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * @var TodoService
     */
    private $todoService;

    /**
     * @var TodoService
     */

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index()
    {
        return $this->todoService->getAll(Auth::user());
    }

    public function show(Todo $todo){
        $this->authorize('view', $todo);
        return $this->todoService->getOne($todo);
    }

    public function store(StoreTodos $request)
    {
        $todo = array_merge(['user_id'=>Auth::id()], $request->validated());
        return $this->todoService->addNew($todo);
    }

    public function update(UpdateTodos $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $valid = $request->validated();
        return $this->todoService->update($valid, $todo);
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $this->todoService->delete($todo);
    }
}
