@echo off
echo.
echo ========================================
echo   ADMIN ASSET VERIFICATION REPORT
echo ========================================
echo.

echo [1] Checking Icon Font File...
if exist "public\themes\admin\default\build\assets\bagisto-admin-*.woff" (
    echo [OK] Icon font file found
    dir /B public\themes\admin\default\build\assets\bagisto-admin-*.woff
) else (
    echo [ERROR] Icon font file NOT found
)
echo.

echo [2] Checking Compiled CSS...
if exist "public\themes\admin\default\build\assets\app-*.css" (
    echo [OK] CSS files found
    dir /B public\themes\admin\default\build\assets\app-*.css
) else (
    echo [ERROR] CSS files NOT found
)
echo.

echo [3] Checking Storage Symlink...
if exist "public\storage" (
    echo [OK] Storage symlink exists
) else (
    echo [ERROR] Storage symlink missing
)
echo.

echo [4] Checking APP_URL Configuration...
findstr "APP_URL" .env
echo.

echo [5] Cache Status...
echo Run: php artisan config:cache
echo.

echo ========================================
echo   VERIFICATION COMPLETE
echo ========================================
echo.
echo NEXT STEPS:
echo 1. Clear your browser cache (Ctrl+Shift+R)
echo 2. Open Admin Dashboard: http://127.0.0.1:8000/admin
echo 3. Check if icons appear correctly
echo.
echo If icons still missing, check browser console (F12)
echo for 404 errors on font files.
echo.
pause
