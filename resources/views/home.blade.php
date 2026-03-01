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
@include('components.desktop-navbar')

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

<section class="mt-12">
<div class="flex items-center justify-between mb-4">
<h2 class="text-2xl font-bold text-gray-800">أحدث الوظائف</h2>
<a href="/jobs" class="text-primary font-medium">عرض الكل</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="jobsGrid"></div>
</section>

<section class="mt-12">
<h2 class="text-2xl font-bold text-gray-800 mb-6">الأسئلة الشائعة</h2>
<div class="space-y-3">
<div class="bg-white rounded-[15px] shadow-sm">
<button onclick="toggleFaq(1)" class="w-full p-4 text-right flex items-center justify-between">
<span class="font-bold text-gray-800">كيف أقوم بالشراء من الموقع؟</span>
<span class="material-symbols-outlined text-primary" id="faq-icon-1">expand_more</span>
</button>
<div id="faq-content-1" class="hidden px-4 pb-4 text-gray-600">
يمكنك تصفح المنتجات، إضافتها للسلة، ثم إتمام عملية الدفع عند الاستلام أو بالبطاقة الائتمانية.
</div>
</div>
<div class="bg-white rounded-[15px] shadow-sm">
<button onclick="toggleFaq(2)" class="w-full p-4 text-right flex items-center justify-between">
<span class="font-bold text-gray-800">ما هي مدة التوصيل؟</span>
<span class="material-symbols-outlined text-primary" id="faq-icon-2">expand_more</span>
</button>
<div id="faq-content-2" class="hidden px-4 pb-4 text-gray-600">
التوصيل العادي يستغرق 3-5 أيام عمل، والتوصيل السريع 1-2 يوم.
</div>
</div>
<div class="bg-white rounded-[15px] shadow-sm">
<button onclick="toggleFaq(3)" class="w-full p-4 text-right flex items-center justify-between">
<span class="font-bold text-gray-800">هل يمكن إرجاع المنتجات؟</span>
<span class="material-symbols-outlined text-primary" id="faq-icon-3">expand_more</span>
</button>
<div id="faq-content-3" class="hidden px-4 pb-4 text-gray-600">
نعم، يمكنك إرجاع المنتج خلال 14 يوم من تاريخ الاستلام.
</div>
</div>
<div class="bg-white rounded-[15px] shadow-sm">
<button onclick="toggleFaq(4)" class="w-full p-4 text-right flex items-center justify-between">
<span class="font-bold text-gray-800">كيف أتقدم لوظيفة؟</span>
<span class="material-symbols-outlined text-primary" id="faq-icon-4">expand_more</span>
</button>
<div id="faq-content-4" class="hidden px-4 pb-4 text-gray-600">
اضغط على "قدم الآن" في الوظيفة المطلوبة واملأ النموذج.
</div>
</div>
</div>
</section>
</main>

@include('components.footer')
@include('components.navbar')

<script>
async function loadCategories() {
    try {
        const response = await fetch('/api/categories/tree');
        const data = await response.json();
        const grid = document.getElementById('categoriesGrid');
        
        const allCategories = [];
        data.data.forEach(cat => {
            allCategories.push(cat);
            if (cat.children && cat.children.length > 0) {
                allCategories.push(...cat.children);
            }
        });
        
        grid.innerHTML = allCategories.map(cat => `
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

async function loadJobs() {
    const grid = document.getElementById('jobsGrid');
    grid.innerHTML = `
        <div class="bg-white rounded-[15px] p-4 shadow-sm border border-primary/5">
            <div class="flex items-start gap-4">
                <div class="size-14 rounded-lg bg-gray-100 p-2 flex items-center justify-center border border-primary/5 overflow-hidden">
                    <span class="material-symbols-outlined text-3xl text-primary">work</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-primary leading-tight">مصمم واجهة وتجربة مستخدم</h4>
                            <p class="text-xs text-gray-500 font-medium mt-0.5">النيل للحلول الرقمية</p>
                        </div>
                        <span class="px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-bold rounded uppercase tracking-wider">Full Time</span>
                    </div>
                    <div class="flex items-center gap-4 mt-3 text-xs text-gray-500">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                            المعادي، القاهرة
                        </div>
                        <div class="flex items-center gap-1 font-semibold text-primary">
                            <span class="material-symbols-outlined text-sm text-primary">payments</span>
                            ٢٥ - ٣٥ ألف جنيه
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="/jobs" class="flex-1 py-2.5 bg-primary text-white font-bold rounded-lg text-sm text-center transition-transform active:scale-[0.98]">قدم الآن</a>
                <button class="px-3 py-2.5 bg-gray-100 text-primary rounded-lg border border-primary/10 active:scale-95">
                    <span class="material-symbols-outlined text-xl align-middle">bookmark</span>
                </button>
            </div>
        </div>
        <div class="bg-white rounded-[15px] p-4 shadow-sm border border-primary/5">
            <div class="flex items-start gap-4">
                <div class="size-14 rounded-lg bg-gray-100 p-2 flex items-center justify-center border border-primary/5 overflow-hidden">
                    <span class="material-symbols-outlined text-3xl text-primary">work</span>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-primary leading-tight">مدير مشروع</h4>
                            <p class="text-xs text-gray-500 font-medium mt-0.5">سفنكس للتكنولوجيا</p>
                        </div>
                        <span class="px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-bold rounded uppercase tracking-wider">Remote</span>
                    </div>
                    <div class="flex items-center gap-4 mt-3 text-xs text-gray-500">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                            القاهرة الجديدة
                        </div>
                        <div class="flex items-center gap-1 font-semibold text-primary">
                            <span class="material-symbols-outlined text-sm text-primary">payments</span>
                            ٣٠ - ٤٥ ألف جنيه
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <a href="/jobs" class="flex-1 py-2.5 bg-primary text-white font-bold rounded-lg text-sm text-center transition-transform active:scale-[0.98]">قدم الآن</a>
                <button class="px-3 py-2.5 bg-gray-100 text-primary rounded-lg border border-primary/10 active:scale-95">
                    <span class="material-symbols-outlined text-xl align-middle">bookmark</span>
                </button>
            </div>
        </div>
    `;
}

function toggleFaq(id) {
    const content = document.getElementById('faq-content-' + id);
    const icon = document.getElementById('faq-icon-' + id);
    content.classList.toggle('hidden');
    icon.textContent = content.classList.contains('hidden') ? 'expand_more' : 'expand_less';
}

async function addToCart(productId) {
    try {
        await fetch('/api/checkout/cart', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
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
loadJobs();
updateTopBadge();
</script>
</body>
</html>
