<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.onepage.index.checkout')"/>
    <meta name="keywords" content="@lang('shop::app.checkout.onepage.index.checkout')"/>
@endPush

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
        @lang('shop::app.checkout.onepage.index.checkout')
    </x-slot>

    <!-- Modern Header -->
    <header class="mawgood-header">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('shop.home.index') }}" class="flex items-center gap-3">
                    @php
                        $logoUrl = core()->getCurrentChannel()->logo_url;
                        if ($logoUrl && !file_exists(public_path(parse_url($logoUrl, PHP_URL_PATH)))) {
                            $logoUrl = bagisto_asset('images/logo.svg');
                        }
                    @endphp
                    <img
                        src="{{ $logoUrl ?: bagisto_asset('images/logo.svg') }}"
                        alt="{{ config('app.name') }}"
                        class="h-8 md:h-10"
                        onerror="this.src='{{ bagisto_asset('images/logo.svg') }}'"
                    >
                </a>

                <!-- Progress Indicator -->
                <div class="hidden md:flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-accent-gold text-white flex items-center justify-center font-bold">1</div>
                        <span class="text-sm font-medium text-primary">العنوان</span>
                    </div>
                    <div class="w-12 h-0.5 bg-gray-200"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">2</div>
                        <span class="text-sm font-medium text-gray-500">الشحن</span>
                    </div>
                    <div class="w-12 h-0.5 bg-gray-200"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold">3</div>
                        <span class="text-sm font-medium text-gray-500">الدفع</span>
                    </div>
                </div>

                <!-- User Info -->
                @guest('customer')
                    @include('shop::checkout.login')
                @endguest
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="min-h-screen bg-background-light pb-32">
        <div class="container mx-auto px-4 md:px-8 py-6">
            
            <!-- Breadcrumbs -->
            @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
                <div class="mb-6">
                    <x-shop::breadcrumbs name="checkout" />
                </div>
            @endif

            <!-- Checkout Component -->
            <v-checkout>
                <x-shop::shimmer.checkout.onepage />
            </v-checkout>
        </div>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-checkout-template">
            <template v-if="!cart">
                <x-shop::shimmer.checkout.onepage />
            </template>

            <template v-else>
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Left Column - Checkout Steps -->
                    <div class="lg:col-span-2 space-y-6">
                        
                        <!-- Step 1: Address -->
                        <div class="mawgood-step" v-if="['address', 'shipping', 'payment', 'review'].includes(currentStep)">
                            <div class="mawgood-step-header">
                                <div class="mawgood-step-title">
                                    <span class="mawgood-step-number">1</span>
                                    <span>عنوان التوصيل</span>
                                </div>
                                <button
                                    v-if="currentStep !== 'address'"
                                    @click="stepForward('address')"
                                    class="text-accent-gold hover:text-primary transition-colors font-medium flex items-center gap-1"
                                >
                                    <span class="material-symbols-outlined">edit</span>
                                    <span>تعديل</span>
                                </button>
                            </div>
                            
                            <div v-show="currentStep === 'address'">
                                @include('shop::checkout.onepage.address')
                            </div>

                            <div v-show="currentStep !== 'address' && cart.billing_address" class="bg-gray-50 rounded-xl p-4">
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-accent-gold text-2xl">location_on</span>
                                    <div>
                                        <p class="font-semibold text-primary">@{{ cart.billing_address.first_name }} @{{ cart.billing_address.last_name }}</p>
                                        <p class="text-gray-600 text-sm mt-1">@{{ cart.billing_address.address }}</p>
                                        <p class="text-gray-600 text-sm">@{{ cart.billing_address.city }}, @{{ cart.billing_address.state }}</p>
                                        <p class="text-gray-600 text-sm">@{{ cart.billing_address.phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Shipping -->
                        <div class="mawgood-step" v-if="cart.have_stockable_items && ['shipping', 'payment', 'review'].includes(currentStep)">
                            <div class="mawgood-step-header">
                                <div class="mawgood-step-title">
                                    <span class="mawgood-step-number">2</span>
                                    <span>طريقة الشحن</span>
                                </div>
                                <button
                                    v-if="currentStep !== 'shipping'"
                                    @click="stepForward('shipping')"
                                    class="text-accent-gold hover:text-primary transition-colors font-medium flex items-center gap-1"
                                >
                                    <span class="material-symbols-outlined">edit</span>
                                    <span>تعديل</span>
                                </button>
                            </div>
                            
                            <div v-show="currentStep === 'shipping'">
                                @include('shop::checkout.onepage.shipping')
                            </div>

                            <div v-show="currentStep !== 'shipping' && cart.selected_shipping_rate" class="bg-gray-50 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <span class="material-symbols-outlined text-accent-gold text-2xl">local_shipping</span>
                                        <div>
                                            <p class="font-semibold text-primary">@{{ cart.selected_shipping_rate.method_title }}</p>
                                            <p class="text-gray-600 text-sm">@{{ cart.selected_shipping_rate.method_description }}</p>
                                        </div>
                                    </div>
                                    <span class="font-bold text-primary text-lg">@{{ cart.selected_shipping_rate.formatted_price }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Payment -->
                        <div class="mawgood-step" v-if="['payment', 'review'].includes(currentStep)">
                            <div class="mawgood-step-header">
                                <div class="mawgood-step-title">
                                    <span class="mawgood-step-number">3</span>
                                    <span>طريقة الدفع</span>
                                </div>
                                <button
                                    v-if="currentStep !== 'payment'"
                                    @click="stepForward('payment')"
                                    class="text-accent-gold hover:text-primary transition-colors font-medium flex items-center gap-1"
                                >
                                    <span class="material-symbols-outlined">edit</span>
                                    <span>تعديل</span>
                                </button>
                            </div>
                            
                            <div v-show="currentStep === 'payment'">
                                @include('shop::checkout.onepage.payment')
                            </div>

                            <div v-show="currentStep !== 'payment' && cart.payment" class="bg-gray-50 rounded-xl p-4">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-accent-gold text-2xl">payment</span>
                                    <div>
                                        <p class="font-semibold text-primary">@{{ cart.payment.method_title }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column - Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="mawgood-summary">
                            <h2 class="text-2xl font-bold text-primary mb-6 flex items-center gap-2">
                                <span class="w-1 h-8 bg-accent-gold rounded-full"></span>
                                ملخص الطلب
                            </h2>

                            <!-- Cart Items Preview -->
                            <div class="space-y-3 mb-6 max-h-64 overflow-y-auto mawgood-hide-scrollbar">
                                <div v-for="item in cart.items" :key="item.id" class="flex gap-3 pb-3 border-b border-gray-100">
                                    <img :src="item.base_image.small_image_url" :alt="item.name" class="w-16 h-16 rounded-lg object-cover">
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-primary line-clamp-2">@{{ item.name }}</p>
                                        <div class="flex items-center justify-between mt-1">
                                            <span class="text-xs text-gray-500">الكمية: @{{ item.quantity }}</span>
                                            <span class="text-sm font-bold text-primary">@{{ item.formatted_total }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Summary Details -->
                            <div class="space-y-3">
                                <div class="mawgood-summary-row">
                                    <span class="text-gray-600">المجموع الفرعي</span>
                                    <span class="font-semibold text-primary">@{{ cart.formatted_sub_total }}</span>
                                </div>

                                <div v-if="cart.selected_shipping_rate" class="mawgood-summary-row">
                                    <span class="text-gray-600">الشحن</span>
                                    <span class="font-semibold text-primary">@{{ cart.selected_shipping_rate.formatted_price }}</span>
                                </div>

                                <div v-if="cart.formatted_tax_total" class="mawgood-summary-row">
                                    <span class="text-gray-600">الضريبة</span>
                                    <span class="font-semibold text-primary">@{{ cart.formatted_tax_total }}</span>
                                </div>

                                <div v-if="cart.formatted_discount" class="mawgood-summary-row">
                                    <span class="text-gray-600">الخصم</span>
                                    <span class="font-semibold text-green-600">- @{{ cart.formatted_discount }}</span>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="mawgood-summary-total">
                                <span>الإجمالي</span>
                                <span>@{{ cart.formatted_grand_total }}</span>
                            </div>

                            <!-- Place Order Button -->
                            <div v-if="canPlaceOrder" class="mt-6">
                                <template v-if="cart.payment_method == 'paypal_smart_button'">
                                    <v-paypal-smart-button></v-paypal-smart-button>
                                </template>

                                <template v-else>
                                    <button
                                        @click="placeOrder"
                                        :disabled="isPlacingOrder"
                                        class="mawgood-btn-primary w-full flex items-center justify-center gap-2"
                                    >
                                        <span v-if="isPlacingOrder" class="mawgood-spinner"></span>
                                        <span v-else class="material-symbols-outlined">check_circle</span>
                                        <span>@{{ isPlacingOrder ? 'جاري تأكيد الطلب...' : 'تأكيد الطلب' }}</span>
                                    </button>
                                </template>
                            </div>

                            <!-- Security Badge -->
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
                        window.scrollTo({
                            top: 0,
                            behavior: 'smooth'
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
                                this.isPlacingOrder = false;
                                this.$emitter.emit('add-flash', { type: 'error', message: error.response.data.message });
                            });
                    }
                },
            });
        </script>
    @endpushOnce
</x-shop::layouts>
