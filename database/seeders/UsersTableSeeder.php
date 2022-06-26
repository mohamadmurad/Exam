<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $userInfo = [
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'remember_token' => null,
        ];


        $admin = User::create($userInfo);

        $admin->assignrole('admin');


        $userInfo = [
            'id' => 3,
            'name' => 'student',
            'email' => 'student1@admin.com',
            'password' => Hash::make('password'),
            'remember_token' => null,
        ];
        $student = User::create($userInfo);

        $student->assignrole('student');

    }
}
