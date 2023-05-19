<?php

namespace App\Http\Controllers\Task;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;

class CreateController extends BaseController
{
    public function __invoke(Task $task)
    {
        $users = User::all();
        $statuses = Status::all();


        return view('task.create', compact('task', 'users', 'statuses'));
    }
}
