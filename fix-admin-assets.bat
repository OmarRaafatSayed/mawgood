@echo off
echo ========================================
echo Admin Dashboard Asset Repair Script
echo ========================================
echo.

echo [1/5] Clearing all Laravel caches...
php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear
echo Done!
echo.

echo [2/5] Re-establishing storage symlink...
php artisan storage:link
echo Done!
echo.

echo [3/5] Verifying APP_URL configuration...
findstr "APP_URL" .env
echo.
echo NOTE: Ensure APP_URL matches your browser URL (http://127.0.0.1:8000)
echo.

echo [4/5] Checking compiled assets...
if exist "public\themes\admin\default\build\assets\bagisto-admin-*.woff" (
    echo [OK] Icon font file found
) else (
    echo [WARNING] Icon font file missing - assets may need rebuilding
)
echo.

echo [5/5] Asset verification complete!
echo.
echo ========================================
echo NEXT STEPS:
echo 1. Hard refresh your browser (Ctrl+Shift+R or Ctrl+F5)
echo 2. Clear browser cache completely
echo 3. If icons still missing, check browser console for 404 errors
echo ========================================
pause
