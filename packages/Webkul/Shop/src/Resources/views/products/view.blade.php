@inject ('reviewHelper', 'Webkul\Product\Helpers\Review')
@inject ('productViewHelper', 'Webkul\Product\Helpers\View')

@php
    try {
        $avgRatings = $reviewHelper->getAverageRating($product);
        $percentageRatings = $reviewHelper->getPercentageRating($product);
        $totalRatings = $reviewHelper->getTotalFeedback($product);
    } catch (\Exception $e) {
        $avgRatings = 0;
        $percentageRatings = [];
        $totalRatings = 0;
    }

    $customAttributeValues = $productViewHelper->getAdditionalData($product);
    $attributeData = collect($customAttributeValues)->filter(fn ($item) => ! empty($item['value']));
@endphp

<!-- SEO Meta Content -->
@push('meta')
    <meta name="description" content="{{ trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '') }}"/>
    <meta name="keywords" content="{{ $product->meta_keywords }}"/>

    @if (core()->getConfigData('catalog.rich_snippets.products.enable'))
        <script type="application/ld+json">
            {!! app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product) !!}
        </script>
    @endif

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $product->name }}" />
    <meta name="twitter:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />
    <meta name="twitter:image:alt" content="" />
    <meta name="twitter:image" content="{{ $productBaseImage['medium_image_url'] }}" />
    <meta property="og:type" content="og:product" />
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:image" content="{{ $productBaseImage['medium_image_url'] }}" />
    <meta property="og:description" content="{!! htmlspecialchars(trim(strip_tags($product->description))) !!}" />
    <meta property="og:url" content="{{ route('shop.product_or_category.index', $product->url_key) }}" />
@endPush

