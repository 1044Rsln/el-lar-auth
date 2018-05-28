<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Task;
use App\User;

class TaskPolicy {

    use HandlesAuthorization;

    /**
     * Определяем, может ли данный пользователь удалить данную задачу.
     *
     * @param  User  $user
     * @param  Task  $task
     * @return bool
     */
    public function destroy(User $user, Task $task) {
        return $user->id === $task->user_id;
    }
    
}
