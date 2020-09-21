<?php

namespace App\Http\Controllers;

use App\User;

class UserTaskController extends Controller
{
    public function __invoke(User $user)
    {
        $tasks = $user->tasks;

        return view('users.tasks', compact('tasks', 'user'));
    }
}
