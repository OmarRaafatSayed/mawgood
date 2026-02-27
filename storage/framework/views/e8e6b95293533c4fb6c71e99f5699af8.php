<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ماوجود - السوق الإلكتروني</title>
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

<header class="sticky top-0 z-50 bg-white border-b">
<div class="max-w-7xl mx-auto px-4 lg:px-8 py-3 flex items-center justify-between gap-4">
<div class="flex items-center gap-4">
<a href="/" class="text-2xl font-bold text-primary">ماوجود</a>
<div class="hidden lg:flex items-center gap-6">
<a href="/categories" class="text-gray-700 hover:text-primary">الأقسام</a>
<a href="/jobs" class="text-gray-700 hover:text-primary">الوظائف</a>
</div>
</div>
<div class="flex-1 max-w-2xl hidden md:block">
<form action="/search" method="GET" class="relative">
<input type="text" name="query" placeholder="ابحث عن منتجات..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary"/>
<button type="submit" class="absolute left-2 top-1/2 -translate-y-1/2">
<span class="material-symbols-outlined text-primary">search</span>
</button>
</form>
</div>
<div class="flex items-center gap-2">
<a href="/checkout/cart" class="relative p-2 hover:bg-gray-100 rounded-full">
<span class="material-symbols-outlined text-gray-700">shopping_cart</span>
<span id="cart-badge-top" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold rounded-full size-5 items-center justify-center">0</span>
</a>
<a href="#" class="p-2 hover:bg-gray-100 rounded-full">
<span class="material-symbols-outlined text-gray-700">person</span>
</a>
</div>
</div>
</header>

<main class="max-w-7xl mx-auto px-4 lg:px-8 py-6 pb-24 lg:pb-8">
<section class="mb-8">
<div class="bg-gradient-to-r from-primary to-orange-600 rounded-[15px] p-8 lg:p-12 text-white">
<h1 class="text-3xl lg:text-5xl font-bold mb-4">اكتشف أفضل المنتجات</h1>
<p class="text-lg mb-6">تسوق من آلاف المنتجات بأفضل الأسعار</p>
<a href="/categories" class="inline-block bg-white text-primary px-6 py-3 rounded-lg font-bold hover:bg-gray-100">تصفح الأقسام</a>
</div>
</section>

<section class="mb-8">
<div class="flex items-center justify-between mb-4">
<h2 class="text-2xl font-bold text-gray-800">الفئات</h2>
<a href="/categories" class="text-primary font-medium">عرض الكل</a>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" id="categoriesGrid"></div>
</section>

<section>
<div class="flex items-center justify-between mb-4">
<h2 class="text-2xl font-bold text-gray-800">المنتجات الرائجة</h2>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4" id="productsGrid"></div>
</section>
</main>

<footer class="bg-gray-800 text-white mt-12">
<div class="max-w-7xl mx-auto px-4 lg:px-8 py-8">
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div>
<h3 class="text-xl font-bold mb-4">ماوجود</h3>
<p class="text-gray-400">السوق الإلكتروني الأول في مصر</p>
</div>
<div>
<h4 class="font-bold mb-4">روابط سريعة</h4>
<ul class="space-y-2 text-gray-400">
<li><a href="/categories" class="hover:text-white">الأقسام</a></li>
<li><a href="/jobs" class="hover:text-white">الوظائف</a></li>
<li><a href="#" class="hover:text-white">من نحن</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-4">تواصل معنا</h4>
<ul class="space-y-2 text-gray-400">
<li>البريد: info@mawgood.com</li>
<li>الهاتف: 0123456789</li>
</ul>
</div>
</div>
<div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
<p>&copy; 2024 ماوجود. جميع الحقوق محفوظة.</p>
</div>
</div>
</footer>

<?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script>
async function loadCategories() {
    try {
        const response = await fetch('/api/categories/tree');
        const data = await response.json();
        const grid = document.getElementById('categoriesGrid');
        grid.innerHTML = data.data.slice(0, 6).map(cat => `
            <a href="/categories/${cat.id}/products" class="bg-white rounded-[15px] p-4 text-center hover:shadow-md transition-shadow">
                <div class="size-16 mx-auto rounded-full bg-primary/10 flex items-center justify-center mb-2">
                    <span class="material-symbols-outlined text-3xl text-primary">category</span>
                </div>
                <h3 class="font-bold text-sm">${cat.name}</h3>
            </a>
        `).join('');
    } catch (error) {
        console.error('Error:', error);
    }
}

async function loadProducts() {
    try {
        const response = await fetch('/api/products');
        const data = await response.json();
        const grid = document.getElementById('productsGrid');
        grid.innerHTML = data.products.slice(0, 10).map(p => `
            <a href="/product/${p.id}" class="bg-white rounded-[15px] overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-square bg-gray-100">
                    <img src="${p.images?.[0]?.url || '/images/placeholder.png'}" class="w-full h-full object-cover" alt="${p.name}"/>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-medium line-clamp-2 mb-2">${p.name}</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-primary font-bold">${p.price} جنيه</span>
                        <button onclick="event.preventDefault(); addToCart(${p.id})" class="size-9 rounded-full bg-primary text-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-[20px]">add</span>
                        </button>
                    </div>
                </div>
            </a>
        `).join('');
    } catch (error) {
        console.error('Error:', error);
    }
}

async function addToCart(productId) {
    try {
        await fetch('/api/checkout/cart', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
            body: JSON.stringify({ product_id: productId, quantity: 1 })
        });
        if (typeof updateCartBadge === 'function') updateCartBadge();
        updateTopBadge();
    } catch (error) {
        console.error('Cart error:', error);
    }
}

function updateTopBadge() {
    fetch('/api/checkout/cart')
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('cart-badge-top');
            const count = data.data?.items_count || 0;
            if (count > 0) {
                badge.textContent = count;
                badge.classList.remove('hidden');
                badge.classList.add('flex');
            } else {
                badge.classList.add('hidden');
            }
        })
        .catch(() => {});
}

loadCategories();
loadProducts();
updateTopBadge();
</script>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/home.blade.php ENDPATH**/ ?>