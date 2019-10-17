<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis Antonio Parrado',
            'email' => 'luisprmat@gmail.com',
            'password' => '$2y$10$9tyzKvHL9FpxiNRypqX3oOvyaJ7nmv2ohXQJH/ln2jKjnQ3UTubky', //lpklprplus
        ]);
    }
}
