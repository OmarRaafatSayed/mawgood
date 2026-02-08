#!/bin/bash

echo "========================================="
echo "Starting MySQL and Fixing 500 Error"
echo "========================================="

# Start MySQL via XAMPP
echo "Starting MySQL..."
"/c/xampp/mysql_start.bat"
sleep 3

# Clear Laravel caches
echo "Clearing caches..."
php artisan route:clear
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Regenerate autoload
echo "Regenerating autoload..."
composer dump-autoload

echo "========================================="
echo "Done! Try accessing your site now."
echo "========================================="
