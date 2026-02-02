# اختبار عرض الفئات في الموبايل

## الخطوات للتأكد من عمل الفئات:

### 1. افتح الموقع على الموبايل أو استخدم Developer Tools
- اضغط F12 في المتصفح
- اختر Device Toolbar (أيقونة الموبايل)
- اختر iPhone أو أي جهاز موبايل

### 2. افتح Console للتشخيص
- في Developer Tools، اذهب لتبويب Console
- ستظهر رسائل تشخيصية عند الضغط على زر الفئات

### 3. اضغط على زر "الفئات" في الناف بار السفلي
- يجب أن يظهر Bottom Sheet من الأسفل
- يجب أن تظهر رسالة "جاري تحميل الفئات..."
- ثم تظهر الفئات

### 4. تحقق من الرسائل في Console:
```
Fetching categories...
Categories data: {data: Array(5)}
Categories loaded successfully
```

## إذا لم تظهر الفئات:

### تحقق من الأمور التالية:

1. **تأكد أن الفئات مفعلة في الأدمن:**
   - اذهب لـ Admin Panel
   - Catalog > Categories
   - تأكد أن Status = Enabled

2. **تحقق من API Response:**
   - افتح: `http://your-site.com/api/categories/tree`
   - يجب أن ترى JSON يحتوي على الفئات

3. **تحقق من Console Errors:**
   - إذا ظهر خطأ "categoriesSheet not found" = المشكلة في HTML
   - إذا ظهر خطأ "Error loading categories" = المشكلة في API

## الفئات المتوقع ظهورها:
- MENS
- Electronics
- Fashion
- Beauty
- Sports
- أي فئات أخرى مضافة من الأدمن

## ملاحظات مهمة:
- الفئات تُجلب ديناميكياً من API
- أي فئة تضيفها من الأدمن ستظهر تلقائياً
- الفئات الفرعية (Children) تظهر أيضاً
- الصور تظهر إذا كانت موجودة في الفئة

## إذا استمرت المشكلة:
1. امسح الـ Cache: `php artisan cache:clear`
2. امسح الـ View Cache: `php artisan view:clear`
3. أعد تشغيل السيرفر
