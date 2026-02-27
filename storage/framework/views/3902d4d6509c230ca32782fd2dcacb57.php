<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>"/>
    <meta name="keywords" content="<?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', 'Tajawal', sans-serif; background: #f5f7f8; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => false,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.checkout.cart.index.cart'); ?>
     <?php $__env->endSlot(); ?>

    <?php echo view_render_event('bagisto.shop.checkout.cart.header.before'); ?>


    <!-- Modern Header -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-[#FF6B00]/5">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center justify-between">
                <a href="<?php echo e(route('shop.home.index')); ?>" class="flex items-center">
                    <img src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>" alt="<?php echo e(config('app.name')); ?>" class="h-8">
                </a>
                <?php if(auth()->guard('customer')->guest()): ?>
                    <?php echo $__env->make('shop::checkout.login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php echo view_render_event('bagisto.shop.checkout.cart.header.after'); ?>


    <div class="flex-auto">
        <div class="container px-[60px] max-lg:px-8 max-md:px-4">

            <?php echo view_render_event('bagisto.shop.checkout.cart.breadcrumbs.before'); ?>


            <!-- Breadcrumbs -->
            <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
                <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'cart']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'cart']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $attributes = $__attributesOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__attributesOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldef12fd0653509715c3bc62a609dde73)): ?>
<?php $component = $__componentOriginaldef12fd0653509715c3bc62a609dde73; ?>
<?php unset($__componentOriginaldef12fd0653509715c3bc62a609dde73); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php echo view_render_event('bagisto.shop.checkout.cart.breadcrumbs.after'); ?>


            <?php
                $errors = \Webkul\Checkout\Facades\Cart::getErrors();
            ?>

            <?php if(! empty($errors) && $errors['error_code'] === 'MINIMUM_ORDER_AMOUNT'): ?>
                <div class="mt-5 w-full gap-12 rounded-lg bg-[#FFF3CD] px-5 py-3 text-[#383D41] max-sm:px-3 max-sm:py-2 max-sm:text-sm">
                    <?php echo e($errors['message']); ?>: <?php echo e($errors['amount']); ?>

                </div>
            <?php endif; ?>

            <v-cart ref="vCart">
                <!-- Cart Shimmer Effect -->
                <?php if (isset($component)) { $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.cart.index','data' => ['count' => 3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 3]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $attributes = $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $component = $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
            </v-cart>
        </div>
    </div>

    <?php if(core()->getConfigData('sales.checkout.shopping_cart.cross_sell')): ?>
        <?php echo view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.before'); ?>


        <!-- Cross-sell Product Carousal -->
        <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => trans('shop::app.checkout.cart.index.cross-sell.title'),'src' => route('shop.api.checkout.cart.cross-sell.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.checkout.cart.index.cross-sell.title')),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.checkout.cart.cross-sell.index'))]); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $attributes = $__attributesOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__attributesOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $component = $__componentOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__componentOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>

        <?php echo view_render_event('bagisto.shop.checkout.cart.cross_sell_carousel.after'); ?>

    <?php endif; ?>

    <?php if (! $__env->hasRenderedOnce('cd2ef655-eaef-47db-a239-13bafbff266d')): $__env->markAsRenderedOnce('cd2ef655-eaef-47db-a239-13bafbff266d');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-cart-template"
        >
            <div>
                <!-- Cart Shimmer Effect -->
                <template v-if="isLoading">
                    <?php if (isset($component)) { $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.checkout.cart.index','data' => ['count' => 3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.checkout.cart'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => 3]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $attributes = $__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__attributesOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385)): ?>
