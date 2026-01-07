@echo off
echo تحديث اللوجوهات - مسح الكاش
echo ================================

echo مسح كاش Laravel...
php artisan cache:clear

echo مسح كاش التكوين...
php artisan config:clear

echo مسح كاش العروض...
php artisan view:clear

echo مسح كاش المسارات...
php artisan route:clear

echo إعادة تحميل التكوين...
php artisan config:cache

echo تم الانتهاء من مسح الكاش بنجاح!
echo يمكنك الآن تحديث المتصفح لرؤية اللوجوهات الجديدة.

pause