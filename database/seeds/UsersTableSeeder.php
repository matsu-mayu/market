<?php

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
                'id' => 4,
                'name' => 'testuser2',
                'password' => 'test1111',
            ],
        ];
        foreach($users as $user) {
          DB::table('users')->insert($user);
        }
    }
}