<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\StoreRequest;
use App\Models\Task;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        Task::firstOrCreate($data);

        return redirect()->route('home')->with('message', 'Задача успешно добавлена');
    }
}
