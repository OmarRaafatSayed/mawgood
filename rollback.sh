#!/bin/bash

# Rollback Script - Emergency Recovery
# Mawgood E-Commerce Platform

set -e

echo "╔════════════════════════════════════════════════════════════╗"
echo "║  EMERGENCY ROLLBACK SCRIPT                                 ║"
echo "║  Mawgood E-Commerce Platform                               ║"
echo "╚════════════════════════════════════════════════════════════╝"
echo ""

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

BACKUP_DIR=$1

if [ -z "$BACKUP_DIR" ]; then
    print_error "Usage: ./rollback.sh <backup_directory>"
    echo "Example: ./rollback.sh backups/20260203_120000"
    exit 1
fi

if [ ! -d "$BACKUP_DIR" ]; then
    print_error "Backup directory not found: $BACKUP_DIR"
    exit 1
fi

print_warning "This will rollback to backup: $BACKUP_DIR"
read -p "Are you sure? (yes/no): " confirm

if [ "$confirm" != "yes" ]; then
    echo "Rollback cancelled"
    exit 0
fi

echo ""
echo "🔄 Starting rollback..."
echo ""

# Step 1: Restore cache files
echo "📦 Step 1: Restoring cache files..."
if [ -d "$BACKUP_DIR/cache" ]; then
    cp -r "$BACKUP_DIR/cache/"* bootstrap/cache/ 2>/dev/null || true
    print_success "Cache files restored"
else
    print_warning "No cache backup found"
fi
echo ""

# Step 2: Clear all caches
echo "🧹 Step 2: Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
print_success "All caches cleared"
echo ""

# Step 3: Rollback migration (if needed)
echo "🗄️  Step 3: Checking for migrations to rollback..."
read -p "Rollback last migration? (yes/no): " rollback_migration

if [ "$rollback_migration" = "yes" ]; then
    php artisan migrate:rollback --step=1
    print_success "Migration rolled back"
else
    print_warning "Migration rollback skipped"
fi
echo ""

# Step 4: Rebuild caches
echo "🔨 Step 4: Rebuilding caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
print_success "Caches rebuilt"
echo ""

# Step 5: Restart services
echo "🔄 Step 5: Restarting services..."
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
sudo systemctl restart php${PHP_VERSION}-fpm 2>/dev/null || print_warning "Could not restart PHP-FPM"
sudo systemctl restart nginx 2>/dev/null || sudo systemctl restart apache2 2>/dev/null || print_warning "Could not restart web server"
print_success "Services restarted"
echo ""

echo "╔════════════════════════════════════════════════════════════╗"
echo "║  ROLLBACK COMPLETE                                         ║"
echo "╚════════════════════════════════════════════════════════════╝"
echo ""
print_success "System rolled back successfully!"
echo ""
echo "📊 Next Steps:"
echo "   1. Test the application"
echo "   2. Check logs: tail -f storage/logs/laravel.log"
echo "   3. Verify functionality"
echo ""
