# 📝 كيف تضيف مقالات في موقعك؟

## 🎯 الطريقة البسيطة (CMS Pages):

### 1️⃣ افتح صفحة المقالات في الأدمن:

**الرابط المباشر:**
```
http://your-site.com/admin/cms
```

**أو من القائمة:**
```
Admin Panel → Settings → CMS → Pages
```

---

### 2️⃣ اضغط على "Create Page" (إنشاء صفحة)

ستجد زر أزرق في أعلى اليمين مكتوب عليه **"Create Page"**

---

### 3️⃣ املأ بيانات المقال:

| الحقل | ما تكتبه | مثال |
|------|---------|------|
| **Page Title** | عنوان المقال | "سياسة الخصوصية" |
| **URL Key** | رابط المقال (بدون مسافات) | `privacy-policy` |
| **HTML Content** | محتوى المقال | اكتب المقال هنا |
| **Channels** | اختر القناة | ✅ Default |
| **Meta Title** | عنوان SEO (اختياري) | "سياسة الخصوصية - موقعنا" |
| **Meta Description** | وصف SEO (اختياري) | "اقرأ سياسة الخصوصية..." |

---

### 4️⃣ احفظ المقال

اضغط على زر **"Save Page"** في الأسفل

---

### 5️⃣ شاهد المقال

المقال سيكون متاح على:
```
http://your-site.com/page/privacy-policy
```

---

## 📋 قائمة المقالات الموجودة:

لمشاهدة كل المقالات اللي أضفتها:
```
http://your-site.com/admin/cms
```

هنا هتلاقي جدول فيه:
- ✅ كل المقالات
- ✏️ زر تعديل
- 🗑️ زر حذف
- 👁️ عدد المشاهدات

---

## 🔗 إضافة رابط المقالات في الناف بار:

### للـ Desktop:
افتح ملف: `packages/Webkul/Shop/src/Resources/views/components/layouts/header/desktop/bottom.blade.php`

أضف:
```html
<a href="{{ route('shop.cms.page', 'about-us') }}">من نحن</a>
```

### للـ Mobile:
افتح ملف: `packages/Webkul/Shop/src/Resources/views/components/layouts/header/mobile/index.blade.php`

أضف في قسم Additional Pages:
```html
<a href="{{ route('shop.cms.page', 'about-us') }}">من نحن</a>
```

---

## 📸 لإضافة صور في المقال:

1. ارفع الصورة في: `public/storage/`
2. في محتوى المقال، أضف:
```html
<img src="{{ asset('storage/my-image.jpg') }}" alt="صورة">
```

---

## ✨ أمثلة جاهزة:

### مثال 1: صفحة "من نحن"
```
Page Title: من نحن
URL Key: about-us
Content: <h1>من نحن</h1><p>نحن شركة...</p>
```

### مثال 2: صفحة "سياسة الخصوصية"
```
Page Title: سياسة الخصوصية
URL Key: privacy-policy
Content: <h1>سياسة الخصوصية</h1><p>نحن نحترم خصوصيتك...</p>
```

### مثال 3: صفحة "الشروط والأحكام"
```
Page Title: الشروط والأحكام
URL Key: terms-conditions
Content: <h1>الشروط والأحكام</h1><p>بإستخدامك للموقع...</p>
```

---

## 🎨 تنسيق المحتوى:

يمكنك استخدام HTML في محتوى المقال:

```html
<h1>عنوان رئيسي</h1>
<h2>عنوان فرعي</h2>
<p>فقرة نصية</p>

<ul>
    <li>نقطة 1</li>
    <li>نقطة 2</li>
</ul>

<img src="image.jpg" alt="صورة">

<a href="link">رابط</a>
```

---

## 🔍 البحث عن مقال:

في صفحة المقالات (`/admin/cms`):
- استخدم خانة البحث في الأعلى
- ابحث بالعنوان أو URL Key

---

## ✅ الخلاصة:

**لإضافة مقال:**
1. افتح: `http://your-site.com/admin/cms`
2. اضغط: "Create Page"
3. املأ البيانات
4. احفظ
5. المقال جاهز على: `http://your-site.com/page/url-key`

**لمشاهدة كل المقالات:**
```
http://your-site.com/admin/cms
```

**لإضافة رابط في الناف بار:**
عدّل ملفات الـ header وأضف الرابط

---

## 📞 ملاحظات مهمة:

- ✅ URL Key لازم يكون بدون مسافات (استخدم `-` بدل المسافة)
- ✅ لازم تختار Channel واحد على الأقل
- ✅ المحتوى لازم يكون HTML
- ✅ يمكنك تعديل أي مقال في أي وقت
- ✅ يمكنك حذف المقالات اللي مش محتاجها

---

🎉 **الآن تقدر تضيف مقالات بسهولة!**
