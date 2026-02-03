#!/bin/bash

# Pre-Deployment Checklist Script
# Run this before deploying to production

echo "╔════════════════════════════════════════════════════════════╗"
echo "║  PRE-DEPLOYMENT CHECKLIST                                  ║"
echo "║  Mawgood E-Commerce Platform                               ║"
echo "╚════════════════════════════════════════════════════════════╝"
echo ""

ERRORS=0
WARNINGS=0

# Check 1: .env file
echo "🔍 Checking .env configuration..."
if [ -f ".env" ]; then
    if grep -q "APP_ENV=local" .env; then
        echo "   ❌ APP_ENV is set to 'local' - should be 'production'"
        ERRORS=$((ERRORS + 1))
    else
        echo "   ✅ APP_ENV is correct"
    fi
    
    if grep -q "APP_DEBUG=true" .env; then
        echo "   ❌ APP_DEBUG is true - should be false in production"
        ERRORS=$((ERRORS + 1))
    else
        echo "   ✅ APP_DEBUG is correct"
    fi
    
    if grep -q "APP_URL=http://localhost" .env; then
        echo "   ⚠️  APP_URL is localhost - update to production domain"
        WARNINGS=$((WARNINGS + 1))
    else
        echo "   ✅ APP_URL is configured"
    fi
    
    if grep -q "DB_PASSWORD=$" .env || grep -q "DB_PASSWORD=\"\"" .env; then
        echo "   ❌ DB_PASSWORD is empty - set a strong password"
        ERRORS=$((ERRORS + 1))
    else
        echo "   ✅ DB_PASSWORD is set"
    fi
else
    echo "   ❌ .env file not found"
    ERRORS=$((ERRORS + 1))
fi
echo ""

# Check 2: Composer dependencies
echo "🔍 Checking Composer..."
if [ -d "vendor" ]; then
    echo "   ✅ Vendor directory exists"
else
    echo "   ⚠️  Vendor directory not found - run 'composer install'"
    WARNINGS=$((WARNINGS + 1))
fi
echo ""

# Check 3: Storage permissions
echo "🔍 Checking storage permissions..."
if [ -d "storage" ]; then
    if [ -w "storage" ]; then
        echo "   ✅ Storage directory is writable"
    else
        echo "   ❌ Storage directory is not writable"
        ERRORS=$((ERRORS + 1))
    fi
else
    echo "   ❌ Storage directory not found"
    ERRORS=$((ERRORS + 1))
fi
echo ""

# Check 4: Bootstrap cache permissions
echo "🔍 Checking bootstrap/cache permissions..."
if [ -d "bootstrap/cache" ]; then
    if [ -w "bootstrap/cache" ]; then
        echo "   ✅ Bootstrap cache is writable"
    else
        echo "   ❌ Bootstrap cache is not writable"
        ERRORS=$((ERRORS + 1))
    fi
else
    echo "   ❌ Bootstrap cache directory not found"
    ERRORS=$((ERRORS + 1))
fi
echo ""

# Check 5: Git status
echo "🔍 Checking Git status..."
if git diff-index --quiet HEAD --; then
    echo "   ✅ No uncommitted changes"
else
    echo "   ⚠️  You have uncommitted changes"
    WARNINGS=$((WARNINGS + 1))
fi
echo ""

# Check 6: Required PHP extensions
echo "🔍 Checking PHP extensions..."
REQUIRED_EXTENSIONS=("pdo" "pdo_mysql" "mbstring" "openssl" "tokenizer" "curl" "intl")
for ext in "${REQUIRED_EXTENSIONS[@]}"; do
    if php -m | grep -q "$ext"; then
        echo "   ✅ $ext is installed"
    else
        echo "   ❌ $ext is NOT installed"
        ERRORS=$((ERRORS + 1))
    fi
done
echo ""

# Check 7: Redis availability
echo "🔍 Checking Redis..."
if command -v redis-cli &> /dev/null; then
    if redis-cli ping &> /dev/null; then
        echo "   ✅ Redis is running"
    else
        echo "   ❌ Redis is not responding"
        ERRORS=$((ERRORS + 1))
    fi
else
    echo "   ⚠️  Redis CLI not found - install Redis"
    WARNINGS=$((WARNINGS + 1))
fi
echo ""

# Summary
echo "════════════════════════════════════════════════════════════"
echo ""
if [ $ERRORS -eq 0 ] && [ $WARNINGS -eq 0 ]; then
    echo "✅ ALL CHECKS PASSED! Ready for deployment."
    echo ""
    exit 0
elif [ $ERRORS -eq 0 ]; then
    echo "⚠️  $WARNINGS WARNING(S) found. Review before deployment."
    echo ""
    exit 0
else
    echo "❌ $ERRORS ERROR(S) and $WARNINGS WARNING(S) found."
    echo "   Fix errors before deploying to production!"
    echo ""
    exit 1
fi
