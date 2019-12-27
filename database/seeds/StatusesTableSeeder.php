<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title'      => 'freezed'
            ],
            [
                'title'      => 'banned'
            ],
            ///
            [
                'title'      => 'student'
            ],
            [
                'title'      => 'teacher'
            ],
            ///
            [
                'title'      => 'admin'
            ],
        ];

        Status::insert($roles);

    }
}
