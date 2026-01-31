# دليل تغيير صور قسم "العب مع إضافاتنا الجديدة!"

## الطريقة 1: من لوحة الإدارة (الأسهل) ✅

1. اذهب إلى: **الإعدادات → القنوات → تخصيص القالب**
2. ابحث عن القسم: **"العب مع إضافاتنا الجديدة!"** أو **"The game with our new additions!"**
3. اضغط على **تعديل**
4. قم بتحميل الصور الجديدة من خلال واجهة التحرير
5. احفظ التغييرات

---

## الطريقة 2: استبدال الصور مباشرة في المجلد

### الصور الحالية موجودة في:
```
c:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\storage\app\public\theme\5\
```

### الصور المستخدمة حالياً (3 صور):
1. `MJLZN2knHke36qDF6uf7xYDsE81Qlu9pBLNtfXPk.webp` (الصورة الأولى)
2. `4JI0uTHbcRYK7xI6wX7ksxpjumYhzkpODSByzxkl.webp` (الصورة الثانية)
3. `dn1GpyUrsmt47yOcB5j17Eky176FsPsl0dGifC1M.webp` (الصورة الثالثة)

### خطوات الاستبدال:
1. احذف الصور القديمة من المجلد أعلاه
2. ضع صورك الجديدة بنفس الأسماء
3. أو ضع صور بأسماء جديدة وقم بتحديث قاعدة البيانات (الطريقة 3)

**ملاحظة:** يجب أن تكون الصور بصيغة `.webp` أو قم بتحويلها

---

## الطريقة 3: تحديث قاعدة البيانات مباشرة

### الخطوة 1: رفع الصور الجديدة
```bash
# ضع صورك الجديدة في المجلد:
c:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\storage\app\public\theme\5\
```

### الخطوة 2: تحديث قاعدة البيانات
```bash
php artisan tinker
```

ثم نفذ الكود التالي (استبدل أسماء الصور بأسماء صورك الجديدة):

```php
$htmlAr = '<div class="top-collection-container"><div class="top-collection-header"><h2>العب مع إضافاتنا الجديدة!</h2></div><div class="top-collection-grid container"><div class="top-collection-card"><img src="" data-src="storage/theme/5/صورة1.webp" class="lazy" width="396" height="396" alt="العب مع إضافاتنا الجديدة!"><h3>مجموعاتنا</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/5/صورة2.webp" class="lazy" width="396" height="396" alt="العب مع إضافاتنا الجديدة!"><h3>مجموعاتنا</h3></div><div class="top-collection-card"><img src="" data-src="storage/theme/5/صورة3.webp" class="lazy" width="396" height="396" alt="العب مع إضافاتنا الجديدة!"><h3>مجموعاتنا</h3></div></div></div>';

$trans = DB::table('theme_customization_translations')->where('theme_customization_id', 5)->where('locale', 'ar')->first();
$options = json_decode($trans->options, true);
$options['html'] = $htmlAr;
DB::table('theme_customization_translations')->where('id', $trans->id)->update(['options' => json_encode($options)]);

echo 'تم التحديث';
```

### الخطوة 3: مسح الكاش
```bash
php artisan cache:clear
```

---

## الطريقة 4: تحديث SQL مباشر

```sql
-- عرض البيانات الحالية
SELECT id, locale, options 
FROM theme_customization_translations 
WHERE theme_customization_id = 5;

-- تحديث الصور (استبدل أسماء الصور)
UPDATE theme_customization_translations 
SET options = JSON_SET(
    options, 
    '$.html', 
    '<div class="top-collection-container">...</div>'
)
WHERE theme_customization_id = 5 AND locale = 'ar';
```

---

## ملخص الطرق:

| الطريقة | السهولة | الأمان | متى تستخدمها |
|---------|---------|--------|--------------|
| **1. لوحة الإدارة** | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | الأفضل للاستخدام اليومي |
| **2. استبدال الملفات** | ⭐⭐⭐⭐ | ⭐⭐⭐⭐ | تغيير سريع بنفس الأسماء |
| **3. Tinker** | ⭐⭐⭐ | ⭐⭐⭐ | تغيير أسماء الصور |
| **4. SQL مباشر** | ⭐⭐ | ⭐⭐ | للمطورين فقط |

---

## نصائح مهمة:

1. ✅ استخدم صور بصيغة `.webp` للأداء الأفضل
2. ✅ حجم الصور الموصى به: 396x396 بكسل
3. ✅ احتفظ بنسخة احتياطية قبل التعديل
4. ✅ امسح الكاش دائماً بعد التغيير: `php artisan cache:clear`
5. ✅ تأكد من رفع الصور في المجلد الصحيح

---

## مسارات مهمة:

- **مجلد الصور الفعلي:** `storage/app/public/theme/5/`
- **الرابط العام:** `http://127.0.0.1:8000/storage/theme/5/اسم_الصورة.webp`
- **جدول قاعدة البيانات:** `theme_customization_translations`
- **ID القسم:** 5
