#!/bin/sh

# ambil dari git
git pull;

# migrate
php artisan migrate;