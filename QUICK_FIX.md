# 🚀 حل سريع - Product Visibility Quick Fix

## ❌ المشكلة
منتجات `status = ACTIVE` لا تظهر في الموقع

## ✅ الحل السريع

### 1. استخدم Scope الجديد:
```php
// ❌ قبل
Product::where('status', 1)->get();

// ✅ بعد
Product::forShop()->get();
```

### 2. شخّص المنتج:
```bash
php artisan product:diagnose 123
```

### 3. أصلح بـ SQL:
```sql
UPDATE products SET status = 1, approved_by_admin = 1 WHERE id = 123;
UPDATE product_flat SET status = 1, visible_individually = 1 WHERE product_id = 123;
```

## 📋 الشروط المطلوبة للظهور

- ✅ `status = 1`
- ✅ `visible_individually = 1`
- ✅ `url_key` موجود
- ✅ `name` موجود
- ✅ `approved_by_admin = 1` (للتجار)

## 🎯 Query النهائي

```php
Product::forShop()->paginate(20);
```

## 📚 الملفات المضافة

1. `packages/Webkul/Product/src/Models/Product.php` - تم إضافة Scopes
2. `app/Services/Product/ProductVisibilityService.php` - Service للتحقق
3. `app/Console/Commands/DiagnoseProductVisibility.php` - أمر التشخيص
4. `PRODUCT_VISIBILITY_GUIDE_AR.md` - الدليل الكامل
5. `product_visibility_queries.sql` - استعلامات SQL

## 🔧 الأوامر

```bash
# تشخيص
php artisan product:diagnose {id}

# تحديث الفهرس
php artisan indexer:index products

# مسح الكاش
php artisan cache:clear
```

## 💡 أمثلة

```php
// الصفحة الرئيسية
Product::forShop()->latest()->take(12)->get();

// فئة معينة
Product::forShop()->whereHas('categories', fn($q) => $q->where('category_id', 5))->get();

// البحث
Product::forShop()->where('name', 'like', "%{$query}%")->get();

// التحقق من رؤية منتج
$service = new ProductVisibilityService();
$isVisible = $service->isVisibleInFrontend($product);
```

## ✅ تم!

الآن كل منتج `ACTIVE` سيظهر في الموقع إذا استوفى الشروط! 🎉
