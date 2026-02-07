# خطوات رفع التحديثات من GitHub للسيرفر

## الخطوات بالترتيب:

### 1. على جهازك المحلي:
```bash
# تأكد من رفع التحديثات على GitHub
git add -A
git commit -m "وصف التحديث"
git push origin main
```

---

### 2. على السيرفر (SSH):

```bash
# 1. اتصل بالسيرفر
ssh root@your-server-ip
# أو من cPanel → Terminal

# 2. اذهب لمجلد المشروع
cd /var/www/mawgood

# 3. احفظ التعديلات المحلية مؤقتاً (إذا كان فيه)
git stash

# 4. اسحب التحديثات من GitHub
git pull origin main

# 5. تحديث الـ dependencies
composer install --no-dev --optimize-autoloader

# 6. مسح كل الـ cache
php artisan optimize:clear

# 7. إعادة بناء الـ cache
php artisan config:cache
php artisan route:cache

# 8. تشغيل الـ migrations الجديدة
php artisan migrate --force

# 9. ضبط الصلاحيات
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# 10. إعادة تشغيل PHP
systemctl restart php8.3-fpm
```

---

## الأوامر كلها مرة واحدة (نسخ ولصق):

```bash
cd /var/www/mawgood && \
git stash && \
git pull origin main && \
composer install --no-dev --optimize-autoloader && \
php artisan optimize:clear && \
php artisan config:cache && \
php artisan route:cache && \
php artisan migrate --force && \
chmod -R 755 storage bootstrap/cache && \
chown -R www-data:www-data storage bootstrap/cache && \
systemctl restart php8.3-fpm
```

---

## ملاحظات مهمة:

### ✅ قبل التحديث:
- [ ] عمل backup للـ database
- [ ] تأكد من `.env` صحيح
- [ ] تأكد من رفع التحديثات على GitHub

### ✅ بعد التحديث:
- [ ] اختبر الموقع
- [ ] تحقق من الـ logs: `tail -f storage/logs/laravel.log`

### ⚠️ إذا حصلت مشاكل:

```bash
# مسح كل الـ cache
php artisan optimize:clear

# إعادة بناء
php artisan config:cache
php artisan route:cache

# تحقق من الصلاحيات
ls -la storage/
```

---

## المشاكل الشائعة:

### 1. مشكلة Git merge:
```bash
git stash
git pull origin main
```

### 2. مشكلة Database:
```bash
php artisan config:clear
php artisan migrate --force
```

### 3. مشكلة Permissions:
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 4. مشكلة Cache:
```bash
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
```

---

## الأوامر السريعة للطوارئ:

```bash
# إعادة تشغيل كل حاجة
cd /var/www/mawgood
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
systemctl restart php8.3-fpm
```

---

**احفظ الملف ده للرجوع ليه** ✅
