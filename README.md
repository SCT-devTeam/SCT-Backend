<!-- markdownlint-disable MD012 MD022 MD024 MD041 -->

[![Maintainability](https://api.codeclimate.com/v1/badges/ccd3386e825e7c0be224/maintainability)](https://codeclimate.com/github/SCT-devTeam/SCT-Backend/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ccd3386e825e7c0be224/test_coverage)](https://codeclimate.com/github/SCT-devTeam/SCT-Backend/test_coverage)


# SCT-Backend

- [SCT-Backend](#sct-backend)
  - [Introduction](#introduction)
  - [Includes](#includes)
  - [Demo](#demo)
  - [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Steps](#steps)
  - [Roadmap](#roadmap)
  - [Project architecture](#project-architecture)


&nbsp; <!-- break line -->


## Introduction

SCT² is an open source project whose goal is for everyone to have a simple, fast and automated software to manage their business.

⚠ The project is still under development. ⚠

&nbsp; <!-- break line -->


## Includes

This project use [Laravel](https://github.com/laravel/laravel) for the API

This project use [Vue JS](https://github.com/vuejs/vue) for the BackOffice (front-part)


&nbsp; <!-- break line -->


## Demo

We have configured 2 instances of SCT² so that you can test before installing it in your home.

One instance connected to the `master` branch (stable | slow ring) available [here](https://sct-backend-prod.herokuapp.com)

One instance connected to the `dev` branch (beta | fast ring) available [here](https://sct-backend-dev.herokuapp.com)

> They are hosted by Heroku for free so they can be in sleep mode when you try to acces to it. The first page loading can be a bit slow

Use theses login credentials to connect you:
  email: `a@aa.co`
  password: `azER&é34az`


&nbsp; <!-- break line -->


## Getting Started

### Prerequisites

To install and use the projet you need some tools installed on your system:

- [Composer](https://getcomposer.org/download/)
- [npm](https://nodejs.org/en/download/)
- A web server ( [Nginx](https://docs.nginx.com/nginx/admin-guide/installing-nginx/installing-nginx-open-source/) | [Caddy](https://caddyserver.com) | [Apache](http://httpd.apache.org/download.cgi) )


### Steps

1. After [cloning](x-github-client://openRepo/https://github.com/SCT-devTeam/SCT-Backend) the project or [downloading it](https://github.com/SCT-devTeam/SCT-Backend/archive/master.zip) in `.zip` you have to check the installation section juste below.
2. In the project folder run
   1. `composer install` to install composer dependencies for Laravel
   2. `npm run build` to build the vue app
3. Create a `.env` file with the example with `cp .env.exemple .env`
4. Fill necessary keys (replace the value of the key if already filled in):
   - `APP_DEBUG=false` : This bolean allow Laravel to display debug pages on error (it is not recommended in production environment) [**'true'**, **'false'**]
   - `APP_ENV=production` : Like the previus key it's afftect the behaviour of Laravel [**'production'**, '**dev'**, **'local'**]
   - `APP_KEY` : This is a unique key used in sevreal hash generation of Laravel, run `php artisan key:generate` to auto fill this one
   - `APP_URL` : This is the Web URL to acess to the application
   - Database Keys :
     - `DATABASE_URL` : The complet connexion string

        OR

     - `DB_HOST` : The hostname to access the database
     - `DB_PORT` : The port to access the database
     - `DB_USERNAME` : The username use to connect to the databse
     - `DB_PASSWORD` : The password to connect to the database
5. Run `php artisan command:install` and follow the first installation steps
6. **You're done** ✨


&nbsp; <!-- break line -->


## Roadmap

Please check `[Unreleased]` tag in [changelog](CHANGELOG.md) to read what's next.


&nbsp; <!-- break line -->


## Project architecture

I use my own project architecture to be able to separate source code and compile one.

<!-- PHP language gives the best syntax color -->
```php
📦SCT-Backend
 ┣ 📂app
 ┃ ┣ 📂Console
 ┃ ┃ ┣ 📂Commands
 ┃ ┃ ┃ ┗ 📜install.php
 ┃ ┃ ┗ 📜Kernel.php
 ┃ ┣ 📂Exceptions
 ┃ ┣ 📂Http
 ┃ ┃ ┣ 📂Controllers
 ┃ ┃ ┃ ┣ 📂API
 ┃ ┃ ┃ ┃ ┗ 📜AuthController.php
 ┃ ┃ ┃ ┣ 📂Auth
 ┃ ┃ ┃ ┃ ┣ 📜ConfirmPasswordController.php
 ┃ ┃ ┃ ┃ ┣ 📜ForgotPasswordController.php
 ┃ ┃ ┃ ┃ ┣ 📜LoginController.php
 ┃ ┃ ┃ ┃ ┣ 📜RegisterController.php
 ┃ ┃ ┃ ┃ ┣ 📜ResetPasswordController.php
 ┃ ┃ ┃ ┃ ┗ 📜VerificationController.php
 ┃ ┃ ┃ ┣ 📜CompanyController.php
 ┃ ┃ ┃ ┣ 📜ContactController.php
 ┃ ┃ ┃ ┣ 📜Controller.php
 ┃ ┃ ┃ ┣ 📜CustomerController.php
 ┃ ┃ ┃ ┣ 📜InvoiceController.php
 ┃ ┃ ┃ ┣ 📜QuoteController.php
 ┃ ┃ ┃ ┗ 📜UserController.php
 ┃ ┃ ┣ 📂Middleware
 ┃ ┃ ┃ ┣ 📜Authenticate.php
 ┃ ┃ ┃ ┣ 📜CheckForMaintenanceMode.php
 ┃ ┃ ┃ ┣ 📜Cors.php
 ┃ ┃ ┃ ┣ 📜EncryptCookies.php
 ┃ ┃ ┃ ┣ 📜RedirectIfAuthenticated.php
 ┃ ┃ ┃ ┣ 📜TrimStrings.php
 ┃ ┃ ┃ ┣ 📜TrustProxies.php
 ┃ ┃ ┃ ┗ 📜VerifyCsrfToken.php
 ┃ ┃ ┗ 📜Kernel.php
 ┃ ┣ 📂Providers
 ┃ ┃ ┣ 📜AppServiceProvider.php
 ┃ ┃ ┣ 📜AuthServiceProvider.php
 ┃ ┃ ┣ 📜BroadcastServiceProvider.php
 ┃ ┃ ┣ 📜EventServiceProvider.php
 ┃ ┃ ┗ 📜RouteServiceProvider.php
 ┃ ┣ 📜Company.php
 ┃ ┣ 📜Contact.php
 ┃ ┣ 📜Customer.php
 ┃ ┣ 📜Invoice.php
 ┃ ┣ 📜PersonalAccessTokens.php
 ┃ ┣ 📜Quote.php
 ┃ ┗ 📜User.php
 ┣ 📂bootstrap
 ┣ 📂config
 ┃ ┣ 📜app.php
 ┃ ┣ 📜auth.php
 ┃ ┣ 📜broadcasting.php
 ┃ ┣ 📜cache.php
 ┃ ┣ 📜database.php
 ┃ ┣ 📜filesystems.php
 ┃ ┣ 📜hashing.php
 ┃ ┣ 📜ide-helper.php
 ┃ ┣ 📜logging.php
 ┃ ┣ 📜mail.php
 ┃ ┣ 📜queue.php
 ┃ ┣ 📜sanctum.php
 ┃ ┣ 📜services.php
 ┃ ┣ 📜session.php
 ┃ ┗ 📜view.php
 ┣ 📂database
 ┃ ┣ 📂factories
 ┃ ┃ ┗ 📜UserFactory.php
 ┃ ┣ 📂migrations
 ┃ ┃ ┗ 📜
 ┃ ┣ 📂seeds
 ┃ ┃ ┗ 📜DatabaseSeeder.php
 ┃ ┗ 📜.gitignore
 ┣ 📂public
 ┃ ┣ 📂frontend-assets
 ┃ ┃ ┗ 📜 '> Here all dist files used by the vue app for front-end'
 ┃ ┣ 📜.htaccess
 ┃ ┣ 📜favicon.ico
 ┃ ┣ 📜index.php
 ┃ ┣ 📜robots.txt
 ┃ ┗ 📜web.config
 ┣ 📂resources
 ┃ ┣ 📂frontend
 ┃ ┃ ┣ 📂node_modules
 ┃ ┃ ┃ ┗ 📂 '> Here are all node dependencies used by the vue app'
 ┃ ┃ ┣ 📂src
 ┃ ┃ ┃ ┣ 📂assets
 ┃ ┃ ┃ ┃ ┣ 📂fonts
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all fonts used by the vue app for front-end'
 ┃ ┃ ┃ ┃ ┣ 📂icons
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all icons used by the vue app for front-end'
 ┃ ┃ ┃ ┃ ┣ 📂illustrations
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all picture used to illustrate the vue app for front-end'
 ┃ ┃ ┃ ┃ ┣ 📂logos
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all logo variants of SCT used use in vue app for front-end'
 ┃ ┃ ┃ ┃ ┗ 📜 '> Here is some unclassed assets (temporary)'
 ┃ ┃ ┃ ┣ 📂components
 ┃ ┃ ┃ ┃ ┣ 📂Buttons
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the variants of the buttons used in the vue app'
 ┃ ┃ ┃ ┃ ┣ 📂DashboardWidgets
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the variants of the widget used in the dashboard of the vue app'
 ┃ ┃ ┃ ┃ ┣ 📂Fileds
 ┃ ┃ ┃ ┃ ┃ ┣ 📂Themed
 ┃ ┃ ┃ ┃ ┃ ┃ ┣ 📂Display
 ┃ ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the variants of themed fileds who display some data used in the vue app'
 ┃ ┃ ┃ ┃ ┃ ┃ ┣ 📂Inputs
 ┃ ┃ ┃ ┃ ┃ ┃ ┃ ┣ 📂mixins
 ┃ ┃ ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here are style and component logic shared between all themed inputs used in the vue app'
 ┃ ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the variants of the themed input used in the vue app'
 ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📂mixins
 ┃ ┃ ┃ ┃ ┃ ┃   ┗ 📜 '> Here are style and component logic shared between all themed display & inputs used in the vue app'
 ┃ ┃ ┃ ┃ ┃ ┣ 📂Transparent
 ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the variants of transparent fileds (diisplay & inputs) used in the vue app'
 ┃ ┃ ┃ ┃ ┃ ┗ 📂utils
 ┃ ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the utilities (validator) used in inputs fileds used in the vue app'
 ┃ ┃ ┃ ┃ ┣ 📂Forms
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the forms used in the vue app'
 ┃ ┃ ┃ ┃ ┣ 📂modals
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the modals used in the vue app'
 ┃ ┃ ┃ ┃ ┣ 📂Navigations
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here all the navigations components used in the vue app'
 ┃ ┃ ┃ ┃ ┗ 📜 '> Here all unclassed components used in the vue app'
 ┃ ┃ ┃ ┣ 📂router
 ┃ ┃ ┃ ┃ ┗ 📜 '> Here are all router diretives used by vuex'
 ┃ ┃ ┃ ┣ 📂scss
 ┃ ┃ ┃ ┃ ┣ 📜_colors.scss '> Here are all colors used by the style of the vue app'
 ┃ ┃ ┃ ┃ ┣ 📜_normalize.scss '> Here is style normalization used in all components'
 ┃ ┃ ┃ ┃ ┗ 📜_typography.scss '> Here are all typography style used by the style of the vue app'
 ┃ ┃ ┃ ┣ 📂store
 ┃ ┃ ┃ ┃ ┗ 📜 '> Here are all store diretives used by vuex'
 ┃ ┃ ┃ ┣ 📂views
 ┃ ┃ ┃ ┃ ┣ 📂Composed
 ┃ ┃ ┃ ┃ ┃ ┗ 📜 '> Here are all the composed views used in general views'
 ┃ ┃ ┃ ┃ ┗ 📜 '> Here are all the views used by the vue app'
 ┃ ┃ ┃ ┣ 📜App.vue '> Here is the main App vue'
 ┃ ┃ ┃ ┣ 📜index.html '> Here is the html template used by Webpack to build the vue app'
 ┃ ┃ ┃ ┗ 📜main.js '> Here is all vue declarations'
 ┃ ┃ ┣ 📜.browserslistrc '> Here are all browserslist settings'
 ┃ ┃ ┣ 📜.eslintrc.js '> Here are all eslint settings'
 ┃ ┃ ┣ 📜.gitignore '> Here are all git ignore settings'
 ┃ ┃ ┣ 📜babel.config.js '> Here are all babel settings'
 ┃ ┃ ┣ 📜package-lock.json '> Here are all sub-dependencies packages'
 ┃ ┃ ┣ 📜package.json '> Here are all project dependencies packages'
 ┃ ┃ ┗ 📜vue.config.js '> Here are all vue-cli settings'
 ┃ ┗ 📂views
 ┃ ┃ ┣ 📜frontend.blade.php '> Here is the vue compiled HTML view'
 ┃ ┃ ┗ 📜welcome.blade.php '> Here is the basic vue blade generated by Laravel'
 ┣ 📂routes
 ┃ ┣ 📜api.php
 ┃ ┣ 📜channels.php
 ┃ ┣ 📜console.php
 ┃ ┗ 📜web.php
 ┣ 📂storage
 ┣ 📂tests
 ┃ ┣ 📂Feature
 ┃ ┃ ┗ 📜ExampleTest.php
 ┃ ┣ 📂Unit
 ┃ ┃ ┗ 📜ExampleTest.php
 ┃ ┣ 📜CreatesApplication.php
 ┃ ┗ 📜TestCase.php
 ┣ 📂vendor
 ┃ ┗ 📜 '> Here are all composer dependencies'
 ┣ 📂views
 ┣ 📜.editorconfig '> Here are Jetbrain IDE settings'
 ┣ 📜.env.example '> Here is the example of `.env` file`'
 ┣ 📜.gitattributes
 ┣ 📜.gitignore
 ┣ 📜.styleci.yml
 ┣ 📜artisan
 ┣ 📜CHANGELOG.md
 ┣ 📜composer.json
 ┣ 📜composer.lock
 ┣ 📜LICENSE.md
 ┣ 📜package.json
 ┣ 📜phpunit.xml
 ┣ 📜Procfile '> Here is Haroku configuration file'
 ┣ 📜README.md
 ┣ 📜server.php
 ┣ 📜webpack.mix.js
 ┗ 📜_ide_helper.php
```
