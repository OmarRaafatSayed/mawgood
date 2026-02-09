<?php $reviewHelper = app('Webkul\Product\Helpers\Review'); ?>
<?php $productViewHelper = app('Webkul\Product\Helpers\View'); ?>

<?php
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
?>

<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo e(trim($product->meta_description) != "" ? $product->meta_description : \Illuminate\Support\Str::limit(strip_tags($product->description), 120, '')); ?>"/>
    <meta name="keywords" content="<?php echo e($product->meta_keywords); ?>"/>

    <?php if(core()->getConfigData('catalog.rich_snippets.products.enable')): ?>
        <script type="application/ld+json">
            <?php echo app('Webkul\Product\Helpers\SEO')->getProductJsonLd($product); ?>

        </script>
    <?php endif; ?>

    <?php $productBaseImage = product_image()->getProductBaseImage($product); ?>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo e($product->name); ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars(trim(strip_tags($product->description))); ?>" />
    <meta name="twitter:image:alt" content="" />
    <meta name="twitter:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />
    <meta property="og:type" content="og:product" />
    <meta property="og:title" content="<?php echo e($product->name); ?>" />
    <meta property="og:image" content="<?php echo e($productBaseImage['medium_image_url']); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars(trim(strip_tags($product->description))); ?>" />
    <meta property="og:url" content="<?php echo e(route('shop.product_or_category.index', $product->url_key)); ?>" />
<?php $__env->stopPush(); ?>

<!-- Page Layout -->
<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e(trim($product->meta_title) != "" ? $product->meta_title : $product->name); ?>

     <?php $__env->endSlot(); ?>

    <?php echo view_render_event('bagisto.shop.products.view.before', ['product' => $product]); ?>


    <?php if((core()->getConfigData('general.general.breadcrumbs.shop'))): ?>
        <div class="flex justify-center px-7 max-lg:hidden">
            <?php if (isset($component)) { $__componentOriginaldef12fd0653509715c3bc62a609dde73 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldef12fd0653509715c3bc62a609dde73 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.breadcrumbs.index','data' => ['name' => 'product','entity' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'product','entity' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
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
        </div>
    <?php endif; ?>

    <v-product>
        <?php if (isset($component)) { $__componentOriginal0eaa493b847a30b19675cbd7b242ec38 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0eaa493b847a30b19675cbd7b242ec38 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.products.view','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.products.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0eaa493b847a30b19675cbd7b242ec38)): ?>
<?php $attributes = $__attributesOriginal0eaa493b847a30b19675cbd7b242ec38; ?>
<?php unset($__attributesOriginal0eaa493b847a30b19675cbd7b242ec38); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0eaa493b847a30b19675cbd7b242ec38)): ?>
<?php $component = $__componentOriginal0eaa493b847a30b19675cbd7b242ec38; ?>
<?php unset($__componentOriginal0eaa493b847a30b19675cbd7b242ec38); ?>
<?php endif; ?>
    </v-product>

    <div class="1180:mt-20">
        <div class="max-1180:hidden">
            <?php if (isset($component)) { $__componentOriginalfc60bb615bed00622a91d98d31176f33 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc60bb615bed00622a91d98d31176f33 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.index','data' => ['position' => 'center','ref' => 'productTabs']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'center','ref' => 'productTabs']); ?>
                <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['id' => 'descritpion-tab','class' => 'container mt-[60px] !p-0','title' => trans('shop::app.products.view.description'),'isSelected' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'descritpion-tab','class' => 'container mt-[60px] !p-0','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.description')),'is-selected' => true]); ?>
                    <div class="container mt-[60px] max-1180:px-5">
                        <p class="text-lg text-zinc-500 max-1180:text-sm">
                            <?php echo $product->description; ?>

                        </p>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>

                <?php if(count($attributeData)): ?>
                    <?php if (isset($component)) { $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.tabs.item','data' => ['id' => 'information-tab','class' => 'container mt-[60px] !p-0','title' => trans('shop::app.products.view.additional-information'),'isSelected' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::tabs.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'information-tab','class' => 'container mt-[60px] !p-0','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.additional-information')),'is-selected' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
                        <div class="container mt-[60px] max-1180:px-5">
                            <div class="mt-8 grid max-w-max grid-cols-[auto_1fr] gap-4">
                                <?php $__currentLoopData = $customAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customAttributeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(! empty($customAttributeValue['value'])): ?>
                                        <div class="grid">
                                            <p class="text-base text-black"><?php echo $customAttributeValue['label']; ?></p>
                                        </div>
                                        <div class="grid">
                                            <p class="text-base text-zinc-500"><?php echo $customAttributeValue['value']; ?></p>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $attributes = $__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__attributesOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90)): ?>
