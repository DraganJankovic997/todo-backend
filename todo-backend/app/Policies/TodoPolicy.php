<?php

namespace App\Policies;

use App\User;
use App\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Todo $todo)
    {
        return $this->checkOwner($user, $todo);
    }

    public function update(User $user, Todo $todo)
    {
        return $this->checkOwner($user, $todo);
    }

    public function delete(User $user, Todo $todo)
    {
        return $this->checkOwner($user, $todo);
    }

    private function checkOwner(User $user, Todo $todo)
    {
        return $user->id === $todo->user_id;
    }

}
