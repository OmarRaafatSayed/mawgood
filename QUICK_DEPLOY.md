# 🚀 خطوات سريعة للنشر على السيرفر

## 📥 على السيرفر - نفذ هذه الأوامر بالترتيب:

### 1. رفع الكود
```bash
cd /var/www/
git clone https://github.com/OmarRaafatSayed/mawgood.git
cd mawgood
```

### 2. إعداد البيئة
```bash
cp .env.production .env
nano .env
# عدّل: APP_URL, DB_PASSWORD, MAIL_*
```

### 3. التثبيت
```bash
composer install --no-dev --optimize-autoloader
```

### 4. قاعدة البيانات
```bash
# إنشاء DB
mysql -u root -p -e "CREATE DATABASE mawgood CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Migrations
php artisan migrate --force
```

### 5. Redis
```bash
sudo apt install redis-server -y
sudo systemctl start redis
sudo systemctl enable redis
```

### 6. التحضير
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

### 7. الصلاحيات
```bash
sudo chown -R www-data:www-data /var/www/mawgood
sudo chmod -R 755 /var/www/mawgood
sudo chmod -R 775 /var/www/mawgood/storage
sudo chmod -R 775 /var/www/mawgood/bootstrap/cache
```

### 8. Nginx
```bash
sudo nano /etc/nginx/sites-available/mawgood
# انسخ الإعدادات من PRODUCTION_DEPLOYMENT_GUIDE.md

sudo ln -s /etc/nginx/sites-available/mawgood /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### 9. SSL
```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d yourdomain.com
```

### 10. اختبار
```bash
curl -I https://yourdomain.com
tail -f storage/logs/laravel.log
```

---

## ✅ تم إنشاء الملفات التالية:

1. **`.env.production`** - ملف البيئة للإنتاج (عدّل القيم المطلوبة)
2. **`PRODUCTION_DEPLOYMENT_GUIDE.md`** - دليل شامل مفصل
3. **`pre-deploy-check.sh`** - سكريبت فحص قبل النشر
4. **`deploy-production.sh`** - سكريبت النشر الآلي (موجود مسبقاً)

---

## ⚠️ مهم جداً - عدّل هذه القيم في .env:

```env
APP_URL=https://yourdomain.com          # دومين موقعك
DB_PASSWORD=كلمة_مرور_قوية              # كلمة مرور قاعدة البيانات
MAIL_HOST=smtp.yourdomain.com           # سيرفر البريد
MAIL_USERNAME=noreply@yourdomain.com    # بريد الإرسال
MAIL_PASSWORD=كلمة_مرور_البريد          # كلمة مرور البريد
```

---

## 📞 للدعم
راجع الملف: `PRODUCTION_DEPLOYMENT_GUIDE.md` للتفاصيل الكاملة
