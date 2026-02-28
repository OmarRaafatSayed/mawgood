<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>سجل كتاجر - Mawgood</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                "primary": "#003366",
                "accent-gold": "#FF6D00",
                "background-light": "#f8f9fa",
            },
            fontFamily: {
                "display": ["Tajawal", "sans-serif"]
            }
        }
    }
}
</script>
<style>
body { font-family: 'Tajawal', sans-serif; background-color: #f8f9fa; }
</style>
</head>
<body class="bg-background-light">
<div class="relative mx-auto max-w-md min-h-screen flex flex-col bg-background-light">
<header class="sticky top-0 z-50 flex items-center justify-between bg-white/90 backdrop-blur-md px-4 h-16 border-b border-primary/5">
<a href="{{ route('shop.customers.account.profile.index') }}" class="p-2 text-primary">
<span class="material-symbols-outlined">arrow_forward</span>
</a>
<h1 class="text-primary text-lg font-bold">سجل كتاجر</h1>
<div class="w-10"></div>
</header>

<main class="flex-1 px-4 py-6">
<div class="text-center mb-6">
<h2 class="text-2xl font-bold text-primary mb-2">انضم لعائلة موجود</h2>
<p class="text-sm text-gray-600">ابدأ البيع وحقق أرباحك معانا</p>
</div>
        
        @if ($errors->any())
            <div class="bg-red-50 border-r-4 border-red-500 text-red-700 px-4 py-3 rounded-lg mb-4">
                <ul class="text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendor.onboarding.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="bg-white rounded-lg p-4 shadow-sm border border-primary/5">
                <h3 class="font-bold text-primary mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-accent-gold">store</span>
                    معلومات المتجر
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="store_name">
                            اسم المتجر <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="store_name" id="store_name" value="{{ old('store_name') }}" 
                               placeholder="مثال: متجر الأزياء العصرية"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="store_description">
                            وصف المتجر <span class="text-red-500">*</span>
                        </label>
                        <textarea name="store_description" id="store_description" rows="4" 
                                  placeholder="اكتب وصف مختصر عن منتجاتك وخدماتك..."
                                  class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>{{ old('store_description') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="category_id">
                            التصنيف الرئيسي <span class="text-red-500">*</span>
                        </label>
                        <select name="category_id" id="category_id" 
                                class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>
                            <option value="">اختر التصنيف</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="store_logo">
                            شعار المتجر
                        </label>
                        <input type="file" name="store_logo" id="store_logo" accept="image/*"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none">
                        <p class="text-xs text-gray-500 mt-1">يفضل صورة مربعة 500x500</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-4 shadow-sm border border-primary/5">
                <h3 class="font-bold text-primary mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-accent-gold">phone</span>
                    معلومات التواصل
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="business_email">
                            البريد الإلكتروني <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="business_email" id="business_email" value="{{ old('business_email') }}" 
                               placeholder="example@domain.com"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="business_phone">
                            رقم الهاتف <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="business_phone" id="business_phone" value="{{ old('business_phone') }}" 
                               placeholder="01xxxxxxxxx" pattern="^01[0-9]{9}$"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>
                        <p class="text-xs text-gray-500 mt-1">يجب أن يبدأ بـ 01 ويتكون من 11 رقم</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="business_address">
                            عنوان المتجر <span class="text-red-500">*</span>
                        </label>
                        <textarea name="business_address" id="business_address" rows="3" 
                                  placeholder="المدينة، الحي، الشارع..."
                                  class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none" required>{{ old('business_address') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg p-4 shadow-sm border border-primary/5">
                <h3 class="font-bold text-primary mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-accent-gold">info</span>
                    معلومات إضافية
                </h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="business_name">
                            اسم الشركة
                        </label>
                        <input type="text" name="business_name" id="business_name" value="{{ old('business_name') }}" 
                               placeholder="اسم الشركة الرسمي"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="tax_id">
                            الرقم الضريبي
                        </label>
                        <input type="text" name="tax_id" id="tax_id" value="{{ old('tax_id') }}" 
                               placeholder="رقم السجل التجاري"
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="facebook_url">
                            رابط فيسبوك
                        </label>
                        <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url') }}" 
                               placeholder="https://facebook.com/..."
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-primary mb-2" for="instagram_url">
                            رابط إنستجرام
                        </label>
                        <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url') }}" 
                               placeholder="https://instagram.com/..."
                               class="w-full px-4 py-3 rounded-lg border border-primary/20 focus:border-accent-gold focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border-r-4 border-blue-500 p-4 rounded-lg">
                <p class="text-sm text-gray-700">✨ بعد إرسال الطلب، سيقوم فريقنا بمراجعة بياناتك خلال 24-48 ساعة</p>
            </div>

            <button type="submit" class="w-full py-4 bg-primary text-white font-bold rounded-lg">
                🚀 أنشئ متجرك الآن
            </button>
        </form>
    </main>
</div>

<script>
document.getElementById('business_phone').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);
    e.target.value = value;
});
</script>
</body>
</html>
