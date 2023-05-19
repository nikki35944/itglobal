<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;

class DeleteController extends BaseController
{
    public function __invoke(Task $task)
    {
        $task->delete();

        return redirect()->route('home')->with('message', 'Задача успешно удалена');
    }
}
