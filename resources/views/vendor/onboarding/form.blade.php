<x-shop::layouts>
    <x-slot:title>
        سجل كتاجر
    </x-slot>

<div class="container mx-auto px-4 py-8" dir="rtl">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-3">انضم لعائلة موجود</h1>
            <p class="text-lg text-gray-600">ابدأ البيع وحقق أرباحك معانا</p>
        </div>
        
        @if ($errors->any())
            <div class="bg-red-50 border-r-4 border-red-500 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendor.onboarding.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-xl px-8 pt-8 pb-8">
            @csrf

            <!-- معلومات المتجر -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-blue-500 pb-2">📦 معلومات المتجر</h2>
                
                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="store_name">
                        اسم المتجر <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="store_name" id="store_name" value="{{ old('store_name') }}" 
                           placeholder="مثال: متجر الأزياء العصرية"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="store_description">
                        وصف المتجر <span class="text-red-500">*</span>
                    </label>
                    <textarea name="store_description" id="store_description" rows="4" 
                              placeholder="اكتب وصف مختصر عن منتجاتك وخدماتك..."
                              class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('store_description') }}</textarea>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="category_id">
                        التصنيف الرئيسي <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" 
                            class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        <option value="">اختر التصنيف المناسب</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="store_logo">
                        شعار المتجر (اختياري)
                    </label>
                    <input type="file" name="store_logo" id="store_logo" accept="image/*"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">يفضل صورة مربعة بحجم 500x500 بكسل</p>
                </div>
            </div>

            <!-- معلومات التواصل -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-green-500 pb-2">📞 معلومات التواصل</h2>
                
                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="business_email">
                        البريد الإلكتروني <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="business_email" id="business_email" value="{{ old('business_email') }}" 
                           placeholder="example@domain.com"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="business_phone">
                        رقم الهاتف <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="business_phone" id="business_phone" value="{{ old('business_phone') }}" 
                           placeholder="01xxxxxxxxx"
                           pattern="^01[0-9]{9}$"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <p class="text-sm text-gray-500 mt-1">يجب أن يبدأ بـ 01 ويتكون من 11 رقم</p>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="business_address">
                        عنوان المتجر <span class="text-red-500">*</span>
                    </label>
                    <textarea name="business_address" id="business_address" rows="3" 
                              placeholder="المدينة، الحي، الشارع..."
                              class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('business_address') }}</textarea>
                </div>
            </div>

            <!-- معلومات إضافية (اختيارية) -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-purple-500 pb-2">ℹ️ معلومات إضافية (اختيارية)</h2>
                
                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="business_name">
                        اسم الشركة أو المؤسسة
                    </label>
                    <input type="text" name="business_name" id="business_name" value="{{ old('business_name') }}" 
                           placeholder="اسم الشركة الرسمي (إن وجد)"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="mb-5">
                    <label class="block text-gray-800 text-base font-semibold mb-2" for="tax_id">
                        الرقم الضريبي / السجل التجاري
                    </label>
                    <input type="text" name="tax_id" id="tax_id" value="{{ old('tax_id') }}" 
                           placeholder="رقم السجل التجاري (إن وجد)"
                           class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-gray-800 text-base font-semibold mb-2" for="facebook_url">
                            رابط فيسبوك
                        </label>
                        <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url') }}" 
                               placeholder="https://facebook.com/..."
                               class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-gray-800 text-base font-semibold mb-2" for="instagram_url">
                            رابط إنستجرام
                        </label>
                        <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url') }}" 
                               placeholder="https://instagram.com/..."
                               class="shadow-sm border border-gray-300 rounded-lg w-full py-3 px-4 text-gray-700 text-right focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border-r-4 border-blue-500 p-4 mb-6 rounded">
                <p class="text-sm text-gray-700">✨ بعد إرسال الطلب، سيقوم فريقنا بمراجعة بياناتك والتواصل معك خلال 24-48 ساعة</p>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-black hover:bg-gray-900 text-white font-bold py-4 px-12 rounded-xl text-lg shadow-2xl transform transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-gray-600">
                    🚀 أنشئ متجرك الآن
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Phone validation
document.getElementById('business_phone').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 11) value = value.slice(0, 11);
    e.target.value = value;
});
</script>
</x-shop::layouts>
