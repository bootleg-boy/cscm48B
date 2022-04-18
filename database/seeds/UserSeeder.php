<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'role'     => 'admin',
            'password' => Hash::make('1234')
        ]);

        DB::table('users')->insert([
            'name'     => 'User',
            'email'    => 'user@example.com',
            'role'     => 'user',
            'password' => Hash::make('1234')
        ]);
    }
}