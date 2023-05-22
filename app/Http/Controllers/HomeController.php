<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Task\BaseController;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    public function index()
    {

        $tasks = Task::join('users', 'tasks.user_id', '=' , 'users.id')
            ->join('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select(
                'tasks.*',
                'users.name as user_name',
                'users.lastname as user_lastname',
                'statuses.title as status_title',
            )
            ->filter()->paginate(10);

        $currentDateTime = $this->service->getCurrentDatetime();


        return view('home', compact('tasks', 'currentDateTime'));
    }
}
