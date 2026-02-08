# تكوين النظام - اللغة والعملة

## ✅ التغييرات المنفذة

### 1. إعدادات البيئة (.env)
```env
APP_LOCALE=ar              # اللغة الافتراضية: العربية
APP_FALLBACK_LOCALE=en     # اللغة الاحتياطية: الإنجليزية
APP_TIMEZONE=Africa/Cairo  # المنطقة الزمنية: القاهرة
APP_CURRENCY=EGP           # العملة الافتراضية: الجنيه المصري
```

### 2. إعدادات القناة (Channel)
- **اللغة الافتراضية:** العربية (ar)
- **العملة الأساسية:** الجنيه المصري (EGP)

### 3. إعدادات النظام الأساسية
- **general.locale_options.default:** ar
- **general.currency_options.default:** EGP

### 4. اتجاه اللغات
- **العربية (ar):** من اليمين لليسار (RTL)
- **الإنجليزية (en):** من اليسار لليمين (LTR)

### 5. العملات المتاحة
- **الأساسية:** الجنيه المصري (EGP)
- **الثانوية:** الدولار الأمريكي (USD)

## التحقق من التطبيق

### في المتصفح
1. افتح: `http://127.0.0.1:8000`
2. يجب أن يظهر الموقع بالعربية
3. الأسعار بالجنيه المصري (EGP)
4. الاتجاه من اليمين لليسار

### في لوحة التحكم
1. افتح: `http://127.0.0.1:8000/admin`
2. اللغة الافتراضية: العربية
3. العملة الافتراضية: EGP

## الأوامر المنفذة

```bash
# تحديث إعدادات .env
APP_LOCALE=ar
APP_FALLBACK_LOCALE=en
APP_TIMEZONE=Africa/Cairo
APP_CURRENCY=EGP

# تحديث القناة
php artisan tinker --execute="Channel::first()->update([
    'default_locale_id' => Locale::where('code', 'ar')->first()->id,
    'base_currency_id' => Currency::where('code', 'EGP')->first()->id
]);"

# تحديث الإعدادات الأساسية
CoreConfig::updateOrCreate(['code' => 'general.locale_options.default'], ['value' => 'ar']);
CoreConfig::updateOrCreate(['code' => 'general.currency_options.default'], ['value' => 'EGP']);

# مسح الذاكرة المؤقتة
php artisan config:clear
php artisan config:cache
php artisan cache:clear
php artisan view:clear
```

## ملاحظات

- اللغة الافتراضية للنظام الآن هي **العربية**
- العملة الافتراضية هي **الجنيه المصري (EGP)**
- اللغة الإنجليزية متاحة كلغة ثانوية
- الدولار الأمريكي متاح كعملة ثانوية
- المنطقة الزمنية: القاهرة (Africa/Cairo)

## التبديل بين اللغات

يمكن للمستخدمين التبديل بين العربية والإنجليزية من:
- قائمة اللغات في الموقع
- إعدادات الحساب

## التبديل بين العملات

يمكن عرض الأسعار بـ:
- الجنيه المصري (EGP) - الافتراضي
- الدولار الأمريكي (USD) - ثانوي

---

**الحالة:** ✅ مكتمل
**التاريخ:** 2025
