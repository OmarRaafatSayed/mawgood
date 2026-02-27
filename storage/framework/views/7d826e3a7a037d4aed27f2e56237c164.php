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
</style>
</head>
<body class="bg-gray-50">
<div class="relative mx-auto max-w-[393px] min-h-screen bg-white flex flex-col">
<div class="h-12 w-full bg-white sticky top-0 z-50"></div>

<header class="sticky top-12 z-50 flex items-center justify-between px-4 py-3 bg-white/80 backdrop-blur-md border-b">
<button onclick="window.history.back()" class="size-10 rounded-full hover:bg-primary/5">
<span class="material-symbols-outlined text-primary">arrow_forward</span>
</button>
<h1 class="text-lg font-bold text-primary" id="categoryTitle">...</h1>
<button class="size-10 rounded-full hover:bg-primary/5">
<span class="material-symbols-outlined text-primary">tune</span>
</button>
</header>

<div class="bg-white py-4 px-4 overflow-x-auto hide-scrollbar flex gap-2" id="subCategoryBar">
<button onclick="filterProducts('all')" class="px-5 py-2 rounded-full bg-primary text-white text-sm font-medium active-filter">الكل</button>
</div>

<main class="flex-1 overflow-y-auto px-4 pb-24">
<div class="grid grid-cols-2 gap-3 py-4" id="productGrid"></div>
<div id="emptyState" class="hidden text-center py-12">
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
                btn.className = 'px-5 py-2 rounded-full bg-primary/5 text-primary text-sm font-medium border border-primary/10';
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
        b.className = 'px-5 py-2 rounded-full bg-primary/5 text-primary text-sm font-medium border border-primary/10';
    });
    event.target.className = 'px-5 py-2 rounded-full bg-primary text-white text-sm font-medium';
    
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
                <img src="${p.base_image?.small_image_url || '/images/placeholder.png'}" class="w-full h-full object-cover" alt="${p.name}"/>
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
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
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
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        });
        const data = await response.json();
        
        const badge = document.getElementById('cartBadge');
        badge.textContent = data.cart_count || parseInt(badge.textContent) + 1;
        
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/categories/products.blade.php ENDPATH**/ ?>