# Mawgood Deployment Guide

## Recent Updates Summary

### 1. OAuth Integration (Google & Facebook)
- Added Google OAuth credentials
- Added Facebook OAuth credentials
- Created account type selection page for new users

### 2. Currency Fix (EGP)
- Created `ForceEgpCurrency` middleware to enforce Egyptian Pound
- Added currency fix script (`fix-currency.php`)
- Updated `.env` configuration

### 3. Checkout & Order Success
- Fixed order success page with 2-4 days delivery timeline
- Fixed session persistence for order_id
- Fixed mailer null-check for admin email

### 4. Product Images Fix
- Added absolute URL support for product images
- Added fallback images for broken links

## Server Deployment Steps

### 1. Pull Latest Code
```bash
cd /var/www/mawgood
git pull origin main
```

### 2. Install Dependencies
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Update Environment File
Copy `.env.production` to `.env` and update:
```bash
cp .env.production .env
nano .env
```

Update these values:
- `DB_PASSWORD`: Your database password
- `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD`: Your mail server credentials

### 4. Run Artisan Commands
```bash
php artisan storage:link
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 5. Set Permissions
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### 6. Restart Services
```bash
sudo systemctl restart nginx
sudo systemctl restart php8.2-fpm
```

## Important Files Modified

### Configuration
- `.env` - Added OAuth credentials and currency settings
- `bootstrap/app.php` - Added ForceEgpCurrency middleware

### New Files
- `app/Http/Middleware/ForceEgpCurrency.php` - Currency enforcement
- `resources/views/account-type/select.blade.php` - Account type selection
- `fix-currency.php` - Currency fix script

### Modified Files
- `packages/Webkul/Admin/src/Mail/Order/CreatedNotification.php` - Null-safe email
- `packages/Webkul/Shop/src/Http/Controllers/API/OnepageController.php` - Session fix
- `packages/Webkul/Shop/src/Http/Controllers/OnepageController.php` - Order success
- `packages/Webkul/Shop/src/Resources/views/checkout/success.blade.php` - New design
- `packages/Webkul/Shop/src/Resources/views/products/view/gallery/*.blade.php` - Image fixes

## Nginx Configuration

Add to `/etc/nginx/nginx.conf`:
```nginx
client_max_body_size 64M;
```

Then restart nginx:
```bash
sudo systemctl restart nginx
```

## Troubleshooting

### Images Not Loading
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### Currency Not EGP
```bash
php fix-currency.php
php artisan config:clear
```

### OAuth Not Working
Verify in Google/Facebook Console:
- Authorized redirect URIs: `https://mawgood.cloud/customer/social-login/google/callback`
- Authorized redirect URIs: `https://mawgood.cloud/customer/social-login/facebook/callback`

## Support
For issues, check logs:
```bash
tail -f storage/logs/laravel.log
```
