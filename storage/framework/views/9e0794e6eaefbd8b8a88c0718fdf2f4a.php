<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'title' => 'Shop by Category',
    'categories' => []
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'title' => 'Shop by Category',
    'categories' => []
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $categoryIcons = [
        'electronics' => '📱',
        'fashion' => '👗',
        'home' => '🏠',
        'beauty' => '💄',
        'sports' => '⚽',
        'books' => '📚',
        'all' => '🛍️'
    ];
    
    $defaultCategories = [
        [
            'id' => 0,
            'name' => 'All Categories',
            'slug' => 'all',
            'icon' => $categoryIcons['all'],
            'url' => route('shop.search.index'),
            'color' => 'from-purple-500 to-pink-500'
        ]
    ];
    
    $colors = [
        'from-blue-500 to-cyan-500',
        'from-green-500 to-teal-500',
        'from-yellow-500 to-orange-500',
        'from-red-500 to-pink-500',
        'from-indigo-500 to-purple-500',
        'from-gray-500 to-slate-500'
    ];
    
    $categoryList = collect($categories)->take(7)->map(function($category, $index) use ($categoryIcons, $colors) {
        $slug = strtolower($category->slug);
        return [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'icon' => $categoryIcons[$slug] ?? '🏷️',
            'url' => route('shop.search.index', ['category' => $category->id]),
            'color' => $colors[$index % count($colors)]
        ];
    })->toArray();
    
    $allCategories = array_merge($defaultCategories, $categoryList);
?>

<div class="container mx-auto px-4 py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4"><?php echo e($title); ?></h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Discover our wide range of products across different categories</p>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-8 max-w-6xl mx-auto">
        <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a 
                href="<?php echo e($category['url']); ?>" 
                class="group flex flex-col items-center p-6 rounded-2xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 bg-white border border-gray-100"
            >
                <div class="w-20 h-20 bg-gradient-to-br <?php echo e($category['color']); ?> rounded-full flex items-center justify-center mb-4 group-hover:scale-125 transition-all duration-500 shadow-xl group-hover:shadow-2xl">
                    <span class="text-3xl"><?php echo e($category['icon']); ?></span>
                </div>
                <span class="text-sm font-semibold text-gray-700 text-center group-hover:text-blue-600 transition-colors duration-300 leading-tight">
                    <?php echo e($category['name']); ?>

                </span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <div class="text-center mt-12">
        <a 
            href="<?php echo e(route('shop.search.index')); ?>" 
            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
        >
            View All Products
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>
</div><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\categories\circular.blade.php ENDPATH**/ ?>