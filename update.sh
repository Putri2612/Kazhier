#!/bin/sh

# ambil dari git
git pull;

# migrate
php artisan migrate;

# reload cache route
php artisan route:cache;