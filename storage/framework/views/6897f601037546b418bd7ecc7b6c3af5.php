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
     <?php $__env->slot('title', null, []); ?> المقالات <?php $__env->endSlot(); ?>

    <div class="px-[60px] py-12 max-1180:px-8 max-md:px-4">
        <!-- Page Header -->
        <div class="mb-12 text-center">
            <h1 class="text-4xl font-bold text-navyBlue mb-3 max-md:text-3xl">المقالات</h1>
            <p class="text-gray-600 text-base">اكتشف أحدث المقالات والأخبار</p>
        </div>

        <?php if($posts->count() > 0): ?>
            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-[1400px] mx-auto">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <!-- Article Image -->
                    <div class="relative h-48 bg-gradient-to-br from-lightOrange to-zinc-100 overflow-hidden">
                        <?php if($post->featured_image): ?>
                            <img 
                                src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" 
                                alt="<?php echo e($post->title); ?>" 
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                            >
                        <?php else: ?>
                            <div class="flex items-center justify-center h-full">
                                <svg class="w-16 h-16 text-navyBlue opacity-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Article Content -->
                    <div class="p-6">
                        <!-- Date & Author -->
                        <div class="flex items-center gap-3 mb-3 text-sm text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?php echo e($post->published_at->format('d M Y')); ?>

                            </span>
                            <?php if($post->author): ?>
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <?php echo e($post->author); ?>

                            </span>
                            <?php endif; ?>
                        </div>

                        <!-- Title -->
                        <h2 class="text-xl font-bold text-navyBlue mb-3 line-clamp-2 group-hover:text-orange-600 transition-colors">
                            <a href="<?php echo e($post->url); ?>">
                                <?php echo e($post->title); ?>

                            </a>
                        </h2>
                        
                        <!-- Excerpt -->
                        <?php if($post->excerpt): ?>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                            <?php echo e($post->excerpt); ?>

                        </p>
                        <?php endif; ?>
                        
                        <!-- Footer -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-sm text-gray-500 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <?php echo e($post->views); ?> مشاهدة
                            </span>
                            
                            <a 
                                href="<?php echo e($post->url); ?>" 
                                class="inline-flex items-center justify-center h-[40px] px-5 rounded-2xl bg-navyBlue text-white text-sm font-medium shadow-sm hover:shadow-md transition-all duration-150 hover:-translate-y-0.5"
                            >
                                اقرأ المزيد
                            </a>
                        </div>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($posts->links()); ?>

            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="max-w-md mx-auto text-center py-16">
                <div class="bg-lightOrange rounded-2xl p-12 shadow-sm">
                    <svg class="w-20 h-20 mx-auto mb-6 text-navyBlue opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-navyBlue mb-3">لا توجد مقالات حالياً</h3>
                    <p class="text-gray-600 mb-6">تابعنا لمشاهدة أحدث المقالات والأخبار</p>
                    <a 
                        href="<?php echo e(route('shop.home.index')); ?>" 
                        class="inline-flex items-center justify-center h-[40px] px-7 rounded-2xl bg-navyBlue text-white text-sm font-medium shadow-sm hover:shadow-md transition-all duration-150 hover:-translate-y-0.5"
                    >
                        العودة للرئيسية
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\blog\index.blade.php ENDPATH**/ ?>