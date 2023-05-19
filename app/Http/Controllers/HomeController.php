<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Task\BaseController;
use App\Models\Task;

class HomeController extends BaseController
{
    public function index()
    {
        $tasks = Task::with('user')->with('status')->filter()->paginate(10);

        $currentDateTime = $this->service->getCurrentDatetime();


        return view('home', compact('tasks', 'currentDateTime'));
    }
}
