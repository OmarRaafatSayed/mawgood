<x-shop::layouts>
    <x-slot:title>
        اختر نوع الحساب
    </x-slot>

    <div class="container mt-20 px-8 pb-16 max-lg:px-4">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-gray-900 mb-3">مرحباً بك في موجود!</h1>
                <p class="text-lg text-gray-600">اختر نوع حسابك للمتابعة</p>
            </div>

            <form method="POST" action="{{ route('account-type.store') }}">
                @csrf
                
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Individual Account -->
                    <label class="relative cursor-pointer">
                        <input type="radio" name="account_type" value="individual" class="peer sr-only" required>
                        <div class="rounded-xl border-2 border-gray-200 p-8 text-center transition-all hover:border-blue-500 peer-checked:border-blue-600 peer-checked:bg-blue-50">
                            <div class="mb-4 flex justify-center">
                                <svg class="w-16 h-16 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">حساب فردي</h3>
                            <p class="text-gray-600 text-sm">للتسوق والشراء من الموقع</p>
                        </div>
                    </label>

                    <!-- Vendor Account -->
                    <label class="relative cursor-pointer">
                        <input type="radio" name="account_type" value="vendor" class="peer sr-only" required>
                        <div class="rounded-xl border-2 border-gray-200 p-8 text-center transition-all hover:border-green-500 peer-checked:border-green-600 peer-checked:bg-green-50">
                            <div class="mb-4 flex justify-center">
                                <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">حساب بائع</h3>
                            <p class="text-gray-600 text-sm">لبيع منتجاتك على الموقع</p>
                        </div>
                    </label>
                </div>

                @error('account_type')
                    <p class="mt-4 text-red-600 text-sm text-center">{{ $message }}</p>
                @enderror

                <div class="mt-8">
                    <button type="submit" class="w-full bg-navyBlue hover:bg-blue-800 text-white font-medium py-4 px-6 rounded-xl transition duration-200">
                        متابعة
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-shop::layouts>
