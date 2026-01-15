<x-shop::layouts>
    <x-slot:title>
        {{ app()->getLocale() === 'ar' ? 'اختر نوع الحساب' : 'Select Account Type' }}
    </x-slot>

    <div class="container mx-auto px-4 py-16">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 text-center">
            <h1 class="text-3xl font-bold mb-4">{{ app()->getLocale() === 'ar' ? 'اختر نوع الحساب' : 'Select Your Account Type' }}</h1>
            <p class="text-gray-600 mb-6">{{ app()->getLocale() === 'ar' ? 'ساعدنا في تخصيص تجربتك عن طريق اختيار نوع الحساب المناسب.' : 'Help us personalize your experience by selecting the appropriate account type.' }}</p>

            <form method="POST" action="{{ route('shop.customers.store-account-type') }}">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <label class="block cursor-pointer rounded-lg p-6 border border-gray-200 hover:shadow-md">
                        <input type="radio" name="user_type" value="customer" class="hidden" checked />

                        <div class="text-left">
                            <h3 class="text-xl font-semibold">{{ app()->getLocale() === 'ar' ? 'فرد / باحث عن عمل' : 'Individual / Job Seeker' }}</h3>
                            <p class="text-gray-600 mt-2">{{ app()->getLocale() === 'ar' ? 'ابحث عن وظائف وقدم طلبات بسهولة.' : 'Search and apply for jobs easily.' }}</p>
                        </div>
                    </label>

                    <label class="block cursor-pointer rounded-lg p-6 border border-gray-200 hover:shadow-md">
                        <input type="radio" name="user_type" value="vendor" class="hidden" />

                        <div class="text-left">
                            <h3 class="text-xl font-semibold">{{ app()->getLocale() === 'ar' ? 'أصحاب العمل / بائع' : 'Employer / Vendor' }}</h3>
                            <p class="text-gray-600 mt-2">{{ app()->getLocale() === 'ar' ? 'انشر وظائف أو افتح متجرك لإضافة منتجات.' : 'Post jobs or open a store to add products.' }}</p>
                        </div>
                    </label>
                </div>

                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 rounded-xl bg-[#042a4a] text-white text-lg font-bold">
                    {{ app()->getLocale() === 'ar' ? 'حفظ ومتابعة' : 'Save and Continue' }}
                </button>
            </form>
        </div>
    </div>
</x-shop::layouts>