# SCT-Backend

## Getting Started
After cloning the project or downloading it in `.zip` you have to check the installation section juste below.
### Installation 
Once you are in the project execute these commands :

-       composer install
-       cp .env.exemple .env

The last command will create the . env file with the default settings.\
You will then have to fill in these environment variables according to your case : 

- ` APP_DEBUG` : **true** or **false**
- `APP_ENV` 
- `APP_KEY` : for generate it `php artisan key:generate`
- `APP_URL`
- `DB_CONNECTION` : type of your database
- `DB_DATABASE` : name of your database
- `DB_HOST` : the hostname to access your database
- `DB_PASSWORD`
- `DB_PORT`
- `DB_USERNAME`

-       php artisan command:install
 > You have to fill in the different elements requested by the script


