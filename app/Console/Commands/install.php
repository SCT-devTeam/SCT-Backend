<?php

namespace App\Console\Commands;

use App\Company;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class install extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command setup the project on first install';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $app_env = env('APP_ENV', false);
        $app_url = env('APP_URL', false);
        $app_key = env('APP_KEY', false);


        $this->info("Application running on " . $app_env . " mode");


        if (!$app_key) {
            $this->info("First install detected !");
        }

        $this->call("migrate"); // Apply migrations

        $company = null;
        $company = Company::first();

        if ($company == null) {

            $this->info("No company registered");


            $firstCompanyName = $this->ask('What\'s your company name ?');
            while (!$firstCompanyName != null || !$firstCompanyName != '') {
                $firstCompanyName = $this->ask('What\'s your company name ? (can\'t be empty !)');
            }

            $company = Company::create([
                'legal_form' => 'SA',
                'name' => $firstCompanyName,
                'email' => 'a@a.com'
            ]);

            if ($company != null) {
                $this->info('Company created !');
            } else {
                $this->error("An error has occurred on company creation, please retry");
            }
        }


        $user = null;
        $user = User::first();

        if ($user == null) {


            $this->info("No user registered");


            $firstUserFirstName = $this->ask('What\'s your firstname ?');
            while (!$firstUserFirstName != null || !$firstUserFirstName != '') {
                $firstUserFirstName = $this->ask('What\'s your firstname ? (can\'t be empty !)');
            }

            $firstUserLastName = $this->ask('What\'s your lastname ?');
            while (!$firstUserLastName != null || !$firstUserLastName != '') {
                $firstUserLastName = $this->ask('What\'s your lastname ? (can\'t be empty !)');
            }

            $firstUserGender = $this->choice('What\'s your gender ?', ['man','woman','unspecified'], 2);

            // Ask user informations with validation
            $firstUserEmail = $this->ask('What\'s your email address (used for login) ?');
            while (!filter_var($firstUserEmail, FILTER_VALIDATE_EMAIL)) {
                $firstUserEmail = $this->ask('Please enter a CORRECT email address, it is used for login !');
            }

            $firstUserPwd = Hash::make($this->secret('Please enter a STRONG password, it is used for login'));
            while (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $firstUserPwd)) {
                $this->info("A strong password begin at 8 characters with 1 lowercase + 1 CAPS + 1 number + 1 special character");
                $firstUserPwd = Hash::make($this->secret('Please enter a STRONGER password, it is used for login'));
            }

            $firstUserPhone = $this->ask("What\'s your mobile phone (Will used for A2F) ?");
            while (!$firstUserPhone != null || !$firstUserPhone != '') {
                $firstUserPhone = $this->ask('What\'s your mobile phone(Will used for A2F) ? (can\'t be empty !)');
            }

            $this->info(Company::first()->id);

            $user = User::create([
                'firstname' => $firstUserFirstName,
                'lastname' => $firstUserLastName,
                'gender' => $firstUserGender,
                'email' => $firstUserEmail,
                'pwd' => $firstUserPwd,
                'phone' => $firstUserPhone,
                'companies' => Company::first()->id,
            ]);

            if ($user != null) {
                $this->info('Account created !');
            } else {
                $this->error("An error has occurred on account creation, please retry");
            }
        }


        $this->info('Configuration finished, you can now access to the app on [' . $app_url . '] using your login previously created');

        return;
    }
}
