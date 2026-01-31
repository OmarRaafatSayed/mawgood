# 🎨 دليل تعديل محتوى الصفحة الرئيسية

## 📍 الطريقة 1: من لوحة التحكم (الأسهل)

### الخطوات:

1. **ادخل على لوحة تحكم الأدمن:**
   ```
   http://127.0.0.1:8000/admin
   ```

2. **اذهب إلى:**
   ```
   Settings → Channels → [اسم القناة] → Theme Customization
   ```
   أو
   ```
   Marketing → Communications → Theme Customization
   ```

3. **اضغط "Create Theme"**

4. **اختر نوع المحتوى:**

   ### أ) Image Carousel (البانر/الصور):
   - Type: `Image Carousel`
   - Name: `Main Banner`
   - Status: `Active`
   - ارفع الصور اللي عايزها
   - حدد الترتيب

   ### ب) Static Content (نصوص وصور):
   - Type: `Static Content`
   - Name: `Welcome Section`
   - HTML: اكتب الكود HTML
   ```html
   <div class="container mx-auto px-4 py-8">
       <h2 class="text-3xl font-bold text-center mb-4">
           مرحباً بك في متجرنا
       </h2>
       <p class="text-center text-gray-600">
           نقدم لك أفضل المنتجات بأفضل الأسعار
       </p>
   </div>
   ```
   - CSS: (اختياري)

   ### ج) Product Carousel (عرض المنتجات):
   - Type: `Product Carousel`
   - Name: `Featured Products`
   - Title: `المنتجات المميزة`
   - Filters:
     - Sort: `created_at`
     - Order: `desc`
     - Limit: `12`

   ### د) Category Carousel (عرض الفئات):
   - Type: `Category Carousel`
   - Name: `Main Categories`
   - Title: `تصفح الفئات`

5. **احفظ التغييرات**

---

## 📍 الطريقة 2: تعديل الصور مباشرة

### غير الصور في المجلد:
```
public/themes/mawgood/assets/images/carousel/
```

**الصور الموجودة:**
- `1.png`
- `2.png`
- `3.png`

**لتغيير الصورة:**
1. احذف الصورة القديمة
2. ضع الصورة الجديدة بنفس الاسم
3. أو غير اسم الصورة في الكود

---

## 📍 الطريقة 3: تعديل الكود مباشرة

### عدل ملف الكاروسيل:
```
resources/themes/mawgood/views/components/carousel/index.blade.php
```

**مثال - إضافة عدة صور:**
```blade
@props(['options'])

<div class="w-full">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- صورة 1 -->
            <div class="swiper-slide">
                <img 
                    src="{{ asset('themes/mawgood/assets/images/carousel/1.png') }}" 
                    alt="Banner 1"
                    class="w-full h-auto object-cover"
                />
            </div>
            
            <!-- صورة 2 -->
            <div class="swiper-slide">
                <img 
                    src="{{ asset('themes/mawgood/assets/images/carousel/2.png') }}" 
                    alt="Banner 2"
                    class="w-full h-auto object-cover"
                />
            </div>
            
            <!-- صورة 3 -->
            <div class="swiper-slide">
                <img 
                    src="{{ asset('themes/mawgood/assets/images/carousel/3.png') }}" 
                    alt="Banner 3"
                    class="w-full h-auto object-cover"
                />
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>

@push('scripts')
<script>
    new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
@endpush
```

---

## 📍 الطريقة 4: من قاعدة البيانات

### شغل الملف SQL:
```bash
mysql -u root -p mawgood < setup_theme_customization.sql
```

أو من phpMyAdmin:
1. افتح phpMyAdmin
2. اختر قاعدة البيانات `mawgood`
3. اذهب إلى SQL
4. الصق محتوى ملف `setup_theme_customization.sql`
5. اضغط Go

---

## 🎯 الخلاصة

### الطريقة الأسهل:
1. ادخل Admin Panel
2. Settings → Channels → Theme Customization
3. Create Theme
4. اختر النوع وارفع الصور/النصوص
5. احفظ

### لتغيير الصور فقط:
- ضع الصور الجديدة في:
  ```
  public/themes/mawgood/assets/images/carousel/
  ```

### لتغيير التصميم:
- عدل الملفات في:
  ```
  resources/themes/mawgood/views/
  ```

---

**ملاحظة:** بعد أي تعديل، امسح الـ cache:
```bash
php artisan cache:clear
php artisan view:clear
```
