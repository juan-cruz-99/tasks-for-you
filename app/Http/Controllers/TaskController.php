<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function edit(Task $task)
    {
        if (!$task->user->is(auth()->user())) {
            return redirect()->back();
        }
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, Request $request)
    {
        $data = $request->validate([
            'is_completed' => 'required',
        ]);

        $task->update($data);

        return redirect()->back();
    }

    public function create()
    {
        if (request()->user != auth()->user()->id) {
            return redirect()->back();
        }

        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'user_id' => 'required',
        ]);

        Task::create($data);

        return  redirect()->route('users_tasks', ['user' => auth()->user()->id]);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
