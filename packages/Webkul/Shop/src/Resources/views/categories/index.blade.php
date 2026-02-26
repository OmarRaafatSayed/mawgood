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
.category-overlay {
    background: linear-gradient(to top, rgba(0, 51, 102, 0.9) 0%, rgba(0, 51, 102, 0.4) 40%, rgba(0, 51, 102, 0) 100%);
}
body {
    font-family: 'Manrope', 'Tajawal', sans-serif;
    background-color: #f8f9fa;
}
</style>
@endPush

<x-shop::layouts :has-header="false" :has-feature="false" :has-footer="false">
<x-slot:title>التصنيفات - موجود</x-slot>
<div class="relative mx-auto w-full max-w-md lg:max-w-7xl min-h-screen flex flex-col bg-background-light">
<header class="sticky top-0 z-50 flex items-center justify-between bg-white/90 backdrop-blur-md px-4 h-16 border-b border-primary/5">
<button onclick="history.back()" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
<h1 class="text-primary text-xl font-bold">التصنيفات</h1>
<a href="{{ route('shop.search.index') }}" class="p-2 text-primary hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">search</span>
</a>
</header>

<main class="flex-1 overflow-y-auto p-6 pb-24">
@php
$categoryIcons = [
    'أزياء' => 'apparel',
    'إلكترونيات' => 'devices',
    'جمال' => 'spa',
    'رياضة' => 'sports_soccer',
    'كتب' => 'menu_book',
];
@endphp

@if(isset($categories) && $categories->count() > 0)
<div class="grid grid-cols-3 gap-6">
@foreach($categories as $category)
<a href="{{ route('shop.categories.view', $category->id) }}" class="flex flex-col items-center gap-2 transition-transform active:scale-95">
<div class="size-20 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold hover:shadow-md transition-shadow">
<span class="material-symbols-outlined text-4xl text-accent-gold">{{ $categoryIcons[$category->name] ?? 'category' }}</span>
</div>
<span class="text-xs font-bold text-primary text-center">{{ $category->name }}</span>
</a>
@endforeach
</div>
@else
<div class="flex flex-col items-center justify-center py-20">
<span class="material-symbols-outlined text-6xl text-gray-300 mb-4">category</span>
<h3 class="text-lg font-bold text-primary mb-2">لا توجد تصنيفات</h3>
<p class="text-sm text-gray-500">لم يتم إضافة أي تصنيفات بعد</p>
</div>
@endif
</main>
</div>
</x-shop::layouts>
