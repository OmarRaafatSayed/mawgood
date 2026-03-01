<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ماوجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: { "primary": "#FF6B00", "primary-dark": "#E65F00" },
            fontFamily: { "display": ["Manrope", "Tajawal", "sans-serif"] }
        }
    }
}
</script>
<style>
body { font-family: 'Manrope', 'Tajawal', sans-serif; }
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
.custom-scrollbar::-webkit-scrollbar { width: 6px; }
.custom-scrollbar::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
.custom-scrollbar::-webkit-scrollbar-thumb { background: #FF6B00; border-radius: 10px; }
.custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #E65F00; }
</style>
</head>
<body class="bg-gray-50">
@include('components.desktop-navbar')

<div class="relative w-full min-h-screen bg-white flex flex-col">
<div class="h-12 w-full bg-white sticky top-0 z-50 lg:hidden"></div>

<header class="sticky top-12 lg:top-0 z-50 flex items-center justify-between px-4 lg:px-8 xl:px-16 py-4 bg-white/95 backdrop-blur-md border-b shadow-sm max-w-[1920px] mx-auto w-full">
<button onclick="window.history.back()" class="size-10 rounded-full hover:bg-primary/10 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined text-primary text-2xl">arrow_forward</span>
</button>
<h1 class="text-xl font-bold text-primary" id="categoryTitle">...</h1>
<button onclick="toggleFilter()" class="size-10 rounded-full hover:bg-primary/10 flex items-center justify-center transition-colors relative">
<span class="material-symbols-outlined text-primary text-2xl">tune</span>
<span id="filterBadge" class="hidden absolute -top-1 -left-1 bg-red-500 text-white text-[10px] font-bold rounded-full size-5 items-center justify-center">0</span>
</button>
</header>

<!-- Filter Sidebar -->
<div id="filterSidebar" class="fixed inset-0 bg-black/50 z-50 hidden" onclick="toggleFilter()">
<div onclick="event.stopPropagation()" class="absolute left-0 top-0 bottom-0 w-full max-w-sm bg-white shadow-2xl overflow-y-auto">
<div class="sticky top-0 bg-gradient-to-r from-primary to-primary-dark text-white p-4 flex items-center justify-between shadow-md">
<h2 class="text-xl font-bold">تخصيص البحث</h2>
<button onclick="toggleFilter()" class="size-10 rounded-full hover:bg-white/20 flex items-center justify-center transition-colors">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<div class="p-5 space-y-6">
<!-- Price Range -->
<div class="bg-gray-50 rounded-xl p-4">
<h3 class="font-bold text-base mb-3 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">payments</span>
نطاق السعر
</h3>
<div class="grid grid-cols-2 gap-3">
<div>
<label class="text-xs text-gray-600 mb-1 block">من</label>
<input type="number" id="minPrice" placeholder="0" class="w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg text-sm focus:border-primary focus:outline-none">
</div>
<div>
<label class="text-xs text-gray-600 mb-1 block">إلى</label>
<input type="number" id="maxPrice" placeholder="10000" class="w-full px-3 py-2.5 border-2 border-gray-200 rounded-lg text-sm focus:border-primary focus:outline-none">
</div>
</div>
</div>
<!-- Colors -->
<div>
<h3 class="font-bold text-base mb-3 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">palette</span>
الألوان
</h3>
<div id="colorFilters" class="flex flex-wrap gap-2"></div>
</div>
<!-- Sizes -->
<div>
<h3 class="font-bold text-base mb-3 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">straighten</span>
المقاسات
</h3>
<div id="sizeFilters" class="flex flex-wrap gap-2"></div>
</div>
<!-- Brands -->
<div>
<h3 class="font-bold text-base mb-3 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">verified</span>
العلامة التجارية
</h3>
<div id="brandFilters" class="space-y-2.5 max-h-48 overflow-y-auto pr-2 custom-scrollbar"></div>
</div>
<!-- Sort -->
<div>
<h3 class="font-bold text-base mb-3 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">sort</span>
الترتيب
</h3>
<select id="sortBy" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg text-sm focus:border-primary focus:outline-none bg-white">
<option value="">الافتراضي</option>
<option value="price_asc">السعر: من الأقل للأعلى</option>
<option value="price_desc">السعر: من الأعلى للأقل</option>
<option value="name_asc">الاسم: أ-ي</option>
<option value="name_desc">الاسم: ي-أ</option>
<option value="newest">الأحدث</option>
</select>
</div>
</div>
<!-- Sticky Bottom Actions -->
<div class="sticky bottom-0 bg-white border-t p-4 flex gap-3 shadow-lg">
<button onclick="resetFilters()" class="flex-1 py-3 border-2 border-primary text-primary font-bold rounded-xl hover:bg-primary/5 transition-colors">
إعادة تعيين
</button>
<button onclick="applyFilters()" class="flex-[2] py-3 bg-gradient-to-r from-primary to-primary-dark text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
تطبيق الفلاتر
</button>
</div>
</div>
</div>

<div class="bg-white py-3 px-4 lg:px-8 xl:px-16 overflow-x-auto hide-scrollbar flex gap-2 border-b max-w-[1920px] mx-auto w-full" id="subCategoryBar">
<button onclick="filterProducts('all')" class="px-5 py-2.5 rounded-full bg-primary text-white text-sm font-semibold shadow-md active-filter">الكل</button>
</div>

<main class="flex-1 overflow-y-auto px-4 lg:px-8 xl:px-16 pb-24 lg:pb-8 max-w-[1920px] mx-auto w-full">
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-3 lg:gap-4 py-4" id="productGrid"></div>
<div id="emptyState" class="hidden text-center py-12">
<span class="material-symbols-outlined text-6xl text-gray-300">inventory_2</span>
<p class="text-gray-500 mt-4">لا توجد منتجات</p>
</div>
</main>

@include('components.footer')
@include('components.navbar')
</div>

<script>
const categoryId = window.location.pathname.split('/')[2] || '1';
let currentFilter = 'all';
let allProducts = [];
let selectedColors = [];
let selectedSizes = [];
let selectedBrands = [];

function toggleFilter() {
    document.getElementById('filterSidebar').classList.toggle('hidden');
}

function loadFilterOptions() {
    const colors = new Set();
    const sizes = new Set();
    const brands = new Set();
    
    allProducts.forEach(p => {
        if (p.color) colors.add(p.color);
        if (p.size) sizes.add(p.size);
        if (p.brand) brands.add(p.brand);
    });
    
    document.getElementById('colorFilters').innerHTML = Array.from(colors).map(c => `
        <button onclick="toggleColorFilter('${c}')" data-color="${c}" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-all hover:shadow-md">${c}</button>
    `).join('');
    
    document.getElementById('sizeFilters').innerHTML = Array.from(sizes).map(s => `
        <button onclick="toggleSizeFilter('${s}')" data-size="${s}" class="px-4 py-2 border-2 border-gray-200 rounded-lg text-sm font-medium hover:border-primary transition-all hover:shadow-md">${s}</button>
    `).join('');
    
    document.getElementById('brandFilters').innerHTML = Array.from(brands).map(b => `
        <label class="flex items-center gap-3 cursor-pointer p-2 rounded-lg hover:bg-gray-50 transition-colors">
            <input type="checkbox" onchange="toggleBrandFilter('${b}')" class="w-5 h-5 rounded border-2 border-gray-300 text-primary focus:ring-primary" data-brand="${b}">
            <span class="text-sm font-medium">${b}</span>
        </label>
    `).join('');
}

function toggleColorFilter(color) {
    const btn = document.querySelector(`[data-color="${color}"]`);
    if (selectedColors.includes(color)) {
        selectedColors = selectedColors.filter(c => c !== color);
        btn.classList.remove('bg-primary', 'text-white', 'border-primary');
        btn.classList.add('border-gray-200');
    } else {
        selectedColors.push(color);
        btn.classList.add('bg-primary', 'text-white', 'border-primary');
        btn.classList.remove('border-gray-200');
    }
}

function toggleSizeFilter(size) {
    const btn = document.querySelector(`[data-size="${size}"]`);
    if (selectedSizes.includes(size)) {
        selectedSizes = selectedSizes.filter(s => s !== size);
        btn.classList.remove('bg-primary', 'text-white', 'border-primary');
        btn.classList.add('border-gray-200');
    } else {
        selectedSizes.push(size);
        btn.classList.add('bg-primary', 'text-white', 'border-primary');
        btn.classList.remove('border-gray-200');
    }
}

function toggleBrandFilter(brand) {
    if (selectedBrands.includes(brand)) {
        selectedBrands = selectedBrands.filter(b => b !== brand);
    } else {
        selectedBrands.push(brand);
    }
}

function applyFilters() {
    const minPrice = parseFloat(document.getElementById('minPrice').value) || 0;
    const maxPrice = parseFloat(document.getElementById('maxPrice').value) || Infinity;
    const sortBy = document.getElementById('sortBy').value;
    
    let filtered = allProducts.filter(p => {
        const price = parseFloat(p.price);
        const priceMatch = price >= minPrice && price <= maxPrice;
        const colorMatch = selectedColors.length === 0 || selectedColors.includes(p.color);
        const sizeMatch = selectedSizes.length === 0 || selectedSizes.includes(p.size);
        const brandMatch = selectedBrands.length === 0 || selectedBrands.includes(p.brand);
        return priceMatch && colorMatch && sizeMatch && brandMatch;
    });
    
    if (sortBy === 'price_asc') filtered.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
    if (sortBy === 'price_desc') filtered.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
    if (sortBy === 'name_asc') filtered.sort((a, b) => a.name.localeCompare(b.name, 'ar'));
    if (sortBy === 'name_desc') filtered.sort((a, b) => b.name.localeCompare(a.name, 'ar'));
    if (sortBy === 'newest') filtered.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
    
    renderProducts(filtered);
    toggleFilter();
}

function resetFilters() {
    document.getElementById('minPrice').value = '';
    document.getElementById('maxPrice').value = '';
    document.getElementById('sortBy').value = '';
    selectedColors = [];
    selectedSizes = [];
    selectedBrands = [];
    document.querySelectorAll('[data-color]').forEach(b => b.classList.remove('bg-primary', 'text-white', 'border-primary'));
    document.querySelectorAll('[data-size]').forEach(b => b.classList.remove('bg-primary', 'text-white', 'border-primary'));
    document.querySelectorAll('[data-brand]').forEach(c => c.checked = false);
    renderProducts(allProducts);
    toggleFilter();
}

async function loadCategoryData() {
    try {
        const treeResponse = await fetch('/api/categories/tree');
        const treeData = await treeResponse.json();
        
        const response = await fetch(`/api/categories/${categoryId}/products`);
        const data = await response.json();
        
        document.getElementById('categoryTitle').textContent = data.category.name;
        document.title = 'ماوجود - ' + data.category.name;
        
        const bar = document.getElementById('subCategoryBar');
        const allCategories = [];
        treeData.data.forEach(cat => {
            allCategories.push(cat);
            if (cat.children?.length) {
                allCategories.push(...cat.children);
            }
        });
        
        allCategories.forEach(cat => {
            if (cat.id != categoryId) {
                const btn = document.createElement('button');
                btn.onclick = () => window.location.href = `/categories/${cat.id}/products`;
                btn.className = 'px-5 py-2.5 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors whitespace-nowrap';
                btn.textContent = cat.name;
                bar.appendChild(btn);
            }
        });
        
        renderProducts(data.products);
        allProducts = data.products;
        loadFilterOptions();
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('emptyState').classList.remove('hidden');
    }
}

async function filterProducts(subCategoryId) {
    currentFilter = subCategoryId;
    
    document.querySelectorAll('#subCategoryBar button').forEach(b => {
        b.className = 'px-5 py-2.5 rounded-full bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors';
    });
    event.target.className = 'px-5 py-2.5 rounded-full bg-primary text-white text-sm font-semibold shadow-md';
    
    const url = subCategoryId === 'all' 
        ? `/api/categories/${categoryId}/products` 
        : `/api/products?sub_category_id=${subCategoryId}`;
    
    const response = await fetch(url);
    const data = await response.json();
    renderProducts(data.products);
}

function renderProducts(products) {
    const grid = document.getElementById('productGrid');
    const empty = document.getElementById('emptyState');
    
    if (!products?.length) {
        grid.innerHTML = '';
        empty.classList.remove('hidden');
        return;
    }
    
    empty.classList.add('hidden');
    grid.innerHTML = products.map(p => `
        <a href="/product/${p.id}" class="flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-md transition-shadow">
            <div class="relative aspect-[4/5] bg-slate-50">
                ${p.base_image?.small_image_url || p.images?.[0]?.url 
                    ? `<img src="${p.base_image?.small_image_url || p.images?.[0]?.url}" class="w-full h-full object-cover" alt="${p.name}" loading="lazy"/>` 
                    : `<div class="w-full h-full flex items-center justify-center bg-gray-200"><span class="material-symbols-outlined text-gray-400 text-5xl">image</span></div>`}
                <button onclick="event.preventDefault(); toggleWishlist(${p.id})" class="absolute top-2 right-2 size-8 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[20px] text-slate-400">favorite</span>
                </button>
            </div>
            <div class="p-3 flex flex-col flex-1">
                <div class="flex items-center gap-1 mb-1">
                    <span class="material-symbols-outlined text-[14px] text-yellow-500 fill-current">star</span>
                    <span class="text-[11px] font-bold text-slate-400">4.8</span>
                </div>
                <h3 class="text-sm font-medium text-slate-800 leading-tight mb-2 line-clamp-2">${p.name}</h3>
                <div class="mt-auto flex items-center justify-between">
                    <span class="text-primary font-bold text-base">${p.price} <span class="text-[10px]">جنيه</span></span>
                    <button onclick="event.preventDefault(); addToCart(${p.id})" class="size-9 rounded-full bg-primary text-white flex items-center justify-center shadow-md active:scale-95 transition-transform">
                        <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                    </button>
                </div>
            </div>
        </a>
    `).join('');
}

async function toggleWishlist(productId) {
    try {
        const response = await fetch('/api/wishlist/toggle', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ product_id: productId })
        });
        const data = await response.json();
        console.log('Wishlist updated:', data);
    } catch (error) {
        console.error('Wishlist error:', error);
    }
}

async function addToCart(productId) {
    try {
        const response = await fetch('/api/cart/add', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        });
        
        if (typeof updateCartBadge === 'function') updateCartBadge();
        
        const btn = event.target.closest('button');
        btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">check</span>';
        setTimeout(() => {
            btn.innerHTML = '<span class="material-symbols-outlined text-[20px]">shopping_bag</span>';
        }, 1000);
    } catch (error) {
        console.error('Cart error:', error);
    }
}

loadCategoryData();
</script>
</body>
</html>
