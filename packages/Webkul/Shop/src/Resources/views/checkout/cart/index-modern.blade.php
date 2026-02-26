<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="@lang('shop::app.checkout.cart.index.cart')"/>
    <meta name="keywords" content="@lang('shop::app.checkout.cart.index.cart')"/>
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
        @lang('shop::app.checkout.cart.index.cart')
    </x-slot>

    <!-- Modern Header -->
    <header class="mawgood-header">
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('shop.home.index') }}" class="flex items-center gap-3">
                    <img
                        src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}"
                        alt="{{ config('app.name') }}"
                        class="h-8 md:h-10"
                    >
                </a>

                <!-- Header Actions -->
                <div class="flex items-center gap-4">
                    @guest('customer')
                        @include('shop::checkout.login')
                    @endguest
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="min-h-screen bg-background-light pb-24">
        <div class="container mx-auto px-4 md:px-8 py-6">
            
            <!-- Breadcrumbs -->
            @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
                <div class="mb-6">
                    <x-shop::breadcrumbs name="cart" />
                </div>
            @endif

            <!-- Error Messages -->
            @php
                $errors = \Webkul\Checkout\Facades\Cart::getErrors();
            @endphp

            @if (! empty($errors) && $errors['error_code'] === 'MINIMUM_ORDER_AMOUNT')
                <div class="mb-6 rounded-2xl bg-yellow-50 border-2 border-yellow-200 px-6 py-4 text-yellow-800">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-2xl">warning</span>
                        <span class="font-semibold">{{ $errors['message'] }}: {{ $errors['amount'] }}</span>
                    </div>
                </div>
            @endif

            <!-- Cart Component -->
            <v-cart ref="vCart">
                <x-shop::shimmer.checkout.cart :count="3" />
            </v-cart>
        </div>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-cart-template">
            <div>
                <!-- Loading State -->
                <template v-if="isLoading">
                    <x-shop::shimmer.checkout.cart :count="3" />
                </template>

                <!-- Cart Content -->
                <template v-else>
                    <!-- Cart Items -->
                    <div v-if="cart?.items?.length" class="grid lg:grid-cols-3 gap-8">
                        <!-- Left Column - Cart Items -->
                        <div class="lg:col-span-2 space-y-4">
                            <!-- Page Title -->
                            <div class="flex items-center justify-between mb-6">
                                <h1 class="text-3xl font-bold text-primary flex items-center gap-3">
                                    <span class="material-symbols-outlined text-4xl text-accent-gold">shopping_cart</span>
                                    سلة التسوق
                                </h1>
                                <span class="mawgood-badge">@{{ cart.items.length }} منتج</span>
                            </div>

                            <!-- Cart Items List -->
                            <div v-for="item in cart?.items" :key="item.id" class="mawgood-cart-item">
                                <div class="flex gap-4">
                                    <!-- Product Image -->
                                    <a :href="`{{ route('shop.product_or_category.index', '') }}/${item.product_url_key}`">
                                        <img
                                            :src="item.base_image.small_image_url"
                                            :alt="item.name"
                                            class="mawgood-cart-item-image"
                                        />
                                    </a>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <a :href="`{{ route('shop.product_or_category.index', '') }}/${item.product_url_key}`">
                                            <h3 class="text-lg font-semibold text-primary mb-2 hover:text-accent-gold transition-colors">
                                                @{{ item.name }}
                                            </h3>
                                        </a>

                                        <!-- Product Options -->
                                        <div v-if="item.options.length" class="mb-3">
                                            <button
                                                @click="item.option_show = !item.option_show"
                                                class="text-sm text-gray-600 flex items-center gap-2 hover:text-accent-gold transition-colors"
                                            >
                                                <span>عرض التفاصيل</span>
                                                <span class="material-symbols-outlined text-sm" :class="{'rotate-180': item.option_show}">
                                                    expand_more
                                                </span>
                                            </button>
                                            
                                            <div v-show="item.option_show" class="mt-2 space-y-1">
                                                <div v-for="attribute in item.options" class="text-sm text-gray-600">
                                                    <span class="font-medium">@{{ attribute.attribute_name }}:</span>
                                                    <span>@{{ attribute.option_label }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Price and Quantity -->
                                        <div class="flex items-center justify-between flex-wrap gap-4">
                                            <!-- Quantity Changer -->
                                            <div v-if="item.can_change_qty" class="mawgood-qty-changer">
                                                <button @click="decrementQty(item)" class="mawgood-qty-btn">
                                                    <span class="material-symbols-outlined">remove</span>
                                                </button>
                                                <input
                                                    type="number"
                                                    :value="applied.quantity[item.id] || item.quantity"
                                                    @input="setItemQuantity(item.id, $event.target.value)"
                                                    class="mawgood-qty-input"
                                                    min="1"
                                                />
                                                <button @click="incrementQty(item)" class="mawgood-qty-btn">
                                                    <span class="material-symbols-outlined">add</span>
                                                </button>
                                            </div>

                                            <!-- Price -->
                                            <div class="text-right">
                                                <p class="text-2xl font-bold text-primary">
                                                    @{{ item.formatted_total }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Remove Button -->
                                        <button
                                            @click="removeItem(item.id)"
                                            class="mt-3 text-red-600 hover:text-red-700 text-sm font-medium flex items-center gap-1 transition-colors"
                                        >
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                            <span>إزالة</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Cart Actions -->
                            <div class="flex gap-4 pt-6">
                                <a
                                    href="{{ route('shop.home.index') }}"
                                    class="mawgood-btn-secondary flex-1 text-center"
                                >
                                    متابعة التسوق
                                </a>
                                <button
                                    @click="update()"
                                    :disabled="isStoring"
                                    class="mawgood-btn-accent flex-1"
                                >
                                    <span v-if="isStoring" class="mawgood-spinner inline-block"></span>
                                    <span v-else>تحديث السلة</span>
                                </button>
                            </div>
                        </div>

                        <!-- Right Column - Summary -->
                        <div class="lg:col-span-1">
                            <div class="mawgood-summary">
                                <h2 class="text-2xl font-bold text-primary mb-6 flex items-center gap-2">
                                    <span class="w-1 h-8 bg-accent-gold rounded-full"></span>
                                    ملخص الطلب
                                </h2>

                                <!-- Summary Rows -->
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

                                <!-- Checkout Button -->
                                <a
                                    href="{{ route('shop.checkout.onepage.index') }}"
                                    class="mawgood-btn-primary w-full text-center block mt-6"
                                >
                                    إتمام الطلب
                                </a>

                                <!-- Coupon Section -->
                                @include('shop::checkout.coupon')
                            </div>
                        </div>
                    </div>

                    <!-- Empty Cart -->
                    <div v-else class="text-center py-20">
                        <div class="mawgood-success-icon mx-auto mb-6" style="background: #e5e7eb;">
                            <span class="material-symbols-outlined text-5xl text-gray-400">shopping_cart</span>
                        </div>
                        <h2 class="text-2xl font-bold text-primary mb-4">سلة التسوق فارغة</h2>
                        <p class="text-gray-600 mb-8">لم تقم بإضافة أي منتجات بعد</p>
                        <a href="{{ route('shop.home.index') }}" class="mawgood-btn-primary inline-block">
                            ابدأ التسوق الآن
                        </a>
                    </div>
                </template>
            </div>
        </script>

        <script type="module">
            app.component("v-cart", {
                template: '#v-cart-template',

                data() {
                    return {
                        cart: [],
                        applied: {
                            quantity: {},
                        },
                        displayTax: {
                            prices: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_prices') }}",
                            subtotal: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_subtotal') }}",
                            shipping: "{{ core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount') }}",
                        },
                        isLoading: true,
                        isStoring: false,
                    }
                },

                mounted() {
                    this.getCart();
                },

                methods: {
                    getCart() {
                        this.$axios.get('{{ route('shop.api.checkout.cart.index') }}')
                            .then(response => {
                                this.cart = response.data.data;
                                this.isLoading = false;

                                if (response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'info', message: response.data.message });
                                }
                            })
                            .catch(error => {
                                this.isLoading = false;
                            });
                    },

                    update() {
                        this.isStoring = true;

                        this.$axios.put('{{ route('shop.api.checkout.cart.update') }}', { qty: this.applied.quantity })
                            .then(response => {
                                if (response.data.message) {
                                    this.cart = response.data.data;
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                }
                                this.isStoring = false;
                            })
                            .catch(error => {
                                this.isStoring = false;
                            });
                    },

                    setItemQuantity(itemId, quantity) {
                        this.applied.quantity[itemId] = parseInt(quantity);
                    },

                    incrementQty(item) {
                        const currentQty = this.applied.quantity[item.id] || item.quantity;
                        this.setItemQuantity(item.id, currentQty + 1);
                    },

                    decrementQty(item) {
                        const currentQty = this.applied.quantity[item.id] || item.quantity;
                        if (currentQty > 1) {
                            this.setItemQuantity(item.id, currentQty - 1);
                        }
                    },

                    removeItem(itemId) {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                this.$axios.post('{{ route('shop.api.checkout.cart.destroy') }}', {
                                    '_method': 'DELETE',
                                    'cart_item_id': itemId,
                                })
                                .then(response => {
                                    this.cart = response.data.data;
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                })
                                .catch(error => {});
                            }
                        });
                    },
                }
            });
        </script>
    @endpushOnce
</x-shop::layouts>