<?php $component = $__componentOriginal79f5de2ce8c947c8a98a12475d1bd385; ?>
<?php unset($__componentOriginal79f5de2ce8c947c8a98a12475d1bd385); ?>
<?php endif; ?>
                </template>

                <!-- Cart Information -->
                <template v-else>
                    <div class="grid lg:grid-cols-3 gap-6 py-6" v-if="cart?.items?.length">
                        <div class="lg:col-span-2 space-y-4">

                            <?php echo view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.before'); ?>


                            <!-- Cart Mass Action Container -->
                            <div class="flex items-center justify-between border-b border-zinc-200 pb-2.5 max-md:py-2.5">
                                <div class="flex select-none items-center">
                                    <input
                                        type="checkbox"
                                        id="select-all"
                                        class="peer hidden"
                                        v-model="allSelected"
                                        @change="selectAll"
                                    >

                                    <label
                                        class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-2xl text-navyBlue peer-checked:text-navyBlue"
                                        for="select-all"
                                        tabindex="0"
                                        aria-label="<?php echo app('translator')->get('shop::app.checkout.cart.index.select-all'); ?>"
                                        aria-labelledby="select-all-label"
                                    >
                                    </label>

                                    <span
                                        class="text-xl max-sm:text-sm ltr:ml-2.5 rtl:mr-2.5"
                                        role="heading"
                                        aria-level="2"
                                    >
                                        {{ "<?php echo app('translator')->get('shop::app.checkout.cart.index.items-selected'); ?>".replace(':count', selectedItemsCount) }}
                                    </span>
                                </div>

                                <div v-if="selectedItemsCount">
                                    <span
                                        class="cursor-pointer text-base text-blue-700 max-sm:text-xs"
                                        role="button"
                                        tabindex="0"
                                        @click="removeSelectedItems"
                                    >
                                        <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                    </span>

                                    <?php if(auth()->guard()->check()): ?>
                                        <span class="mx-2.5 border-r-2 border-zinc-200"></span>

                                        <span
                                            class="cursor-pointer text-base text-blue-700 max-sm:text-xs"
                                            role="button"
                                            tabindex="0"
                                            @click="moveToWishlistSelectedItems"
                                        >
                                            <?php echo app('translator')->get('shop::app.checkout.cart.index.move-to-wishlist'); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.cart_mass_actions.after'); ?>


                            <?php echo view_render_event('bagisto.shop.checkout.cart.item.listing.before'); ?>


                            <!-- Cart Items -->
                            <div v-for="item in cart?.items" :key="item.id" class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100">
                                <div class="flex gap-4">
                                    <div class="flex gap-x-5">
                                        <div class="mt-11 select-none max-md:mt-9 max-sm:mt-7">
                                            <input
                                                type="checkbox"
                                                :id="'item_' + item.id"
                                                class="peer hidden"
                                                v-model="item.selected"
                                                @change="updateAllSelected"
                                            >

                                            <label
                                                class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-2xl text-navyBlue peer-checked:text-navyBlue"
                                                :for="'item_' + item.id"
                                                tabindex="0"
                                                aria-label="<?php echo app('translator')->get('shop::app.checkout.cart.index.select-cart-item'); ?>"
                                                aria-labelledby="select-item-label"
                                            ></label>
                                        </div>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item_image.before'); ?>


                                        <a :href="`<?php echo e(route('shop.product_or_category.index', '')); ?>/${item.product_url_key}`">
                                            <img :src="item.base_image.small_image_url" :alt="item.name" class="w-24 h-24 rounded-xl object-cover">
                                        </a>

                                        <?php echo view_render_event('bagisto.shop.checkout.cart.item_image.after'); ?>


                                        <div class="flex-1">
                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_name.before'); ?>


                                            <a :href="`<?php echo e(route('shop.product_or_category.index', '')); ?>/${item.product_url_key}`">
                                                <h3 class="text-base font-semibold text-slate-800 mb-2">{{ item.name }}</h3>
                                            </a>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_name.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_details.before'); ?>


                                            <!-- Cart Item Options Container -->
                                            <div
                                                class="grid select-none gap-x-2.5 gap-y-1.5"
                                                v-if="item.options.length"
                                            >
                                                <!-- Details Toggler -->
                                                <div class="">
                                                    <p
                                                        class="flex cursor-pointer items-center gap-x-4 text-base max-md:gap-x-1.5 max-sm:text-xs"
                                                        @click="item.option_show = ! item.option_show"
                                                    >
                                                        <?php echo app('translator')->get('shop::app.checkout.cart.index.see-details'); ?>

                                                        <span
                                                            class="text-2xl max-md:text-lg"
                                                            :class="{'icon-arrow-up': item.option_show, 'icon-arrow-down': ! item.option_show}"
                                                        ></span>
                                                    </p>
                                                </div>

                                                <!-- Option Details -->
                                                <div
                                                    class="grid gap-2"
                                                    v-show="item.option_show"
                                                >
                                                    <template v-for="attribute in item.options">
                                                        <div class="max-md:grid max-md:gap-0.5">
                                                            <p class="text-sm font-medium text-zinc-500 max-md:font-normal max-sm:text-xs">
                                                                {{ attribute.attribute_name + ':' }}
                                                            </p>

                                                            <p class="text-sm max-sm:text-xs">
                                                                <template v-if="attribute?.attribute_type === 'file'">
                                                                    <a
                                                                        :href="attribute.file_url"
                                                                        class="text-blue-700"
                                                                        target="_blank"
                                                                        :download="attribute.file_name"
                                                                    >
                                                                        {{ attribute.file_name }}
                                                                    </a>
                                                                </template>

                                                                <template v-else>
                                                                    {{ attribute.option_label }}
                                                                </template>
                                                            </p>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.item_details.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.formatted_total.before'); ?>


                                            <div class="md:hidden">
                                                <p class="text-lg font-semibold max-md:text-sm">
                                                    <template v-if="displayTax.prices == 'including_tax'">
                                                            {{ item.formatted_total_incl_tax }}
                                                    </template>

                                                    <template v-else-if="displayTax.prices == 'both'">

                                                        {{ item.formatted_total_incl_tax }}
                                                        <span class="text-xs font-normal">
                                                            <?php echo app('translator')->get('shopTheme::app.checkout.cart.index.excl-tax'); ?>
                                                            <span class="font-medium">{{ item.formatted_total }}</span>
                                                        </span>

                                                    </template>

                                                    <template v-else>
                                                            {{ item.formatted_total }}
                                                    </template>
                                                </p>

                                                <span
                                                    class="cursor-pointer text-base text-blue-700 max-md:hidden"
                                                    role="button"
                                                    tabindex="0"
                                                    @click="removeItem(item.id)"
                                                >
                                                    <?php echo app('translator')->get('shop::app.checkout.cart.index.remove'); ?>
                                                </span>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.formatted_total.after'); ?>


                                            <?php echo view_render_event('bagisto.shop.checkout.cart.quantity_changer.before'); ?>


                                            <div class="flex items-center gap-3 mt-3" v-if="item.can_change_qty">
                                                <div class="flex items-center gap-2 border-2 border-[#FF6B00] rounded-full px-3 py-1">
                                                    <button @click="decrementQty(item)" class="w-6 h-6 rounded-full bg-[#FF6B00] text-white flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-sm">remove</span>
                                                    </button>
                                                    <input type="number" :value="applied.quantity[item.id] || item.quantity" @input="setItemQuantity(item.id, $event.target.value)" class="w-12 text-center border-0 font-semibold" min="1">
                                                    <button @click="incrementQty(item)" class="w-6 h-6 rounded-full bg-[#FF6B00] text-white flex items-center justify-center">
                                                        <span class="material-symbols-outlined text-sm">add</span>
                                                    </button>
                                                </div>
                                                <button @click="removeItem(item.id)" class="text-red-600 hover:text-red-700 text-sm font-medium flex items-center gap-1">
                                                    <span class="material-symbols-outlined text-lg">delete</span>
                                                    <span>إزالة</span>
                                                </button>
                                            </div>

                                            <?php echo view_render_event('bagisto.shop.checkout.cart.quantity_changer.after'); ?>

                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-[#FF6B00]">{{ item.formatted_total }}</p>
                                    </div>
                                </div>
                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.item.listing.after'); ?>


                            <?php echo view_render_event('bagisto.shop.checkout.cart.controls.before'); ?>


                            <div class="flex gap-4 pt-4">
                                <a href="<?php echo e(route('shop.home.index')); ?>" class="flex-1 text-center px-6 py-3 border-2 border-[#FF6B00] text-[#FF6B00] rounded-full font-semibold hover:bg-[#FF6B00] hover:text-white transition-colors">
                                    متابعة التسوق
                                </a>
                                <button @click="update()" :disabled="isStoring" class="flex-1 px-6 py-3 bg-[#FF6B00] text-white rounded-full font-semibold hover:bg-[#E65F00] transition-colors">
                                    <span v-if="isStoring">جاري التحديث...</span>
                                    <span v-else>تحديث السلة</span>
                                </button>
                            </div>

                            <?php echo view_render_event('bagisto.shop.checkout.cart.controls.after'); ?>

                        </div>

                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 sticky top-24">
                                <h2 class="text-2xl font-bold text-[#FF6B00] mb-6 flex items-center gap-2">
                                    <span class="w-1 h-8 bg-[#FF6B00] rounded-full"></span>
                                    ملخص الطلب
                                </h2>
                                <div class="space-y-3">
                                    <div class="flex justify-between py-2 border-b">
                                        <span class="text-gray-600">المجموع الفرعي</span>
                                        <span class="font-semibold">{{ cart.formatted_sub_total }}</span>
                                    </div>
                                    <div v-if="cart.selected_shipping_rate" class="flex justify-between py-2 border-b">
                                        <span class="text-gray-600">الشحن</span>
                                        <span class="font-semibold">{{ cart.selected_shipping_rate.formatted_price }}</span>
                                    </div>
                                    <div class="flex justify-between py-3 text-xl font-bold text-[#FF6B00] border-t-2">
                                        <span>الإجمالي</span>
                                        <span>{{ cart.formatted_grand_total }}</span>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('shop.checkout.onepage.index')); ?>" class="block w-full mt-6 px-6 py-3 bg-[#FF6B00] text-white text-center rounded-full font-bold hover:bg-[#E65F00] transition-colors">
                                    إتمام الطلب
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center py-20" v-else>
                        <div class="w-20 h-20 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                            <span class="material-symbols-outlined text-5xl text-gray-400">shopping_cart</span>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 mb-4">سلة التسوق فارغة</h2>
                        <p class="text-gray-600 mb-8">لم تقم بإضافة أي منتجات بعد</p>
                        <a href="<?php echo e(route('shop.home.index')); ?>" class="inline-block px-8 py-3 bg-[#FF6B00] text-white rounded-full font-bold hover:bg-[#E65F00] transition-colors">
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
                    return  {
                        cart: [],

                        allSelected: false,

                        applied: {
                            quantity: {},
                        },

                        displayTax: {
                            prices: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_prices')); ?>",

                            subtotal: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_subtotal')); ?>",

                            shipping: "<?php echo e(core()->getConfigData('sales.taxes.shopping_cart.display_shipping_amount')); ?>",
                        },

                        isLoading: true,

                        isStoring: false,
                    }
                },

                mounted() {
                    this.getCart();
                },

                computed: {
                    selectedItemsCount() {
                        return this.cart.items.filter(item => item.selected).length;
                    },
                },

                methods: {
                    getCart() {
                        this.$axios.get('<?php echo e(route('shop.api.checkout.cart.index')); ?>')
                            .then(response => {
                                this.cart = response.data.data;

                                this.isLoading = false;

                                if (response.data.message) {
                                    this.$emitter.emit('add-flash', { type: 'info', message: response.data.message });
                                }
                            })
                            .catch(error => {});
                    },

                    setCart(cart) {
                        this.cart = cart;
                    },

                    selectAll() {
                        for (let item of this.cart.items) {
                            item.selected = this.allSelected;
                        }
                    },

                    updateAllSelected() {
                        this.allSelected = this.cart.items.every(item => item.selected);
                    },

                    update() {
                        this.isStoring = true;

                        this.$axios.put('<?php echo e(route('shop.api.checkout.cart.update')); ?>', { qty: this.applied.quantity })
                            .then(response => {
                                if (response.data.message) {
                                    this.cart = response.data.data;

                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });
                                } else {
                                    this.$emitter.emit('add-flash', { type: 'warning', message: response.data.data.message });
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
                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.destroy')); ?>', {
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

                    removeSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.destroy_selected')); ?>', {
                                        '_method': 'DELETE',
                                        'ids': selectedItemsIds,
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },

                    moveToWishlistSelectedItems() {
                        this.$emitter.emit('open-confirm-modal', {
                            agree: () => {
                                const selectedItemsIds = this.cart.items.flatMap(item => item.selected ? item.id : []);

                                const selectedItemsQty = this.cart.items.filter(item => item.selected).map(item => this.applied.quantity[item.id] ?? item.quantity);

                                this.$axios.post('<?php echo e(route('shop.api.checkout.cart.move_to_wishlist')); ?>', {
                                        'ids': selectedItemsIds,
                                        'qty': selectedItemsQty
                                    })
                                    .then(response => {
                                        this.cart = response.data.data;

                                        this.$emitter.emit('update-mini-cart', response.data.data );

                                        this.$emitter.emit('add-flash', { type: 'success', message: response.data.message });

                                    })
                                    .catch(error => {});
                            }
                        });
                    },
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/checkout/cart/index.blade.php ENDPATH**/ ?>