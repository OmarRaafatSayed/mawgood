# 🚀 دليل النشر على Production - Mawgood

## ✅ الملفات الجاهزة (تم إنشاؤها)
- `.env.production` - ملف البيئة للإنتاج
- `deploy-production.sh` - سكريبت النشر الآلي

---

## 📋 خطوات النشر على السيرفر

### 1️⃣ رفع الكود على السيرفر

```bash
# على السيرفر
cd /var/www/
git clone https://github.com/YOUR_USERNAME/mawgood.git
cd mawgood
```

### 2️⃣ إعداد ملف البيئة

```bash
# نسخ ملف الإنتاج
cp .env.production .env

# تعديل الإعدادات المهمة
nano .env
```

**عدّل هذه القيم:**
```env
APP_URL=https://yourdomain.com
DB_PASSWORD=كلمة_مرور_قوية_جداً
MAIL_HOST=smtp.yourdomain.com
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=كلمة_مرور_البريد
```

### 3️⃣ تثبيت المتطلبات

```bash
# تثبيت Composer dependencies
composer install --no-dev --optimize-autoloader

# تثبيت Node dependencies (إذا لزم)
npm install --production
npm run build
```

### 4️⃣ إعداد قاعدة البيانات

```bash
# إنشاء قاعدة البيانات
mysql -u root -p
CREATE DATABASE mawgood CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'mawgood_user'@'localhost' IDENTIFIED BY 'strong_password';
GRANT ALL PRIVILEGES ON mawgood.* TO 'mawgood_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

# تشغيل Migrations
php artisan migrate --force
```

### 5️⃣ إعداد Redis

```bash
# تثبيت Redis
sudo apt update
sudo apt install redis-server -y

# تشغيل Redis
sudo systemctl start redis
sudo systemctl enable redis

# اختبار Redis
redis-cli ping
# يجب أن يرجع: PONG
```

### 6️⃣ بناء الـ Caches

```bash
# مسح الـ caches القديمة
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# بناء caches جديدة
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7️⃣ ربط Storage

```bash
php artisan storage:link
```

### 8️⃣ ضبط الصلاحيات

```bash
# صلاحيات المجلدات
sudo chown -R www-data:www-data /var/www/mawgood
sudo chmod -R 755 /var/www/mawgood
sudo chmod -R 775 /var/www/mawgood/storage
sudo chmod -R 775 /var/www/mawgood/bootstrap/cache
```

### 9️⃣ إعداد Nginx

```bash
sudo nano /etc/nginx/sites-available/mawgood
```

**محتوى الملف:**
```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/mawgood/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

```bash
# تفعيل الموقع
sudo ln -s /etc/nginx/sites-available/mawgood /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### 🔟 تثبيت SSL (Let's Encrypt)

```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

### 1️⃣1️⃣ إعداد Queue Worker (اختياري)

```bash
sudo nano /etc/systemd/system/mawgood-worker.service
```

**محتوى الملف:**
```ini
[Unit]
Description=Mawgood Queue Worker
After=network.target

[Service]
User=www-data
Group=www-data
Restart=always
ExecStart=/usr/bin/php /var/www/mawgood/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600

[Install]
WantedBy=multi-user.target
```

```bash
sudo systemctl enable mawgood-worker
sudo systemctl start mawgood-worker
```

### 1️⃣2️⃣ إعداد Cron Jobs

```bash
sudo crontab -e -u www-data
```

**أضف هذا السطر:**
```
* * * * * cd /var/www/mawgood && php artisan schedule:run >> /dev/null 2>&1
```

---

## 🔍 الاختبار والتحقق

### اختبار الموقع
```bash
curl -I https://yourdomain.com
```

### مراقبة الـ Logs
```bash
tail -f /var/www/mawgood/storage/logs/laravel.log
```

### اختبار Redis
```bash
redis-cli INFO stats
```

### اختبار قاعدة البيانات
```bash
php artisan tinker
DB::connection()->getPdo();
```

---

## 🛡️ الأمان

### 1. تأمين ملف .env
```bash
chmod 600 .env
```

### 2. إخفاء معلومات السيرفر
```bash
# في nginx.conf
server_tokens off;
```

### 3. تفعيل Firewall
```bash
sudo ufw allow 22
sudo ufw allow 80
sudo ufw allow 443
sudo ufw enable
```

---

## 📊 تحسين الأداء

### 1. تفعيل OPcache
```bash
sudo nano /etc/php/8.2/fpm/php.ini
```

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
opcache.fast_shutdown=1
```

### 2. تحسين Redis
```bash
sudo nano /etc/redis/redis.conf
```

```conf
maxmemory 256mb
maxmemory-policy allkeys-lru
```

### 3. تحسين MySQL
```bash
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
```

```ini
innodb_buffer_pool_size = 1G
innodb_log_file_size = 256M
max_connections = 200
```

---

## 🔄 التحديثات المستقبلية

```bash
cd /var/www/mawgood
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
sudo systemctl restart php8.2-fpm
sudo systemctl restart nginx
```

---

## 🆘 استكشاف الأخطاء

### خطأ 500
```bash
# تحقق من الـ logs
tail -f storage/logs/laravel.log

# تحقق من الصلاحيات
ls -la storage/
```

### خطأ Redis
```bash
sudo systemctl status redis
redis-cli ping
```

### خطأ قاعدة البيانات
```bash
php artisan tinker
DB::connection()->getPdo();
```

---

## 📞 الدعم

إذا واجهت أي مشكلة:
1. تحقق من logs: `storage/logs/laravel.log`
2. تحقق من nginx logs: `/var/log/nginx/error.log`
3. تحقق من PHP logs: `/var/log/php8.2-fpm.log`

---

## ✅ Checklist النشر

- [ ] رفع الكود على السيرفر
- [ ] إعداد .env بالقيم الصحيحة
- [ ] تثبيت Composer dependencies
- [ ] إنشاء قاعدة البيانات
- [ ] تشغيل Migrations
- [ ] تثبيت وتشغيل Redis
- [ ] بناء جميع الـ Caches
- [ ] ربط Storage
- [ ] ضبط الصلاحيات
- [ ] إعداد Nginx
- [ ] تثبيت SSL
- [ ] إعداد Queue Worker
- [ ] إعداد Cron Jobs
- [ ] اختبار الموقع
- [ ] مراقبة الـ Logs

---

**🎉 بالتوفيق في النشر!**
