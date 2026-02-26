<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.onepage.index.checkout')"/>
    <meta name="keywords" content="@lang('shop::app.checkout.onepage.index.checkout')"/>
@endPush

@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', 'Tajawal', sans-serif; background: #f5f7f8; }
    </style>
@endPush

<x-shop::layouts
    :has-header="false"
    :has-feature="false"
    :has-footer="false"
>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.checkout.onepage.index.checkout')
    </x-slot>

    {!! view_render_event('bagisto.shop.checkout.onepage.header.before') !!}

    <!-- Modern Header -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-[#FF6B00]/5">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="{{ route('shop.home.index') }}" class="flex items-center">
                    @php
                        $logoUrl = core()->getCurrentChannel()->logo_url;
                        if ($logoUrl && !file_exists(public_path(parse_url($logoUrl, PHP_URL_PATH)))) {
                            $logoUrl = bagisto_asset('images/logo.svg');
                        }
                    @endphp
                    <img src="{{ $logoUrl ?: bagisto_asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-8" onerror="this.src='{{ bagisto_asset('images/logo.svg') }}'">
                </a>
                @guest('customer')
                    @include('shop::checkout.login')
                @endguest
            </div>
        </div>
    </header>

    {!! view_render_event('bagisto.shop.checkout.onepage.header.after') !!}

    <!-- Page Content -->
    <div class="container px-[60px] max-lg:px-8 max-sm:px-4">

        {!! view_render_event('bagisto.shop.checkout.onepage.breadcrumbs.before') !!}

        <!-- Breadcrumbs -->
        @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
            <x-shop::breadcrumbs name="checkout" />
        @endif

        {!! view_render_event('bagisto.shop.checkout.onepage.breadcrumbs.after') !!}

        <!-- Checkout Vue Component -->
        <v-checkout>
            <!-- Shimmer Effect -->
            <x-shop::shimmer.checkout.onepage />
        </v-checkout>
    </div>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-checkout-template"
        >
            <template v-if="! cart">
                <!-- Shimmer Effect -->
                <x-shop::shimmer.checkout.onepage />
            </template>

            <template v-else>
                <div class="grid lg:grid-cols-3 gap-6 py-6">
                    <div class="lg:col-span-2 space-y-6">
                        <template v-if="['address', 'shipping', 'payment', 'review'].includes(currentStep)">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                                <div class="flex items-center justify-between mb-4 pb-4 border-b">
                                    <div class="flex items-center gap-3">
                                        <span class="w-10 h-10 rounded-full bg-[#FF6B00] text-white flex items-center justify-center font-bold">1</span>
                                        <h2 class="text-xl font-bold text-slate-800">عنوان التوصيل</h2>
                                    </div>
                                    <button v-if="currentStep !== 'address'" @click="stepForward('address')" class="text-[#FF6B00] hover:text-[#E65F00] font-medium flex items-center gap-1">
                                        <span class="material-symbols-outlined">edit</span>
                                        <span>تعديل</span>
                                    </button>
                                </div>
                                <div v-show="currentStep === 'address'">
                                    @include('shop::checkout.onepage.address')
                                </div>
                            </div>
                        </template>

                        <template v-if="cart.have_stockable_items && ['shipping', 'payment', 'review'].includes(currentStep)">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                                <div class="flex items-center justify-between mb-4 pb-4 border-b">
                                    <div class="flex items-center gap-3">
                                        <span class="w-10 h-10 rounded-full bg-[#FF6B00] text-white flex items-center justify-center font-bold">2</span>
                                        <h2 class="text-xl font-bold text-slate-800">طريقة الشحن</h2>
                                    </div>
                                    <button v-if="currentStep !== 'shipping'" @click="stepForward('shipping')" class="text-[#FF6B00] hover:text-[#E65F00] font-medium flex items-center gap-1">
                                        <span class="material-symbols-outlined">edit</span>
                                        <span>تعديل</span>
                                    </button>
                                </div>
                                <div v-show="currentStep === 'shipping'">
                                    @include('shop::checkout.onepage.shipping')
                                </div>
                            </div>
                        </template>

                        <template v-if="['payment', 'review'].includes(currentStep)">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                                <div class="flex items-center justify-between mb-4 pb-4 border-b">
                                    <div class="flex items-center gap-3">
                                        <span class="w-10 h-10 rounded-full bg-[#FF6B00] text-white flex items-center justify-center font-bold">3</span>
                                        <h2 class="text-xl font-bold text-slate-800">طريقة الدفع</h2>
                                    </div>
                                    <button v-if="currentStep !== 'payment'" @click="stepForward('payment')" class="text-[#FF6B00] hover:text-[#E65F00] font-medium flex items-center gap-1">
                                        <span class="material-symbols-outlined">edit</span>
                                        <span>تعديل</span>
                                    </button>
                                </div>
                                <div v-show="currentStep === 'payment'">
                                    @include('shop::checkout.onepage.payment')
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 sticky top-24">
                            <h2 class="text-2xl font-bold text-[#FF6B00] mb-6 flex items-center gap-2">
                                <span class="w-1 h-8 bg-[#FF6B00] rounded-full"></span>
                                ملخص الطلب
                            </h2>
                            <div class="space-y-3 mb-6 max-h-64 overflow-y-auto">
                                <div v-for="item in cart.items" :key="item.id" class="flex gap-3 pb-3 border-b">
                                    <img :src="item.base_image.small_image_url" :alt="item.name" class="w-16 h-16 rounded-lg object-cover">
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-slate-800">@{{ item.name }}</p>
                                        <div class="flex items-center justify-between mt-1">
                                            <span class="text-xs text-gray-500">الكمية: @{{ item.quantity }}</span>
                                            <span class="text-sm font-bold text-[#FF6B00]">@{{ item.formatted_total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">المجموع الفرعي</span>
                                    <span class="font-semibold">@{{ cart.formatted_sub_total }}</span>
                                </div>
                                <div v-if="cart.selected_shipping_rate" class="flex justify-between py-2 border-b">
                                    <span class="text-gray-600">الشحن</span>
                                    <span class="font-semibold">@{{ cart.selected_shipping_rate.formatted_price }}</span>
                                </div>
                                <div class="flex justify-between py-3 text-xl font-bold text-[#FF6B00] border-t-2">
                                    <span>الإجمالي</span>
                                    <span>@{{ cart.formatted_grand_total }}</span>
                                </div>
                            </div>
                            <div v-if="canPlaceOrder" class="mt-6">
                                <template v-if="cart.payment_method == 'paypal_smart_button'">
                                    <v-paypal-smart-button></v-paypal-smart-button>
                                </template>
                                <template v-else>
                                    <button @click="placeOrder" :disabled="isPlacingOrder" class="w-full px-6 py-3 bg-[#FF6B00] text-white rounded-full font-bold hover:bg-[#E65F00] transition-colors flex items-center justify-center gap-2">
                                        <span v-if="isPlacingOrder" class="animate-spin material-symbols-outlined">progress_activity</span>
                                        <span v-else class="material-symbols-outlined">check_circle</span>
                                        <span>@{{ isPlacingOrder ? 'جاري تأكيد الطلب...' : 'تأكيد الطلب' }}</span>
                                    </button>
                                </template>
                            </div>
                            <div class="mt-6 flex items-center justify-center gap-2 text-sm text-gray-500">
                                <span class="material-symbols-outlined text-green-600">lock</span>
                                <span>عملية دفع آمنة ومشفرة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </script>

        <script type="module">
            app.component('v-checkout', {
                template: '#v-checkout-template',

                data() {
                    return {
                        cart: null,

                        displayTax: {
                            prices: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_prices') }}",

                            subtotal: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_subtotal') }}",
                            
                            shipping: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount') }}",
                        },

                        isPlacingOrder: false,

                        currentStep: 'address',

                        shippingMethods: null,

                        paymentMethods: null,

                        canPlaceOrder: false,
                    }
                },

                mounted() {
                    this.getCart();
                },

                methods: {
                    getCart() {
                        this.$axios.get("{{ route('shop.checkout.onepage.summary') }}")
                            .then(response => {
                                this.cart = response.data.data;

                                this.scrollToCurrentStep();
                            })
                            .catch(error => {});
                    },

                    stepForward(step) {
                        this.currentStep = step;

                        if (step == 'review') {
                            this.canPlaceOrder = true;

                            return;
                        }

                        this.canPlaceOrder = false;

                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = null;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = null;
                        }
                    },

                    stepProcessed(data) {
                        if (this.currentStep == 'shipping') {
                            this.shippingMethods = data;
                        } else if (this.currentStep == 'payment') {
                            this.paymentMethods = data;
                        }

                        this.getCart();
                    },

                    scrollToCurrentStep() {
                        let container = document.getElementById('steps-container');

                        if (! container) {
                            return;
                        }

                        container.scrollIntoView({
                            behavior: 'smooth',
                            block: 'end'
                        });
                    },

                    placeOrder() {
                        this.isPlacingOrder = true;

                        this.$axios.post('{{ route('shop.checkout.onepage.orders.store') }}')
                            .then(response => {
                                if (response.data.data.redirect) {
                                    window.location.href = response.data.data.redirect_url;
                                } else {
                                    window.location.href = '{{ route('shop.checkout.onepage.success') }}';
                                }

                                this.isPlacingOrder = false;
                            })
                            .catch(error => {
                                this.isPlacingOrder = false

                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    }
                },
            });
        </script>
    @endPushOnce
</x-shop::layouts>
