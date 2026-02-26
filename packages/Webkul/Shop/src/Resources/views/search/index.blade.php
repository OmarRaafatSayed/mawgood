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
                "background-dark": "#0f1923",
            },
            fontFamily: {
                "display": ["Manrope", "Tajawal", "sans-serif"]
            },
            borderRadius: {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
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
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.egyptian-pattern {
    background-image: radial-gradient(#003366 0.5px, transparent 0.5px);
    background-size: 24px 24px;
    opacity: 0.03;
}
body {
  min-height: max(884px, 100dvh);
}
</style>
@endPush

<x-shop::layouts :has-header="false" :has-feature="false" :has-footer="false">
<x-slot:title>موجود - السوق</x-slot>

<body class="bg-background-light text-[#101418] antialiased">
<div class="relative mx-auto w-full max-w-md lg:max-w-7xl min-h-screen flex flex-col bg-background-light pb-20">
<div class="fixed inset-0 egyptian-pattern pointer-events-none"></div>
<header class="sticky top-0 z-50 flex items-center justify-between bg-white/90 backdrop-blur-md px-4 lg:px-8 h-16 border-b border-primary/5">
<div class="flex items-center gap-3">
<a href="{{ route('shop.customer.session.index') }}" class="size-9 rounded-full border-2 border-accent-gold p-0.5 hover:border-primary transition-colors">
@if(auth()->guard('customer')->check())
<img alt="User Profile" class="w-full h-full object-cover rounded-full" src="{{ auth()->guard('customer')->user()->image_url ?? asset('images/placeholder.png') }}"/>
@else
<img alt="User Profile" class="w-full h-full object-cover rounded-full" src="{{ asset('images/placeholder.png') }}"/>
@endif
</a>
<button onclick="toggleSearch()" class="p-2 text-primary hover:bg-primary/5 rounded-full transition-colors" title="البحث">
<span class="material-symbols-outlined -scale-x-100">search</span>
</button>
<a href="?locale={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}" class="px-2 py-1 text-primary font-bold text-xs hover:bg-primary/5 rounded transition-colors" title="تبديل اللغة">
{{ app()->getLocale() === 'ar' ? 'EN' : 'ع' }}
</a>
</div>
<div class="flex items-center gap-2">
<a href="{{ route('shop.home.index') }}" class="flex items-center">
<img src="{{ asset('images/logo_white.svg') }}" alt="موجود" class="h-10 w-auto"/>
</a>
<button onclick="toggleMenu()" class="p-2 text-primary hover:bg-primary/5 rounded-full transition-colors" title="القائمة">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</header>

<!-- Search Modal -->
<div id="searchModal" onclick="toggleSearch()" class="fixed inset-0 bg-black/50 z-[60] hidden items-start justify-center pt-20">
<div onclick="event.stopPropagation()" class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 p-4">
<form action="{{ route('shop.search.index') }}" method="GET" class="flex gap-2">
<input type="text" name="query" placeholder="ابحث عن منتجات..." class="flex-1 px-4 py-2 border border-primary/20 rounded-lg focus:outline-none focus:border-primary" autofocus/>
<button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">بحث</button>
</form>
</div>
</div>

<!-- Side Menu -->
<div id="menuModal" onclick="toggleMenu()" class="fixed inset-0 bg-black/50 z-[60] hidden">
<div onclick="event.stopPropagation()" class="fixed right-0 top-0 h-full w-80 bg-white shadow-xl">
<div class="p-4 border-b border-primary/10">
<div class="flex items-center justify-between">
<h2 class="text-xl font-bold text-primary">القائمة</h2>
<button onclick="toggleMenu()" class="p-2 hover:bg-primary/5 rounded-full">
<span class="material-symbols-outlined">close</span>
</button>
</div>
</div>
<nav class="p-4">
<a href="{{ route('shop.home.index') }}" class="flex items-center gap-3 p-3 hover:bg-primary/5 rounded-lg mb-2">
<span class="material-symbols-outlined text-primary">home</span>
<span class="font-medium">الرئيسية</span>
</a>
<a href="{{ route('shop.search.index') }}" class="flex items-center gap-3 p-3 hover:bg-primary/5 rounded-lg mb-2">
<span class="material-symbols-outlined text-primary">shopping_bag</span>
<span class="font-medium">المنتجات</span>
</a>
<a href="{{ route('jobs.index') }}" class="flex items-center gap-3 p-3 hover:bg-primary/5 rounded-lg mb-2">
<span class="material-symbols-outlined text-primary">work</span>
<span class="font-medium">الوظائف</span>
</a>
<a href="{{ route('shop.customer.session.index') }}" class="flex items-center gap-3 p-3 hover:bg-primary/5 rounded-lg mb-2">
<span class="material-symbols-outlined text-primary">person</span>
<span class="font-medium">حسابي</span>
</a>
@if(auth()->guard('customer')->check())
<form method="POST" action="{{ route('shop.customer.session.destroy') }}" class="mt-4">
@csrf
<button type="submit" class="w-full flex items-center gap-3 p-3 hover:bg-red-50 text-red-600 rounded-lg">
<span class="material-symbols-outlined">logout</span>
<span class="font-medium">تسجيل الخروج</span>
</button>
</form>
@endif
</nav>
</div>
</div>

<script>
function toggleSearch() {
    const modal = document.getElementById('searchModal');
    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
}

function toggleMenu() {
    const modal = document.getElementById('menuModal');
    modal.classList.toggle('hidden');
}
</script>
<section class="mt-4 lg:mt-8">
<div class="flex overflow-x-auto hide-scrollbar snap-x snap-mandatory gap-4 px-4 lg:px-8">
<div class="min-w-[85%] lg:min-w-[45%] xl:min-w-[30%] snap-center relative overflow-hidden rounded-xl bg-primary aspect-[16/9] shadow-lg shadow-primary/20">
<img alt="Tech Jobs" class="absolute inset-0 w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxbkukI6eHbusxa4p5i-8hfgEBwwDIpkjWmP8Z5ljsVn8sAvANtGusvCOvfxLVCXVa2U1RsZ7eYeZ82mUZgjqU5Wm0inAzuk8JN2l2F1PFbEJXJVO-yYAwRDoPJ175KexbdoEvm2VqQ84ERq1TYpSzCz2LAFJnEc2HoGK1zGh62XCk-iNjbvkTqlOv_vxCE2D6IYxDNVAXjo6yDsD_SAG85l4HkH4mRyI2ioUD_QqUpmEUtWMXUfnPs0_RoQY1Upma8VxNWPfO_qY"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/20 to-transparent p-5 flex flex-col justify-end">
<span class="text-accent-gold text-xs font-bold uppercase tracking-widest mb-1">نمو مهني</span>
<h2 class="text-white text-xl font-bold leading-tight mb-3">أفضل شركات التكنولوجيا في القاهرة</h2>
<button class="w-fit px-6 py-2 bg-accent-gold text-primary font-bold rounded-lg text-sm transition-transform active:scale-95">قدم الآن</button>
</div>
</div>
<div class="min-w-[85%] lg:min-w-[45%] xl:min-w-[30%] snap-center relative overflow-hidden rounded-xl bg-[#1a1a1a] aspect-[16/9] shadow-lg">
<img alt="Electronics" class="absolute inset-0 w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoHdwXGLqlDw288VSqc636M9bkeZGTP-f-qGrf7q-iAH55HeFMAZhWc2a7lmA7eM_S4zUxYsJTMs67yohkGZdFv14tbGtowQboNgehQaR8u448qaE4XWyM6Dp2q8ixeMpoYLrsOHJYHX4KpBdNcE_ByTSSdcBtI_zt4SJgDrafZyN3xO2KlUDxBR7Li7Ry_OFfDkoSMidtSLouQTXnsW9Dpa7e9sM8duqkWQ2RfzommKeSBMuORTXAOScJ5QKmORoRfWYt0hYMEWI"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent p-5 flex flex-col justify-end">
<span class="text-accent-gold text-xs font-bold uppercase tracking-widest mb-1">أحدث الأجهزة</span>
<h2 class="text-white text-xl font-bold leading-tight mb-3">وصل حديثاً في الإلكترونيات</h2>
<button class="w-fit px-6 py-2 bg-white text-primary font-bold rounded-lg text-sm transition-transform active:scale-95">تسوق الآن</button>
</div>
</div>
<div class="min-w-[85%] lg:min-w-[45%] xl:min-w-[30%] snap-center relative overflow-hidden rounded-xl bg-[#2c3e50] aspect-[16/9] shadow-lg">
<img alt="Fashion" class="absolute inset-0 w-full h-full object-cover opacity-60" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAxIW_3zF-MhQevRTXA7HF8IkTmPpkIH6UAvQ1sTmYubUPVGDJu0VRQnNXmdorztf-G3f480YFAGcQpbg3V6uS6uu3E1cnqSThxzuHMa9L666H5ObrsUCPEuCDRbVyeDWeBXls52nkzayNxHm6fAT0D0ixHlFcVRX9gNULt3tLnQmJyZENi9ZVU8EjPWUoVSRLlCGwFrLHuS3ZlkEJLrBwS_BX7jzR2xdjP2q3mfc4u22UvRSwJu8JnMwj2kYLXF3dKfyh7i8UWYz4"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent p-5 flex flex-col justify-end">
<span class="text-accent-gold text-xs font-bold uppercase tracking-widest mb-1">حرفيين محليين</span>
<h2 class="text-white text-xl font-bold leading-tight mb-3">اكتشف المصممين المصريين</h2>
<button class="w-fit px-6 py-2 bg-accent-gold text-primary font-bold rounded-lg text-sm transition-transform active:scale-95">استكشف</button>
</div>
</div>
</div>
</section>
<section class="mt-8 px-4 lg:px-8">
<div class="flex items-center justify-between mb-4">
<h3 class="text-lg lg:text-xl font-bold text-primary flex items-center gap-2">
<span class="w-1 h-6 bg-accent-gold rounded-full"></span> الفئات
</h3>
<a href="{{ route('shop.categories.index') }}" class="text-accent-gold text-sm font-semibold">عرض الكل</a>
</div>
<div class="flex overflow-x-auto hide-scrollbar gap-6 pb-2">
<a href="{{ route('shop.search.index', ['category' => 'fashion']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">apparel</span>
</div>
<span class="text-xs font-bold text-primary">أزياء</span>
</a>
<a href="{{ route('shop.search.index', ['category' => 'food']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">restaurant</span>
</div>
<span class="text-xs font-bold text-primary">مأكولات</span>
</a>
<a href="{{ route('shop.search.index', ['category' => 'handicrafts']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">brush</span>
</div>
<span class="text-xs font-bold text-primary">حرف يدوية</span>
</a>
<a href="{{ route('shop.search.index', ['category' => 'electronics']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">devices</span>
</div>
<span class="text-xs font-bold text-primary">إلكترونيات</span>
</a>
<a href="{{ route('shop.search.index', ['category' => 'furniture']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">chair</span>
</div>
<span class="text-xs font-bold text-primary">أثاث</span>
</a>
<a href="{{ route('shop.search.index', ['category' => 'beauty']) }}" class="flex flex-col items-center gap-2 flex-shrink-0">
<div class="size-16 rounded-2xl bg-white shadow-sm border flex items-center justify-center text-primary border-accent-gold">
<span class="material-symbols-outlined text-3xl text-accent-gold">spa</span>
</div>
<span class="text-xs font-bold text-primary">جمال</span>
</a>
</div>
</section>
<main class="px-4 lg:px-8 flex flex-col gap-6 mt-4">
<div class="flex items-center justify-between">
<h3 class="text-lg lg:text-xl font-bold text-primary flex items-center gap-2"><span class="w-1 h-6 bg-accent-gold rounded-full"></span> المنتجات الرائجة</h3>
<button class="text-accent-gold text-sm font-semibold">عرض الكل</button>
</div>
<v-search></v-search>
<div class="flex items-center justify-between mt-4">
<h3 class="text-lg lg:text-xl font-bold text-primary flex items-center gap-2"><span class="w-1 h-6 bg-accent-gold rounded-full"></span> أحدث الوظائف</h3>
<button class="text-accent-gold text-sm font-semibold">تصفح الوظائف</button>
</div>
<div class="bg-white rounded-lg p-4 shadow-sm border border-primary/5">
<div class="flex items-start gap-4">
<div class="size-14 rounded-lg bg-background-light p-2 flex items-center justify-center border border-primary/5 overflow-hidden">
<img alt="Company Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdjFokXeyQusH9b-Pj7vscToq-aSAp6npj3AE6nvh-U9aGys0FobZsooDAE8jNhn3m9WgAPkrJ_mvB0tmd6je6xrLlEa9ZXJpHZn2AvvwgW9GbiGEaIIpvdT3Jf7QBIKQSE9nk3iCKY7vk3h-HDZttsupKY7h8LYmg8-PmxcwIhiu3fd63MZK_3PB1FKojyk12FUMiW_jtp5JyYwFM_HmTDDLbQYlfyGIUcK5PHt3imk1bxAAy2gxoZguzrYrnSIV4lREdKPiG-xk"/>
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
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-accent-gold">location_on</span> المعادي، القاهرة</div>
<div class="flex items-center gap-1 font-semibold text-primary"><span class="material-symbols-outlined text-sm text-accent-gold">payments</span> ٢٥ - ٣٥ ألف جنيه</div>
</div>
</div>
</div>
<div class="mt-4 flex gap-2">
<button class="flex-1 py-2.5 bg-primary text-white font-bold rounded-lg text-sm transition-transform active:scale-[0.98]">قدم الآن</button>
<button class="px-3 py-2.5 bg-background-light text-primary rounded-lg border border-primary/10 active:scale-95">
<span class="material-symbols-outlined text-xl align-middle">bookmark</span>
</button>
</div>
</div>
<div class="bg-white rounded-lg p-4 shadow-sm border border-primary/5">
<div class="flex items-start gap-4">
<div class="size-14 rounded-lg bg-background-light p-2 flex items-center justify-center border border-primary/5 overflow-hidden">
<img alt="Company Logo" class="w-full h-full object-contain" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnQmO4orxjhuaekZFRUCsve9tJ6YrXXG_OBBiUKNw8xCWViOtvBLXILGVngiRlNw2v9xLEcxeWo7spijE6bgTN0TAsqMR6FZJLhO1hXG9fbQe2GQHabHXNt_Du6WjHslhOX--Apd70v1X9p5KZJQ2VnBNT0C38iVtaLB3-vWkQeIqvKpwDveJs83CMCHtnP59UMotR_mlDmMB0EK59UVjTJunlD7kZby0oo4-aVzhaGbclA-t1HUXOkeS8A0KglVn61LTEvNSOrN4"/>
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
<div class="flex items-center gap-1"><span class="material-symbols-outlined text-sm text-accent-gold">location_on</span> القاهرة الجديدة</div>
<div class="flex items-center gap-1 font-semibold text-primary"><span class="material-symbols-outlined text-sm text-accent-gold">payments</span> ٣٠ - ٤٥ ألف جنيه</div>
</div>
</div>
</div>
<div class="mt-4 flex gap-2">
<button class="flex-1 py-2.5 bg-primary text-white font-bold rounded-lg text-sm transition-transform active:scale-[0.98]">قدم الآن</button>
<button class="px-3 py-2.5 bg-background-light text-primary rounded-lg border border-primary/10 active:scale-95">
<span class="material-symbols-outlined text-xl align-middle">bookmark</span>
</button>
</div>
</div>
</main>
<nav class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-md lg:max-w-full bg-white border-t border-primary/5 flex items-center justify-around lg:justify-center lg:gap-12 h-20 px-4 z-50">
<a class="flex flex-col items-center gap-1 text-gray-400" href="{{ route('shop.customer.session.index') }}">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-bold uppercase tracking-widest">حسابي</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="{{ route('jobs.index') }}">
<span class="material-symbols-outlined">work</span>
<span class="text-[10px] font-bold uppercase tracking-widest">وظائف</span>
</a>
<div class="relative -top-6">
<button class="size-14 bg-primary text-white rounded-full shadow-lg shadow-primary/40 flex items-center justify-center transition-transform active:scale-90 border-4 border-white">
<span class="material-symbols-outlined text-2xl">shopping_cart</span>
</button>
</div>
<a class="flex flex-col items-center gap-1 text-accent-gold" href="{{ route('shop.search.index') }}">
<span class="material-symbols-outlined fill-1">shopping_bag</span>
<span class="text-[10px] font-bold uppercase tracking-widest">تسوق</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="{{ route('shop.home.index') }}">
<span class="material-symbols-outlined">home</span>
<span class="text-[10px] font-bold uppercase tracking-widest">الرئيسية</span>
</a>
</nav>
</div>
</body>

@pushOnce('scripts')
<script type="text/x-template" id="v-search-template">
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
<template v-if="isLoading">
<x-shop::shimmer.products.cards.grid count="12" />
</template>
<template v-else-if="products.length">
<div v-for="product in products" :key="product.id" class="bg-white rounded-lg p-3 shadow-sm border border-primary/5 flex flex-col">
<div class="relative aspect-square rounded-md overflow-hidden bg-background-light mb-3">
<img :src="product.base_image.small_image_url" :alt="product.name" class="w-full h-full object-cover">
<button class="absolute top-2 right-2 size-8 bg-white/90 backdrop-blur shadow-sm rounded-full flex items-center justify-center text-primary active:scale-90">
<span class="material-symbols-outlined text-xl">favorite</span>
</button>
</div>
<h4 class="text-sm font-semibold line-clamp-1">@{{ product.name }}</h4>
<div class="flex items-center gap-1 mt-1">
<span class="material-symbols-outlined text-accent-gold text-xs fill-1">star</span>
<span class="text-[10px] text-gray-500">٤.٨ (١.٢ ألف تقييم)</span>
</div>
<div class="mt-auto flex items-center justify-between pt-2">
<span class="text-primary font-bold text-sm">@{{ product.min_price }} جنيه</span>
<button @click="addToCart(product)" class="size-8 bg-primary text-white rounded-lg flex items-center justify-center transition-transform active:scale-90">
<span class="material-symbols-outlined text-xl">add</span>
</button>
</div>
</div>
</template>
<template v-else>
<div class="col-span-2 text-center py-20">
<p class="text-lg text-gray-600">لا توجد نتائج</p>
</div>
</template>
</div>
</script>

<script type="module">
app.component('v-search', {
    template: '#v-search-template',
    data() {
        return {
            isLoading: true,
            products: []
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts() {
            let params = {};
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('query')) {
                params.query = urlParams.get('query');
            }
            this.$axios.get("{{ route('shop.api.products.index') }}", { params })
                .then(response => {
                    this.isLoading = false;
                    this.products = response.data.data;
                })
                .catch(error => {
                    this.isLoading = false;
                    console.log(error);
                });
        },
        addToCart(product) {
            this.$axios.post('{{ route("shop.api.checkout.cart.store") }}', {
                product_id: product.id,
                quantity: 1
            })
            .then(response => {
                this.$emitter.emit('add-flash', { type: 'success', message: 'تمت الإضافة إلى السلة' });
            })
            .catch(error => {
                this.$emitter.emit('add-flash', { type: 'error', message: error.response?.data?.message || 'حدث خطأ' });
            });
        }
    }
});
</script>
@endPushOnce
</x-shop::layouts>
