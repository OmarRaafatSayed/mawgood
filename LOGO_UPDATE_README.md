# تحديث اللوجوهات في Bagisto

تم تحديث جميع اللوجوهات في النظام بنجاح!

## الملفات التي تم تحديثها:

### لوجو الويبسايت (Shop):
- `public/themes/shop/default/assets/images/logo.svg` - اللوجو الأبيض للوضع العادي
- `public/themes/shop/default/assets/images/logo.png` - نسخة PNG
- `packages/Webkul/Shop/src/Resources/assets/images/logo.svg` - المصدر
- `packages/Webkul/Shop/src/Resources/assets/images/logo.png` - نسخة PNG

### لوجو الداشبورد (Admin):
- `public/themes/admin/default/assets/images/logo.svg` - اللوجو الأبيض للوضع العادي
- `public/themes/admin/default/assets/images/dark-logo.svg` - اللوجو الأسود للوضع المظلم
- `public/themes/admin/default/assets/images/logo.png` - نسخة PNG
- `packages/Webkul/Admin/src/Resources/assets/images/logo.svg` - المصدر
- `packages/Webkul/Admin/src/Resources/assets/images/dark-logo.svg` - المصدر للوضع المظلم
- `packages/Webkul/Admin/src/Resources/assets/images/logo.png` - نسخة PNG

### لوجو المثبت (Installer):
- `packages/Webkul/Installer/src/Resources/assets/images/installer/bagisto-logo.svg`

### التكوين:
- `storage/app/public/configuration/logo.png` - اللوجو في قاعدة البيانات

## الخطوات التالية:

1. قم بتشغيل الأمر التالي لمسح الكاش:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

2. إذا كنت تستخدم قاعدة البيانات لحفظ إعدادات اللوجو، قم بتشغيل:
   ```bash
   mysql -u [username] -p [database_name] < update_logo.sql
   ```

3. تأكد من أن الملفات لها الصلاحيات الصحيحة:
   ```bash
   chmod 644 public/themes/*/default/assets/images/logo.*
   chmod 644 packages/Webkul/*/src/Resources/assets/images/logo.*
   ```

## ملاحظات:
- اللوجو الأبيض (`logo_white.svg`) يُستخدم للوضع العادي
- اللوجو الأسود (`logo_black.svg`) يُستخدم للوضع المظلم في الداشبورد
- تم الحفاظ على نفس الأبعاد (200x50) للتوافق مع التصميم الحالي

تاريخ التحديث: $(date)