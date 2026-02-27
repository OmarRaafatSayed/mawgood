<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>المنتجات - ماوجود</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: { "primary": "#FF6B00" }
        }
    }
}
</script>
<style>
body { font-family: 'Tajawal', sans-serif; }
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
</head>
<body class="bg-gray-50">
<div class="min-h-screen">

<header class="sticky top-0 z-40 bg-white border-b px-4 lg:px-8 py-3">
<div class="max-w-7xl mx-auto flex items-center justify-between">
<button onclick="window.history.back()" class="size-10 rounded-full hover:bg-primary/5 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">arrow_forward</span>
</button>
<h1 class="text-xl font-bold text-gray-800" id="categoryTitle">المنتجات</h1>
<button class="size-10 rounded-full hover:bg-primary/5 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">tune</span>
</button>
</div>
</header>

<div class="bg-white border-b py-3 px-4 lg:px-8 overflow-x-auto hide-scrollbar">
<div class="max-w-7xl mx-auto flex gap-2" id="subCategoryBar">
<button onclick="filterProducts('all')" class="px-5 py-2 rounded-full bg-primary text-white text-sm font-medium whitespace-nowrap">الكل</button>
</div>
</div>

<main class="max-w-7xl mx-auto px-4 lg:px-8 py-6">
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="productGrid"></div>
<div id="emptyState" class="hidden text-center py-20">
<span class="material-symbols-outlined text-6xl text-gray-300">inventory_2</span>
<p class="text-gray-500 mt-4">لا توجد منتجات</p>
</div>
</main>

<?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</div>

<script>
const categoryId = window.location.pathname.split('/')[2];
let currentFilter = 'all';

async function loadCategoryData() {
    try {
        const response = await fetch(`/api/categories/${categoryId}/products`);
        const data = await response.json();
        
        document.getElementById('categoryTitle').textContent = data.category.name;
        document.title = 'ماوجود - ' + data.category.name;
        
        if (data.category.children?.length) {
            const bar = document.getElementById('subCategoryBar');
            data.category.children.forEach(sub => {
                const btn = document.createElement('button');
                btn.onclick = () => filterProducts(sub.id);
                btn.className = 'px-5 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium whitespace-nowrap hover:bg-primary/10';
                btn.textContent = sub.name;
                btn.dataset.subId = sub.id;
                bar.appendChild(btn);
            });
        }
        
        renderProducts(data.products);
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('emptyState').classList.remove('hidden');
    }
}

async function filterProducts(subCategoryId) {
    currentFilter = subCategoryId;
    
    document.querySelectorAll('#subCategoryBar button').forEach(b => {
        b.className = 'px-5 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium whitespace-nowrap hover:bg-primary/10';
    });
    event.target.className = 'px-5 py-2 rounded-full bg-primary text-white text-sm font-medium whitespace-nowrap';
    
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
        <a href="/product/${p.id}" class="bg-white rounded-[15px] overflow-hidden shadow-sm border hover:shadow-md transition-shadow">
            <div class="relative aspect-square bg-gray-100">
                <img src="${p.images?.[0]?.url || '/images/placeholder.png'}" class="w-full h-full object-cover" alt="${p.name}"/>
                <button onclick="event.preventDefault()" class="absolute top-2 right-2 size-8 bg-white/90 rounded-full flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-[20px] text-gray-400">favorite</span>
                </button>
            </div>
            <div class="p-3">
                <h3 class="text-sm font-medium text-gray-800 leading-tight mb-2 line-clamp-2">${p.name}</h3>
                <div class="flex items-center justify-between">
                    <span class="text-primary font-bold text-base">${p.price} جنيه</span>
                    <button onclick="event.preventDefault(); addToCart(${p.id})" class="size-9 rounded-full bg-primary text-white flex items-center justify-center shadow-md active:scale-95 transition-transform">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                    </button>
                </div>
            </div>
        </a>
    `).join('');
}

async function addToCart(productId) {
    try {
        await fetch('/api/checkout/cart', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        });
        if (typeof updateCartBadge === 'function') updateCartBadge();
    } catch (error) {
        console.error('Cart error:', error);
    }
}

loadCategoryData();
</script>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/categories/products-new.blade.php ENDPATH**/ ?>