<?php


namespace App\Contract;

use App\Todo as Todo;


interface TodoContract
{
    public function getAll($user);
    public function getOne(Todo $todo);
    public function addNew($todo);
    public function update($valid,Todo $todo);
    public function delete(Todo $todo);
}
