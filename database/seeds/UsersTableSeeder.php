<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'login'           => 'Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('admin'),
                'status'          => 1
            ],
        ];

        User::insert($users);

    }
}
