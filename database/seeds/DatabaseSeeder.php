<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'gender' => 'unspecified',
            'lastname' => 'Oui',
            'firstname' => 'Noni',
            'email' => 'a@aa.com',
            'pwd' => Hash::make('A'),
        ]);
    }
}