<?php $component = $__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90; ?>
<?php unset($__componentOriginal1f42c1ae3abb1d72da6c703bc82e8a90); ?>
<?php endif; ?>
                <?php endif; ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc60bb615bed00622a91d98d31176f33)): ?>
<?php $attributes = $__attributesOriginalfc60bb615bed00622a91d98d31176f33; ?>
<?php unset($__attributesOriginalfc60bb615bed00622a91d98d31176f33); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc60bb615bed00622a91d98d31176f33)): ?>
<?php $component = $__componentOriginalfc60bb615bed00622a91d98d31176f33; ?>
<?php unset($__componentOriginalfc60bb615bed00622a91d98d31176f33); ?>
<?php endif; ?>
        </div>
    </div>

    <div class="container mt-6 grid gap-3 !p-0 max-1180:px-5 1180:hidden">
        <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['class' => 'max-md:border-none','isActive' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'max-md:border-none','is-active' => true]); ?>
             <?php $__env->slot('header', null, ['class' => 'bg-gray-100 max-md:!py-3 max-sm:!py-2']); ?> 
                <p class="text-base font-medium 1180:hidden"><?php echo app('translator')->get('shop::app.products.view.description'); ?></p>
             <?php $__env->endSlot(); ?>
             <?php $__env->slot('content', null, ['class' => 'max-sm:px-0']); ?> 
                <div class="mb-5 text-lg text-zinc-500 max-1180:text-sm max-md:mb-1 max-md:px-4">
                    <?php echo $product->description; ?>

                </div>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
    </div>

    <v-product-associations />

    <?php echo view_render_event('bagisto.shop.products.view.after', ['product' => $product]); ?>


    <?php if (! $__env->hasRenderedOnce('bdca8e84-1d6b-4d30-bf4f-2907d9f6a30e')): $__env->markAsRenderedOnce('bdca8e84-1d6b-4d30-bf4f-2907d9f6a30e');
