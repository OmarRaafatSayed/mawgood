@echo off
echo ========================================
echo Mawgood HTTP 500 Error Fix Script
echo ========================================
echo.

echo Step 1: Checking MySQL Service...
net start | find "MySQL" >nul
if %errorlevel% equ 0 (
    echo [OK] MySQL is running
) else (
    echo [ERROR] MySQL is NOT running!
    echo Starting MySQL...
    net start MySQL80
    if %errorlevel% neq 0 (
        echo [FAILED] Could not start MySQL. Please start it manually.
        pause
        exit /b 1
    )
)
echo.

echo Step 2: Clearing Laravel Caches...
call php artisan route:clear
call php artisan config:clear
call php artisan view:clear
call php artisan cache:clear
echo [OK] Caches cleared
echo.

echo Step 3: Regenerating Autoload Files...
call composer dump-autoload
echo [OK] Autoload regenerated
echo.

echo Step 4: Testing Database Connection...
call php artisan migrate:status
if %errorlevel% neq 0 (
    echo [ERROR] Database connection failed!
    echo Please check your .env file database settings.
    pause
    exit /b 1
)
echo [OK] Database connection successful
echo.

echo ========================================
echo Fix Complete! Try accessing your site now.
echo ========================================
pause