<!-- Page Layout -->
<x-shop::layouts>
    <x-slot:title>
        {{ trim($product->meta_title) != "" ? $product->meta_title : $product->name }}
    </x-slot>

    {!! view_render_event('bagisto.shop.products.view.before', ['product' => $product]) !!}

    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        <div class="flex justify-center px-7 max-lg:hidden">
            <x-shop::breadcrumbs name="product" :entity="$product" />
        </div>
    @endif

    <v-product>
        <x-shop::shimmer.products.view />
    </v-product>

    <div class="1180:mt-20">
        <div class="max-1180:hidden">
            <x-shop::tabs position="center" ref="productTabs">
                <x-shop::tabs.item id="descritpion-tab" class="container mt-[60px] !p-0" :title="trans('shop::app.products.view.description')" :is-selected="true">
                    <div class="container mt-[60px] max-1180:px-5">
                        <p class="text-lg text-zinc-500 max-1180:text-sm">
                            {!! $product->description !!}
                        </p>
                    </div>
                </x-shop::tabs.item>

                @if(count($attributeData))
                    <x-shop::tabs.item id="information-tab" class="container mt-[60px] !p-0" :title="trans('shop::app.products.view.additional-information')" :is-selected="false">
                        <div class="container mt-[60px] max-1180:px-5">
                            <div class="mt-8 grid max-w-max grid-cols-[auto_1fr] gap-4">
                                @foreach ($customAttributeValues as $customAttributeValue)
                                    @if (! empty($customAttributeValue['value']))
                                        <div class="grid">
                                            <p class="text-base text-black">{!! $customAttributeValue['label'] !!}</p>
                                        </div>
                                        <div class="grid">
                                            <p class="text-base text-zinc-500">{!! $customAttributeValue['value'] !!}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </x-shop::tabs.item>
                @endif
            </x-shop::tabs>
        </div>
    </div>

    <div class="container mt-6 grid gap-3 !p-0 max-1180:px-5 1180:hidden">
        <x-shop::accordion class="max-md:border-none" :is-active="true">
            <x-slot:header class="bg-gray-100 max-md:!py-3 max-sm:!py-2">
                <p class="text-base font-medium 1180:hidden">@lang('shop::app.products.view.description')</p>
            </x-slot>
            <x-slot:content class="max-sm:px-0">
                <div class="mb-5 text-lg text-zinc-500 max-1180:text-sm max-md:mb-1 max-md:px-4">
                    {!! $product->description !!}
                </div>
            </x-slot>
        </x-shop::accordion>
    </div>

    <v-product-associations />

    {!! view_render_event('bagisto.shop.products.view.after', ['product' => $product]) !!}

    @pushOnce('scripts')
        <script type="text/x-template" id="v-product-template">
            <x-shop::form v-slot="{ meta, errors, handleSubmit }" as="div">
                <form ref="formData" @submit="handleSubmit($event, addToCart)">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="is_buy_now" v-model="is_buy_now">

                    <div class="container px-[60px] max-1180:px-0">
                        <div class="flex mt-12 gap-9 max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-4">
                            @include('shop::products.view.gallery')

                            <div class="relative max-w-[590px] max-1180:w-full max-1180:max-w-full max-1180:px-5 max-sm:px-4">
                                <div class="flex justify-between gap-4">
                                    <div class="flex-1">
                                        <h1 class="text-3xl font-medium break-words max-sm:text-xl">{{ $product->name }}</h1>
                                    </div>

                                    @if (core()->getConfigData('customer.settings.wishlist.wishlist_option'))
                                        <div class="flex max-h-[46px] min-h-[46px] min-w-[46px] cursor-pointer items-center justify-center rounded-full border bg-white text-2xl transition-all hover:opacity-[0.8] max-sm:max-h-7 max-sm:min-h-7 max-sm:min-w-7 max-sm:text-base" role="button" :class="isWishlist ? 'icon-heart-fill text-red-600' : 'icon-heart'" @click="addToWishlist"></div>
                                    @endif
                                </div>

                                <p class="mt-[22px] flex items-center gap-2.5 text-2xl !font-medium max-sm:mt-2 max-sm:gap-x-2.5 max-sm:gap-y-0 max-sm:text-lg">
                                    {!! $product->getTypeInstance()->getPriceHtml() !!}
                                </p>

                                <p class="mt-6 text-lg text-zinc-500 max-sm:mt-1.5 max-sm:text-sm">
                                    {!! $product->short_description !!}
                                </p>

                                @php
                                    $colors = \DB::table('product_attribute_values')
                                        ->where('product_id', $product->id)
                                        ->where('attribute_id', 23)
                                        ->value('text_value');
                                    
                                    $colorNames = [];
                                    if ($colors) {
                                        $colorIds = explode(',', $colors);
                                        $colorNames = \DB::table('attribute_options')
                                            ->whereIn('id', $colorIds)
                                            ->pluck('admin_name')
                                            ->toArray();
                                    }
                                    
                                    $sizes = \DB::table('product_attribute_values')
                                        ->where('product_id', $product->id)
                                        ->where('attribute_id', 24)
                                        ->value('text_value');
                                    
                                    $sizeNames = [];
                                    if ($sizes) {
                                        $sizeIds = explode(',', $sizes);
                                        $sizeNames = \DB::table('attribute_options')
                                            ->whereIn('id', $sizeIds)
                                            ->pluck('admin_name')
                                            ->toArray();
                                    }
                                @endphp

                                @if(count($colorNames) > 0)
                                    <div class="mt-6 max-sm:mt-4">
                                        <p class="text-base font-medium text-black mb-2">{!! '<i class="fas fa-palette me-2"></i>الألوان المتاحة' !!}</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($colorNames as $colorName)
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-sm font-medium text-gray-800 border border-gray-300">
                                                    {{ $colorName }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if(count($sizeNames) > 0)
                                    <div class="mt-4 max-sm:mt-3">
                                        <p class="text-base font-medium text-black mb-2">{!! '<i class="fas fa-ruler me-2"></i>المقاسات المتاحة' !!}</p>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($sizeNames as $sizeName)
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-sm font-medium text-gray-800 border border-gray-300">
                                                    {{ $sizeName }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @include('shop::products.view.types.simple')
                                @include('shop::products.view.types.configurable')
                                @include('shop::products.view.types.grouped')
                                @include('shop::products.view.types.bundle')
                                @include('shop::products.view.types.downloadable')
                                @include('shop::products.view.types.booking')

                                <div class="mt-8 flex max-w-[470px] gap-4 max-sm:mt-4">
                                    @if ($product->getTypeInstance()->showQuantityBox())
                                        <x-shop::quantity-changer name="quantity" value="1" class="gap-x-4 rounded-xl px-7 py-4 max-md:py-3 max-sm:gap-x-5 max-sm:rounded-lg max-sm:px-4 max-sm:py-1.5" />
                                    @endif

                                    @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                        <x-shop::button type="button" class="secondary-button w-full max-w-full max-md:py-3 max-sm:rounded-lg max-sm:py-1.5" button-type="secondary-button" :title="trans('shop::app.products.view.add-to-cart')" @click="is_buy_now=0; addToCart();" />
                                    @endif
                                </div>

                                @if (core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                                    <x-shop::button type="button" class="primary-button mt-5 w-full max-w-[470px] max-md:py-3 max-sm:mt-3 max-sm:rounded-lg max-sm:py-1.5" button-type="primary-button" :title="trans('shop::app.products.view.buy-now')" @click="is_buy_now=1; addToCart();" />
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </x-shop::form>
        </script>

        <script type="module">
            app.component('v-product', {
                template: '#v-product-template',
                data() {
                    return {
                        isWishlist: false,
                        isCustomer: '{{ auth()->guard('customer')->check() }}',
                        is_buy_now: 0,
                        isStoring: { addToCart: false, buyNow: false }
                    }
                },
                mounted() {
                    this.checkWishlistStatus();
                },
                methods: {
                    addToCart() {
                        const operation = this.is_buy_now ? 'buyNow' : 'addToCart';
                        this.isStoring[operation] = true;
                        let formData = new FormData(this.$refs.formData);
                        this.ensureQuantity(formData);
                        this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                            .then(response => {
                                if (response.data.message) {
                                    this.$emitter.emit('update-mini-cart', response.data.data);
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                    if (response.data.redirect) window.location.href= response.data.redirect;
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
                                }
                                this.isStoring[operation] = false;
                            })
                            .catch(error => {
                                this.isStoring[operation] = false;
                                this.$emitter.emit('add-flash', { type: 'warning', message: error.response.data.message });
                            });
                    },
                    checkWishlistStatus() {
                        if (this.isCustomer) {
                            this.$axios.get('{{ route('shop.api.customers.account.wishlist.index') }}')
                                .then(response => {
                                    const wishlistItems = response.data.data || [];
                                    this.isWishlist = Boolean(wishlistItems.find(item => item.product.id == "{{ $product->id }}")?.product?.is_wishlist);
                                })
                                .catch(error => {});
                        }
                    },
                    addToWishlist() {
                        if (this.isCustomer) {
                            this.$axios.post('{{ route('shop.api.customers.account.wishlist.store') }}', { product_id: "{{ $product->id }}" })
                                .then(response => {
                                    this.isWishlist = ! this.isWishlist;
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                        } else {
                            window.location.href = "{{ route('shop.customer.session.index')}}";
                        }
                    },
                    ensureQuantity(formData) {
                        if (! formData.has('quantity')) formData.append('quantity', 1);
                    }
                }
            });
        </script>

        <script type="text/x-template" id="v-product-associations-template">
            <div ref="carouselWrapper">
                <template v-if="isVisible">
                    <x-shop::products.carousel :title="trans('shop::app.products.view.related-product-title')" :src="route('shop.api.products.related.index', ['id' => $product->id])" />
                    <x-shop::products.carousel :title="trans('shop::app.products.view.up-sell-title')" :src="route('shop.api.products.up-sell.index', ['id' => $product->id])" />
                </template>
            </div>
        </script>

        <script type="module">
            app.component('v-product-associations', {
                template: '#v-product-associations-template',
                data() {
                    return { isVisible: false };
                },
                mounted() {
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                this.isVisible = true;
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.1 });
                    observer.observe(this.$refs.carouselWrapper);
                }
            });
        </script>
    @endPushOnce
</x-shop::layouts>
