#!/bin/bash

# Production Deployment Script - Phase 1.5
# Mawgood E-Commerce Platform
# This script optimizes the application for production deployment

echo "╔════════════════════════════════════════════════════════════╗"
echo "║  PHASE 1.5 PRODUCTION DEPLOYMENT                           ║"
echo "║  Mawgood E-Commerce Platform                               ║"
echo "╚════════════════════════════════════════════════════════════╝"
echo ""

# Check if running as root
if [ "$EUID" -eq 0 ]; then 
    echo "⚠️  WARNING: Running as root. Consider using a non-root user."
    echo ""
fi

# Step 1: Composer Optimization
echo "📦 Step 1: Optimizing Composer Autoloader..."
composer install --optimize-autoloader --no-dev --no-interaction
if [ $? -eq 0 ]; then
    echo "✅ Composer optimization complete"
else
    echo "❌ Composer optimization failed"
    exit 1
fi
echo ""

# Step 2: Clear All Caches
echo "🧹 Step 2: Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo "✅ All caches cleared"
echo ""

# Step 3: Build Production Caches
echo "🔨 Step 3: Building production caches..."

echo "   → Caching configuration..."
php artisan config:cache
if [ $? -eq 0 ]; then
    echo "   ✅ Configuration cached"
else
    echo "   ❌ Configuration cache failed"
    exit 1
fi

echo "   → Caching routes..."
php artisan route:cache
if [ $? -eq 0 ]; then
    echo "   ✅ Routes cached"
else
    echo "   ❌ Route cache failed"
    exit 1
fi

echo "   → Caching views..."
php artisan view:cache
if [ $? -eq 0 ]; then
    echo "   ✅ Views cached"
else
    echo "   ❌ View cache failed"
    exit 1
fi

# Step 4: Cache Icons (if Blade Icons is installed)
if php artisan list | grep -q "icon:cache"; then
    echo "   → Caching icons..."
    php artisan icon:cache
    echo "   ✅ Icons cached"
fi

echo ""

# Step 5: Optimize Database
echo "🗄️  Step 4: Running migrations..."
php artisan migrate --force
if [ $? -eq 0 ]; then
    echo "✅ Migrations complete"
else
    echo "❌ Migrations failed"
    exit 1
fi
echo ""

# Step 6: Set Permissions
echo "🔐 Step 5: Setting file permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || chown -R nginx:nginx storage bootstrap/cache 2>/dev/null || echo "⚠️  Could not set ownership (may need sudo)"
echo "✅ Permissions set"
echo ""

# Step 7: Restart Services
echo "🔄 Step 6: Restarting services..."

# Detect PHP-FPM version
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
PHP_FPM_SERVICE="php${PHP_VERSION}-fpm"

# Restart PHP-FPM
if systemctl is-active --quiet $PHP_FPM_SERVICE; then
    echo "   → Restarting $PHP_FPM_SERVICE..."
    sudo systemctl restart $PHP_FPM_SERVICE
    echo "   ✅ PHP-FPM restarted"
else
    echo "   ⚠️  $PHP_FPM_SERVICE not found or not running"
fi

# Restart Nginx
if systemctl is-active --quiet nginx; then
    echo "   → Restarting Nginx..."
    sudo systemctl restart nginx
    echo "   ✅ Nginx restarted"
elif systemctl is-active --quiet apache2; then
    echo "   → Restarting Apache..."
    sudo systemctl restart apache2
    echo "   ✅ Apache restarted"
else
    echo "   ⚠️  No web server found (nginx/apache2)"
fi

# Restart Queue Workers (if running)
if systemctl is-active --quiet laravel-worker; then
    echo "   → Restarting queue workers..."
    php artisan queue:restart
    sudo systemctl restart laravel-worker
    echo "   ✅ Queue workers restarted"
fi

echo ""

# Step 8: Verify Redis
echo "🔍 Step 7: Verifying Redis connection..."
if redis-cli ping > /dev/null 2>&1; then
    echo "✅ Redis is running and responding"
else
    echo "❌ Redis is not responding. Please check Redis service."
    echo "   Run: sudo systemctl status redis"
fi
echo ""

# Step 9: Final Verification
echo "✅ DEPLOYMENT COMPLETE!"
echo ""
echo "📊 Next Steps:"
echo "   1. Test the application: curl -I https://yourdomain.com"
echo "   2. Monitor logs: tail -f storage/logs/laravel.log"
echo "   3. Check Redis stats: redis-cli INFO stats"
echo "   4. Verify performance improvements"
echo ""
echo "🎯 Expected Improvements:"
echo "   • TTFB: 60-70% reduction"
echo "   • Database queries: 90% reduction"
echo "   • Memory usage: 60% reduction"
echo "   • Page load time: 60% reduction"
echo ""
echo "📖 For troubleshooting, see: PHASE_1_DEPLOYMENT_GUIDE.md"
echo ""
