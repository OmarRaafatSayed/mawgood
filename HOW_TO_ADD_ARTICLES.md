# 📝 دليل شامل لإضافة المقالات في Mawgood

## 🎯 طريقتان لإضافة المقالات:

---

## ✅ الطريقة الأولى: استخدام CMS Pages (سريعة وبسيطة)

### الخطوات:
1. **الدخول للأدمن:**
   ```
   http://your-site.com/admin
   ```

2. **الذهاب لصفحة CMS:**
   ```
   Settings → CMS → Pages → Create Page
   ```

3. **ملء البيانات:**
   - **Page Title:** عنوان المقال
   - **URL Key:** `my-article` (بدون مسافات)
   - **Content:** محتوى المقال (HTML)
   - **Status:** Enabled ✅
   - **Channels:** اختر القناة

4. **الوصول للمقال:**
   ```
   http://your-site.com/page/my-article
   ```

### مميزات:
- ✅ سريعة وسهلة
- ✅ لا تحتاج برمجة
- ✅ مدمجة في Bagisto

### عيوب:
- ❌ لا يوجد تصنيفات
- ❌ لا يوجد نظام تعليقات
- ❌ صعب إدارة عدد كبير من المقالات

---

## 🚀 الطريقة الثانية: نظام مقالات متقدم (Blog System)

### الخطوات:

#### 1. تشغيل Migration:
```bash
cd c:\Users\EXPRESS\Downloads\coding\mawgood\mawgood
php artisan migrate
```

#### 2. إضافة Routes في `routes/web.php`:
```php
use App\Http\Controllers\BlogController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
```

#### 3. إضافة مقال من Database:
```php
use App\Models\BlogPost;

BlogPost::create([
    'title' => 'عنوان المقال',
    'slug' => 'article-slug',
    'excerpt' => 'ملخص المقال',
    'content' => '<h1>محتوى المقال</h1><p>نص المقال...</p>',
    'featured_image' => 'path/to/image.jpg',
    'author' => 'اسم الكاتب',
    'status' => 1,
    'published_at' => now()
]);
```

#### 4. أو استخدم Tinker:
```bash
php artisan tinker

>>> $post = new App\Models\BlogPost();
>>> $post->title = "مقالي الأول";
>>> $post->content = "<h1>مرحباً</h1><p>هذا مقالي الأول</p>";
>>> $post->status = 1;
>>> $post->published_at = now();
>>> $post->save();
```

#### 5. الوصول للمقالات:
```
http://your-site.com/blog           (قائمة المقالات)
http://your-site.com/blog/my-article (مقال واحد)
```

### مميزات:
- ✅ نظام كامل ومتقدم
- ✅ يدعم التصنيفات والتاجات
- ✅ عداد مشاهدات
- ✅ مقالات مشابهة
- ✅ سهل التوسع

---

## 📊 مقارنة بين الطريقتين:

| الميزة | CMS Pages | Blog System |
|--------|-----------|-------------|
| السهولة | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ |
| المرونة | ⭐⭐ | ⭐⭐⭐⭐⭐ |
| التصنيفات | ❌ | ✅ |
| البحث | محدود | متقدم |
| SEO | جيد | ممتاز |
| التوسع | صعب | سهل |

---

## 🎨 إضافة محرر نصوص متقدم (WYSIWYG Editor)

### استخدام TinyMCE:
```bash
npm install tinymce
```

أو استخدم CKEditor من Admin Panel مباشرة.

---

## 📸 رفع الصور:

### في CMS Pages:
1. استخدم Media Manager المدمج
2. أو ارفع الصور في: `public/storage/`

### في Blog System:
```php
if ($request->hasFile('featured_image')) {
    $path = $request->file('featured_image')->store('blog', 'public');
    $post->featured_image = $path;
}
```

---

## 🔗 إضافة رابط المقالات في الناف بار:

### في Desktop Header:
أضف في `header/desktop/bottom.blade.php`:
```html
<a href="{{ route('blog.index') }}">المقالات</a>
```

### في Mobile Menu:
أضف في `header/mobile/index.blade.php`:
```html
<a href="{{ route('blog.index') }}">📝 المقالات</a>
```

---

## 🎯 أمثلة عملية:

### مثال 1: إضافة مقال بسيط
```
Admin → Settings → CMS → Pages → Create
Title: "سياسة الخصوصية"
URL: privacy-policy
Content: <p>نحن نحترم خصوصيتك...</p>
```

### مثال 2: إضافة مقال متقدم
```bash
php artisan tinker

>>> BlogPost::create([
    'title' => 'دليل الشراء',
    'content' => '<h1>كيف تشتري من موقعنا</h1>...',
    'status' => 1,
    'published_at' => now()
]);
```

---

## 📚 موارد إضافية:

- [Bagisto CMS Documentation](https://bagisto.com/en/docs/)
- [Laravel Eloquent](https://laravel.com/docs/eloquent)
- [TinyMCE Editor](https://www.tiny.cloud/)

---

## ✅ الخلاصة:

**للمقالات البسيطة:** استخدم CMS Pages
**لنظام مقالات كامل:** استخدم Blog System المخصص

**الملفات المُنشأة:**
- ✅ Migration: `database/migrations/2025_01_15_000001_create_blog_posts_table.php`
- ✅ Model: `app/Models/BlogPost.php`
- ✅ Controller: `app/Http/Controllers/BlogController.php`
- ✅ Views: `resources/views/blog/index.blade.php` & `show.blade.php`

**الخطوة التالية:**
```bash
php artisan migrate
```

ثم أضف Routes في `routes/web.php` وابدأ بإضافة المقالات! 🎉
