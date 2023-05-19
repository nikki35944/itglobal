<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                "title" => 'Добавлена'
            ],
            [
                "title" => 'В работе'
            ],
            [
                "title" => 'Завершена'
            ],

        ]);
    }
}
