<?php

namespace App\Console\Commands;

use App\Http\Controllers\API\AuthController;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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

        $this->info("Application running on " . $app_env . " mode");

        $this->call("migrate"); // Apply migrations

        $user = null;
        $user = User::getFirstUser();

        if ($user == null) {

            $this->info("First install detected !");

            // Set basic user informations
            $firstUser = [
                'firstname' => $this->ask('What\'s your firstname ?'),
                'lastname' => $this->ask('What\'s your lastname ?'),
                'gender' => $this->choice('What\'s your gender ?', ['man','woman','unspecified'], 0),
            ];

            // Ask user informations with validation
            $firstUserEmail = $this->ask('What\'s your email address (used for login) ?');
            while (!filter_var($firstUserEmail, FILTER_VALIDATE_EMAIL)) {
                $firstUserEmail = $this->ask('Please enter a CORRECT email address, it is used for login !');
            }

            $firstUserPwd = $this->secret('Please enter a strong password (used for login)');
            while (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $firstUserPwd)) {
                $this->info("A strong password begin at 8 characters with 1 lowercase + 1 CAPS + 1 number + 1 special character");
                $firstUserPwd = $this->secret('Please enter a STRONGER password, it is used for login');
            }

            $firstUserPhone = $this->ask("What\'s your mobile phone (Will used for A2F) ?");

            $firstUser += [
                'email' => $firstUserEmail,
                'pwd' => $firstUserPwd,
                'phone' => $firstUserPhone,
            ];

            $user = User::create($firstUser);

            if ($user != null) {
                $this->info('Account created !');

                $this->info('Configuration finished, you can now access to the app on [' . $app_url . '] using your login previously created');
            } else {
                $this->error("An error has occurred on account creation, please retry");
            }
        }
        return;
    }
}
