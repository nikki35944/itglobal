<?php

namespace App\Service\Task;


class Service
{
    public function update($task, $data)
    {
        if ($data['status_id'] == 3) {
            $currentDate = date('Y-m-d H:i:s');
            $data['completion_time'] = $currentDate;
        }

        $task->update($data);
    }


    public function getCurrentDatetime()
    {
        date_default_timezone_set('Europe/Moscow');
        return date('Y-m-d H:i:s');
    }

}
