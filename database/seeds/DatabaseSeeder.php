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
        $company = \App\Company::create(
            [
                'legal_form' => 'AE_FR',
                'name' => 'The yes company',
                'siret'=>'055123698',
                'email' => 'contact@company.com',
                'phone' => '0607080910',
                'city' => 'Lyon',
                'default_payment_terms' => 'default condition',
                'default_payment_method' => 'cash',
            ]
        );

        $company1 = \App\Company::create(
            [
                'legal_form' => 'SA_FR',
                'name' => 'The cool enterprise',
                'siret'=>'078542198',
                'email' => 'contact@coolkid.com',
                'phone' => '0607080910',
                'city' => 'Paris',
                'default_payment_terms' => 'default condition',
                'default_payment_method' => 'bank_transfer',
            ]
        );

        \App\User::create([
            'gender' => 'unspecified',
            'lastname' => 'a',
            'firstname' => 'a',
            'email' => 'a@aa.co',
            'pwd' => Hash::make('azER&é34az'),
            'companies' => $company->id
        ]);

        \App\User::create([
            'gender' => 'woman',
            'lastname' => 'Foo',
            'firstname' => 'Barr',
            'email' => 'foo@barr.com',
            'pwd' => Hash::make('azER&é34az'),
            'companies' => $company->id
        ]);

        \App\User::create([
            'gender' => 'woman',
            'lastname' => 'Foolou',
            'firstname' => 'Berhaer',
            'email' => 'lou@barer.com',
            'pwd' => Hash::make('azER&é34az'),
            'companies' => $company1->id
        ]);

        \App\Customer::create([
            'customer_type' => 'individual',
            'lastname' => 'cust1',
            'firstname' => 'Non',
            'company' => $company->id
        ]);


        \App\Customer::create([
            'customer_type' => 'individual',
            'status' => 'active',
            'company_name'=>'TY customer',
            'lastname' => 'cust2',
            'firstname' => 'Non',
            'city'=>'Lyon',
            'company' => $company->id
        ]);
        \App\Customer::create([
            'customer_type' => 'professional',
            'status' => 'archived',
            'company_name'=>'Mp doila',
            'lastname' => 'Jhon',
            'firstname' => 'Fiz',
            'city'=>'Paris',
            'company' => $company->id
        ]);
        \App\Customer::create([
            'customer_type' => 'individual',
            'status' => 'prospect',
            'company_name'=>'I\'m a tea bag',
            'lastname' => 'Gérald',
            'firstname' => 'Ken',
            'city'=>'Lyon',
            'company' => $company->id
        ]);
        $customer = \App\Customer::create([
            'customer_type' => 'professional',
            'status' => 'deleted',
            'company_name'=>'Material Darker',
            'lastname' => 'Eddith',
            'firstname' => 'Coco',
            'city'=>'Grenoble',
            'company' => $company->id
        ]);
        \App\Customer::create([
            'customer_type' => 'individual',
            'status' => 'active',
            'company_name'=>'Tee puter',
            'lastname' => 'Gonmar',
            'firstname' => 'Chela',
            'city'=>'Lyon',
            'company' => $company1->id
        ]);
        $customer1 = \App\Customer::create([
            'customer_type' => 'professional',
            'status' => 'archived',
            'company_name'=>'Amabook',
            'lastname' => 'Zone',
            'firstname' => 'Face',
            'city'=>'Lyon',
            'company' => $company1->id
        ]);

        \App\Contact::create([
            'gender' => 'man',
            'firstname' => 'Math',
            'lastname' => 'Porter',
            'email' => 'm.porter@materialdarker.com',
            'notes' => '',
            'customer' => $customer->id,
        ]);
        \App\Contact::create([
            'gender' => 'man',
            'firstname' => 'Jason',
            'lastname' => 'Filpter',
            'email' => 'j.filpter@materialdarker.com',
            'notes' => '',
            'customer' => $customer->id,
                ]);
        \App\Contact::create([
            'gender' => 'woman',
            'firstname' => 'Jane',
            'lastname' => 'Rodger',
            'email' => 'jane.r@palmashow.fr',
            'notes' => '',
            'customer' => $customer1->id,
                ]);
        \App\Contact::create([
            'gender' => 'woman',
            'firstname' => 'Noa',
            'lastname' => 'Lurasa',
            'email' => 'nouali@materialdarker.com',
            'notes' => '',
            'customer' => $customer->id,
                ]);
        \App\Contact::create([
            'gender' => 'unspecified',
            'firstname' => 'Patricia',
            'lastname' => 'Polui',
            'email' => 'pp@test@co',
            'notes' => '',
            'customer' => $customer1->id,
                ]);

    }
}
