<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_type' => '9', //admin
            'name' => 'admin',
            'email' => 'agus.judistira@gmail.com',
            'password' => '$2y$10$/403pLIWN3/uLFYQw6ZVnuLu5gt5/Esp08c3vnJGQ47to7xW.08DC', //md5 hash
            'remember_token' => 'many different songs'
        ]);

        User::create([
            'user_type' => '7', //writer
            'name' => 'Agus Judistira',
            'email' => 'am.judistira@telfort.nl',
            'password' => '$2y$10$/403pLIWN3/uLFYQw6ZVnuLu5gt5/Esp08c3vnJGQ47to7xW.08DC', //md5 hash
            'remember_token' => 'many different songs'
        ]);
    }
}