$__env->startPush('scripts'); ?>
        <script type="text/x-template" id="v-product-template">
            <?php if (isset($component)) { $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div']); ?>
                <form ref="formData" @submit="handleSubmit($event, addToCart)">
                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="is_buy_now" v-model="is_buy_now">

                    <div class="container px-[60px] max-1180:px-0">
                        <div class="flex mt-12 gap-9 max-1180:flex-wrap max-lg:mt-0 max-sm:gap-y-4">
                            <?php echo $__env->make('shop::products.view.gallery', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                            <div class="relative max-w-[590px] max-1180:w-full max-1180:max-w-full max-1180:px-5 max-sm:px-4">
                                <div class="flex justify-between gap-4">
                                    <div class="flex-1">
                                        <h1 class="text-3xl font-medium break-words max-sm:text-xl"><?php echo e($product->name); ?></h1>
                                    </div>

                                    <?php if(core()->getConfigData('customer.settings.wishlist.wishlist_option')): ?>
                                        <div class="flex max-h-[46px] min-h-[46px] min-w-[46px] cursor-pointer items-center justify-center rounded-full border bg-white text-2xl transition-all hover:opacity-[0.8] max-sm:max-h-7 max-sm:min-h-7 max-sm:min-w-7 max-sm:text-base" role="button" :class="isWishlist ? 'icon-heart-fill text-red-600' : 'icon-heart'" @click="addToWishlist"></div>
                                    <?php endif; ?>
                                </div>

                                <p class="mt-[22px] flex items-center gap-2.5 text-2xl !font-medium max-sm:mt-2 max-sm:gap-x-2.5 max-sm:gap-y-0 max-sm:text-lg">
                                    <?php echo $product->getTypeInstance()->getPriceHtml(); ?>

                                </p>

                                <p class="mt-6 text-lg text-zinc-500 max-sm:mt-1.5 max-sm:text-sm">
                                    <?php echo $product->short_description; ?>

                                </p>

                                <?php
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
                                ?>

                                <?php if(count($colorNames) > 0): ?>
                                    <div class="mt-6 max-sm:mt-4">
                                        <p class="text-base font-medium text-black mb-2"><?php echo '<i class="fas fa-palette me-2"></i>الألوان المتاحة'; ?></p>
                                        <div class="flex flex-wrap gap-2">
                                            <?php $__currentLoopData = $colorNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colorName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-sm font-medium text-gray-800 border border-gray-300">
                                                    <?php echo e($colorName); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if(count($sizeNames) > 0): ?>
                                    <div class="mt-4 max-sm:mt-3">
                                        <p class="text-base font-medium text-black mb-2"><?php echo '<i class="fas fa-ruler me-2"></i>المقاسات المتاحة'; ?></p>
                                        <div class="flex flex-wrap gap-2">
                                            <?php $__currentLoopData = $sizeNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sizeName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-sm font-medium text-gray-800 border border-gray-300">
                                                    <?php echo e($sizeName); ?>

                                                </span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php echo $__env->make('shop::products.view.types.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('shop::products.view.types.configurable', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('shop::products.view.types.grouped', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('shop::products.view.types.bundle', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('shop::products.view.types.downloadable', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <?php echo $__env->make('shop::products.view.types.booking', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                                <div class="mt-8 flex max-w-[470px] gap-4 max-sm:mt-4">
                                    <?php if($product->getTypeInstance()->showQuantityBox()): ?>
                                        <?php if (isset($component)) { $__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.quantity-changer.index','data' => ['name' => 'quantity','value' => '1','class' => 'gap-x-4 rounded-xl px-7 py-4 max-md:py-3 max-sm:gap-x-5 max-sm:rounded-lg max-sm:px-4 max-sm:py-1.5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::quantity-changer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'quantity','value' => '1','class' => 'gap-x-4 rounded-xl px-7 py-4 max-md:py-3 max-sm:gap-x-5 max-sm:rounded-lg max-sm:px-4 max-sm:py-1.5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c)): ?>
<?php $attributes = $__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c; ?>
<?php unset($__attributesOriginal6c50a43d549a14cd17ba26b5e08aa48c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c)): ?>
<?php $component = $__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c; ?>
<?php unset($__componentOriginal6c50a43d549a14cd17ba26b5e08aa48c); ?>
<?php endif; ?>
                                    <?php endif; ?>

                                    <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                                        <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['type' => 'button','class' => 'secondary-button w-full max-w-full max-md:py-3 max-sm:rounded-lg max-sm:py-1.5','buttonType' => 'secondary-button','title' => trans('shop::app.products.view.add-to-cart'),'@click' => 'is_buy_now=0; addToCart();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'secondary-button w-full max-w-full max-md:py-3 max-sm:rounded-lg max-sm:py-1.5','button-type' => 'secondary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.add-to-cart')),'@click' => 'is_buy_now=0; addToCart();']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30786825665921390a816ebee82cf580)): ?>
<?php $attributes = $__attributesOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__attributesOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30786825665921390a816ebee82cf580)): ?>
<?php $component = $__componentOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__componentOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                                    <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['type' => 'button','class' => 'primary-button mt-5 w-full max-w-[470px] max-md:py-3 max-sm:mt-3 max-sm:rounded-lg max-sm:py-1.5','buttonType' => 'primary-button','title' => trans('shop::app.products.view.buy-now'),'@click' => 'is_buy_now=1; addToCart();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'button','class' => 'primary-button mt-5 w-full max-w-[470px] max-md:py-3 max-sm:mt-3 max-sm:rounded-lg max-sm:py-1.5','button-type' => 'primary-button','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.buy-now')),'@click' => 'is_buy_now=1; addToCart();']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30786825665921390a816ebee82cf580)): ?>
<?php $attributes = $__attributesOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__attributesOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30786825665921390a816ebee82cf580)): ?>
<?php $component = $__componentOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__componentOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </form>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $attributes = $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $component = $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
        </script>

        <script type="module">
            app.component('v-product', {
                template: '#v-product-template',
                data() {
                    return {
                        isWishlist: false,
                        isCustomer: '<?php echo e(auth()->guard('customer')->check()); ?>',
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
                        this.$axios.post('<?php echo e(route("shop.api.checkout.cart.store")); ?>', formData, { headers: { 'Content-Type': 'multipart/form-data' } })
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
                            this.$axios.get('<?php echo e(route('shop.api.customers.account.wishlist.index')); ?>')
                                .then(response => {
                                    const wishlistItems = response.data.data || [];
                                    this.isWishlist = Boolean(wishlistItems.find(item => item.product.id == "<?php echo e($product->id); ?>")?.product?.is_wishlist);
                                })
                                .catch(error => {});
                        }
                    },
                    addToWishlist() {
                        if (this.isCustomer) {
                            this.$axios.post('<?php echo e(route('shop.api.customers.account.wishlist.store')); ?>', { product_id: "<?php echo e($product->id); ?>" })
                                .then(response => {
                                    this.isWishlist = ! this.isWishlist;
                                    this.$emitter.emit('add-flash', { type: 'success', message: response.data.data.message });
                                })
                                .catch(error => {});
                        } else {
                            window.location.href = "<?php echo e(route('shop.customer.session.index')); ?>";
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
                    <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => trans('shop::app.products.view.related-product-title'),'src' => route('shop.api.products.related.index', ['id' => $product->id])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.related-product-title')),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.products.related.index', ['id' => $product->id]))]); ?>
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
                    <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => trans('shop::app.products.view.up-sell-title'),'src' => route('shop.api.products.up-sell.index', ['id' => $product->id])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.products.view.up-sell-title')),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.products.up-sell.index', ['id' => $product->id]))]); ?>
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
<?php /**PATH /var/www/mawgood/packages/Webkul/Shop/src/Providers/../Resources/views/products/view.blade.php ENDPATH**/ ?>