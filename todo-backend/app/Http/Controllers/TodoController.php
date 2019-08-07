<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodos;
use App\Http\Requests\UpdateTodos;
use App\Services\TodoService;
use App\Todo as Todo;

class TodoController extends Controller
{

    /**
     * @var TodoService
     */
    private $todoService;

    function __construct()
    {
        $this->todoService = new TodoService();
    }

    public function index()
    {
        return $this->todoService->getAll();
    }

    public function show(Todo $todo){
        $this->authorize('view', $todo);
        return $this->todoService->getOne($todo);
    }

    public function store(StoreTodos $request)
    {
        return $this->todoService->addNew($request);
    }

    public function update(UpdateTodos $request, Todo $todo)
    {
        return $this->todoService->update($request, $todo);
    }

    public function destroy(Todo $todo)
    {
        $this->todoService->delete($todo);
    }
}
