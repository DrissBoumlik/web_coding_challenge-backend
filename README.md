# BackEnd_coding_challenge
Backend section for the coding challenge

This is a coding challenge for United Remote.

You can find the FrontEnd Section [Here](https://github.com/drissboumlik/FrontEnd_coding_challenge).

# Prerequisites

* PHP 7.1+
* Mysql
* Composer

# Installation

* Clone the project 'git clone https://github.com/DrissBoumlik/BackEnd_coding_challenge.git'
* Navigate to the project folder  'cd BackEnd_coding_challenge'
* Install dependencies 'composer install'
* Clone the environement file 'cp .env.example .env'.
* Database name : coding_challenge_db
* Then run the migration 'php artisan migrate'
* Seed the data 'php artisan db:seed'
* Generate auth keys 'php artisan passport:install'
* Finally generate application key 'php artisan key:generate'
* run 'php artisan serve' and head to http://127.0.0.1:8000
* then run to run jobs 'php artisan queue:listen database'
