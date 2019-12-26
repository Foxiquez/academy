<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'title'      => 'Freezed'
            ],
            [
                'title'      => 'Student'
            ],
            [
                'title'      => 'Teacher'
            ],
            [
                'title'      => 'Admin'
            ],
        ];

        Role::insert($roles);

    }
}
