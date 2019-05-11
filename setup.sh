#!/bin/bash
echo started setup
composer install
npm install 
php artisan storage:link
echo finished
php artisan serve
