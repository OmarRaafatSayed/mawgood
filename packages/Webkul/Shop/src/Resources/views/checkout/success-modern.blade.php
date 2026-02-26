@push('styles')
    <link rel="stylesheet" href="{{ bagisto_asset('css/mawgood-checkout.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700&family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    <x-slot:title>
        تم تأكيد طلبك بنجاح
    </x-slot>

    <!-- Modern Header -->
    <header class="mawgood-header">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex items-center justify-center">
                <a href="{{ route('shop.home.index') }}" class="flex items-center gap-3">
                    <img
                        src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                        alt="{{ config('app.name') }}"
                        class="h-8 md:h-10"
                    >
                </a>
            </div>
        </div>
    </header>

    <!-- Success Content -->
    <div class="min-h-screen bg-background-light flex items-center justify-center py-12 px-4">
        <div class="max-w-2xl w-full">
            <!-- Success Card -->
            <div class="mawgood-card p-8 md:p-12 text-center">
                <!-- Success Icon -->
                <div class="mawgood-success-icon">
                    <span class="material-symbols-outlined text-6xl text-white">check_circle</span>
                </div>

                <!-- Success Message -->
                <h1 class="text-3xl md:text-4xl font-bold text-primary mb-4">
                    تم تأكيد طلبك بنجاح!
                </h1>
                
                <p class="text-lg text-gray-600 mb-8">
                    شكراً لك على ثقتك بنا. سيتم معالجة طلبك في أقرب وقت ممكن.
                </p>

                <!-- Order Details -->
                @php
                    $order = session('order');
                @endphp

                @if($order)
                    <div class="bg-gray-50 rounded-2xl p-6 mb-8 text-right">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">رقم الطلب</p>
                                <p class="text-xl font-bold text-primary">#{{ $order->increment_id }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">إجمالي المبلغ</p>
                                <p class="text-xl font-bold text-accent-gold">{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">تاريخ الطلب</p>
                                <p class="text-base font-semibold text-primary">{{ core()->formatDate($order->created_at, 'd/m/Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 mb-1">حالة الطلب</p>
                                <span class="mawgood-badge">{{ $order->status_label }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items Preview -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-primary mb-4 text-right flex items-center gap-2">
                            <span class="w-1 h-6 bg-accent-gold rounded-full"></span>
                            المنتجات المطلوبة
                        </h3>
                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex items-center gap-4 bg-white rounded-xl p-4 border border-gray-100">
                                    @if($item->product && $item->product->base_image)
                                        <img
                                            src="{{ $item->product->base_image->small_image_url }}"
                                            alt="{{ $item->name }}"
                                            class="w-16 h-16 rounded-lg object-cover"
                                        >
                                    @endif
                                    <div class="flex-1 text-right">
                                        <p class="font-semibold text-primary">{{ $item->name }}</p>
                                        <p class="text-sm text-gray-500">الكمية: {{ $item->qty_ordered }}</p>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold text-primary">{{ core()->formatPrice($item->total, $order->order_currency_code) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    @if($order->shipping_address)
                        <div class="bg-gray-50 rounded-2xl p-6 mb-8 text-right">
                            <h3 class="text-lg font-bold text-primary mb-3 flex items-center gap-2">
                                <span class="material-symbols-outlined text-accent-gold">location_on</span>
                                عنوان التوصيل
                            </h3>
                            <p class="text-gray-700">{{ $order->shipping_address->name }}</p>
                            <p class="text-gray-600 text-sm mt-1">{{ $order->shipping_address->address }}</p>
                            <p class="text-gray-600 text-sm">{{ $order->shipping_address->city }}, {{ $order->shipping_address->state }}</p>
                            <p class="text-gray-600 text-sm">{{ $order->shipping_address->phone }}</p>
                        </div>
                    @endif
                @endif

                <!-- Action Buttons -->
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    @auth('customer')
                        <a
                            href="{{ route('shop.customers.account.orders.view', $order->id ?? 0) }}"
                            class="mawgood-btn-primary inline-flex items-center justify-center gap-2"
                        >
                            <span class="material-symbols-outlined">receipt_long</span>
                            <span>عرض تفاصيل الطلب</span>
                        </a>
                    @endauth

                    <a
                        href="{{ route('shop.home.index') }}"
                        class="mawgood-btn-secondary inline-flex items-center justify-center gap-2"
                    >
                        <span class="material-symbols-outlined">home</span>
                        <span>العودة للرئيسية</span>
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="flex items-center justify-center gap-2 text-gray-600">
                        <span class="material-symbols-outlined text-accent-gold">mail</span>
                        <p class="text-sm">
                            تم إرسال تأكيد الطلب إلى بريدك الإلكتروني
                        </p>
                    </div>
                </div>

                <!-- Support Section -->
                <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                    <div class="flex items-center justify-center gap-2 text-primary">
                        <span class="material-symbols-outlined">support_agent</span>
                        <p class="text-sm font-medium">
                            هل تحتاج مساعدة؟ 
                            <a href="{{ route('shop.cms.page', 'contact-us') }}" class="text-accent-gold hover:underline">
                                تواصل معنا
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Continue Shopping Section -->
            <div class="mt-8 text-center">
                <p class="text-gray-600 mb-4">اكتشف المزيد من المنتجات الرائعة</p>
                <a
                    href="{{ route('shop.home.index') }}"
                    class="mawgood-btn-accent inline-flex items-center gap-2"
                >
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <span>متابعة التسوق</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Confetti Animation (Optional) -->
    <style>
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: var(--accent-gold);
            animation: confetti-fall 3s linear;
            pointer-events: none;
            z-index: 9999;
        }
    </style>

    @push('scripts')
        <script>
            // Optional: Add confetti animation on page load
            document.addEventListener('DOMContentLoaded', function() {
                const colors = ['#FF6D00', '#003366', '#D4A017', '#4CAF50'];
                
                for (let i = 0; i < 50; i++) {
                    setTimeout(() => {
                        const confetti = document.createElement('div');
                        confetti.className = 'confetti';
                        confetti.style.left = Math.random() * 100 + '%';
                        confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                        confetti.style.animationDelay = Math.random() * 2 + 's';
                        document.body.appendChild(confetti);
                        
                        setTimeout(() => confetti.remove(), 3000);
                    }, i * 50);
                }
            });
        </script>
    @endpush
</x-shop::layouts>
