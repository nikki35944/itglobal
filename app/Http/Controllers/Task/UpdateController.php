<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\UpdateRequest;
use App\Models\Task;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Task $task)
    {

        $data = $request->validated();
        $this->service->update($task, $data);

        return redirect()->route('task.edit', $task->id)->with('message', 'Задача успешно обновлена');
    }
}
