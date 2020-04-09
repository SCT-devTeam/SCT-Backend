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
        $companie = \App\Company::create(
            [
                'name' => 'ouioui',
                'email' => 'oui@oui.com',
                'default_payment_method' => 'cash'
            ]
        );
        \App\User::create([
            'gender' => 'unspecified',
            'lastname' => 'Oui',
            'firstname' => 'Noni',
            'email' => 'a@aa.com',
            'pwd' => Hash::make('A'),
            'companies' => $companie->id
        ]);
        \App\Customer::create([
            'customer_type' => 'individual',
            'lastname' => 'cust1',
            'firstname' => 'Non',
            'company' => $companie->id
        ]);
        \App\Customer::create([
            'customer_type' => 'individual',
            'lastname' => 'aze',
            'firstname' => 'Non',
            'company' => $companie->id
        ]);

    }
}
