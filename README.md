# BackEnd_coding_challenge
Backend section for the coding challenge

This is a coding challenge for United Remote.

You can find the FrontEnd Section [Here](https://github.com/drissboumlik/FrontEnd_coding_challenge).

# Prerequise

* You need PHP 7.1+
* Mysql
* Composer

# Installation

* Clone the project 'git clone https://github.com/DrissBoumlik/BackEnd_coding_challenge.git'
* Navigate to the project folder  'cd BackEnd_coding_challenge'
* Install dependencies 'composer install'
* Clone the environement file 'cp .env.example .env', then change mysql connection information the database name, and APP_URL value too.
* Then run the migration 'php artisan migrate'
* Seed the data 'php artisan db:seed'
* Generate auth keys 'php artisan passport:install'
* Finally generate application key 'php artisan key:generate'
* Now you are Ready To Go you can run 'php artisan serve'.
