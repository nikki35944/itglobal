<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(Task $task)
    {
        $users = User::all();
        $statuses = Status::all();


        return view('task.edit', compact('task', 'users', 'statuses'));
    }
}
