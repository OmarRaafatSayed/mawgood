# نشر التحديثات على Hostinger

## الخطوات على السيرفر:

### 1. اتصل بالسيرفر عبر SSH
```bash
ssh username@your-server-ip
# أو من cPanel → Terminal
```

### 2. اذهب لمجلد المشروع
```bash
cd /home/username/public_html
# أو المسار الصحيح للمشروع
```

### 3. اسحب التحديثات من GitHub
```bash
git pull origin main
```

### 4. نفذ الأوامر التالية:
```bash
# تحديث الـ dependencies
composer install --no-dev --optimize-autoloader

# مسح الـ cache
php artisan optimize:clear
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

# إعادة بناء الـ cache
php artisan config:cache
php artisan route:cache

# تشغيل الـ migrations (إذا كان فيه جديد)
php artisan migrate --force

# إعادة تشغيل queue workers (إذا موجود)
php artisan queue:restart
```

### 5. ضبط الصلاحيات
```bash
chmod -R 755 storage bootstrap/cache
chown -R username:username storage bootstrap/cache
```

---

## إذا كان السيرفر ما فيهوش Git:

### الطريقة البديلة (رفع يدوي):

1. **على جهازك المحلي:**
   - اضغط على المجلد كامل (zip)
   - استثني: `node_modules`, `vendor`, `.git`, `storage/framework/cache`

2. **ارفع على Hostinger:**
   - من cPanel → File Manager
   - ارفع الملف المضغوط
   - فك الضغط في مجلد المشروع

3. **نفذ الأوامر:**
```bash
composer install --no-dev
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan migrate --force
```

---

## ملاحظات مهمة:

### ✅ قبل التحديث:
- [ ] عمل backup للـ database
- [ ] عمل backup للملفات
- [ ] تأكد من `.env` صحيح

### ✅ بعد التحديث:
- [ ] اختبر الموقع
- [ ] تأكد من الفئات تظهر صح
- [ ] اختبر mobile menu
- [ ] تأكد من vendor dashboard

### ⚠️ إذا حصلت مشاكل:
```bash
# مسح كل الـ cache
php artisan optimize:clear

# إعادة تشغيل
php artisan config:cache
php artisan route:cache

# تحقق من الصلاحيات
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

---

## الأوامر السريعة (نسخ ولصق):

```bash
cd /home/username/public_html
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan migrate --force
chmod -R 755 storage bootstrap/cache
```

---

## التحقق من نجاح التحديث:

1. افتح الموقع: `https://your-domain.com`
2. اختبر mobile menu (أيقونة Categories)
3. تأكد من expand/collapse يشتغل
4. تأكد من navbar الديسكتوب نظيف (بدون فئات)

---

## إذا احتجت مساعدة:

### تحقق من الـ logs:
```bash
tail -f storage/logs/laravel.log
```

### تحقق من الـ permissions:
```bash
ls -la storage
ls -la bootstrap/cache
```

### إعادة تشغيل PHP:
```bash
# من cPanel → Select PHP Version → Restart
```
