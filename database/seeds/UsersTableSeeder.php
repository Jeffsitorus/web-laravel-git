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
        \App\User::create([
            'username'  => 'Jeffs',
            'name'      => 'Jefri H. Sitorus',
            'email'     => 'jefrisitorus22@gmail.com',
            'password'  => bcrypt('password'),
        ]);
    }
}
