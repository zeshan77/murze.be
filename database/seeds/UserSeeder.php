<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Zeshan Khattak',
            'email' => 'zeshan77@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
