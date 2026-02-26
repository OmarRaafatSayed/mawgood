@push('styles')
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script id="tailwind-config">
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                "primary": "#003366",
                "accent-gold": "#FF6D00",
                "background-light": "#f8f9fa",
            },
        },
    },
}
</script>
<style>
body {
    font-family: 'Manrope', 'Tajawal', sans-serif;
    background-color: #f8f9fa;
}
</style>
@endPush

<x-shop::layouts :has-header="false" :has-feature="false" :has-footer="false">
<x-slot:title>{{ $category->name }} - موجود</x-slot>
<div class="relative mx-auto w-full max-w-md lg:max-w-7xl min-h-screen flex flex-col bg-background-light">
<header class="sticky top-0 z-50 flex items-center justify-between bg-white/90 backdrop-blur-md px-4 h-16 border-b border-primary/5">
<button onclick="history.back()" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
<h1 class="text-primary text-xl font-bold">{{ $category->name }}</h1>
<a href="{{ route('shop.search.index') }}" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">search</span>
</a>
</header>

<main class="flex-1 overflow-y-auto p-6 pb-24">
@if($category->children && $category->children->count() > 0)
<!-- Sub-categories Grid -->
<div class="mb-8">
<h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2">
<span class="w-1 h-6 bg-accent-gold rounded-full"></span>
التصنيفات الفرعية
</h2>
<div class="grid grid-cols-3 gap-6">
@foreach($category->children as $subCategory)
<a href="{{ route('shop.search.index', ['category' => $subCategory->id]) }}" class="flex flex-col items-center gap-2 transition-transform active:scale-95">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold hover:shadow-md transition-shadow">
<span class="material-symbols-outlined text-4xl text-accent-gold">category</span>
</div>
<span class="text-xs font-bold text-primary text-center">{{ $subCategory->name }}</span>
</a>
@endforeach
</div>
</div>
@endif

<!-- Products Section -->
@if($products && $products->count() > 0)
<div>
<h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2">
<span class="w-1 h-6 bg-accent-gold rounded-full"></span>
المنتجات
</h2>
<div class="grid grid-cols-2 gap-4">
@foreach($products as $product)
<a href="{{ route('shop.product_or_category.index', $product->url_key) }}" class="bg-white rounded-lg p-3 shadow-sm border border-primary/5 flex flex-col hover:shadow-md transition-shadow">
<div class="relative aspect-square rounded-md overflow-hidden bg-background-light mb-3">
@if($product->base_image)
<img alt="{{ $product->name }}" class="w-full h-full object-cover" src="{{ $product->base_image->url }}"/>
@else
<div class="w-full h-full flex items-center justify-center bg-gray-100">
<span class="material-symbols-outlined text-4xl text-gray-300">image</span>
</div>
@endif
</div>
<h4 class="text-sm font-semibold line-clamp-2 mb-2">{{ $product->name }}</h4>
<div class="mt-auto">
<span class="text-primary font-bold text-sm">{{ core()->formatPrice($product->price) }}</span>
</div>
</a>
@endforeach
</div>

@if($products->hasPages())
<div class="mt-6">
{{ $products->links() }}
</div>
@endif
</div>
@elseif(!$category->children || $category->children->count() == 0)
<div class="flex flex-col items-center justify-center py-20">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">shopping_bag</span>
<h3 class="text-lg font-bold text-primary mb-2">لا توجد منتجات</h3>
<p class="text-sm text-gray-500">لم يتم إضافة منتجات في هذا التصنيف بعد</p>
</div>
@endif
</main>
</div>
</x-shop::layouts>
