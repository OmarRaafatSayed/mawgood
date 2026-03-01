<nav class="flex bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
<div class="max-w-[1920px] mx-auto w-full px-4 py-3 flex items-center justify-between gap-3">
<button onclick="toggleMenu()" class="lg:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors">
<span class="material-symbols-outlined text-2xl text-primary">menu</span>
</button>
<a href="/" class="text-xl lg:text-2xl font-bold text-primary whitespace-nowrap">موجود</a>
<div class="flex-1 max-w-3xl hidden md:block">
<div class="relative">
<input type="text" placeholder="ابحث عن منتجات، وظائف..." class="w-full px-4 py-2.5 pr-11 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary transition-colors text-sm" />
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl">search</span>
</div>
</div>
<div class="flex items-center gap-2 lg:gap-4">
<button onclick="toggleSearch()" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl text-primary">search</span>
</button>
<a href="/categories" class="hidden xl:flex items-center gap-2 text-gray-700 hover:text-primary transition-colors font-medium text-sm">
<span class="material-symbols-outlined text-xl">grid_view</span>
<span>الأقسام</span>
</a>
<a href="/jobs" class="hidden xl:flex items-center gap-2 text-gray-700 hover:text-primary transition-colors font-medium text-sm">
<span class="material-symbols-outlined text-xl">work</span>
<span>الوظائف</span>
</a>
<button onclick="toggleLanguage()" class="hidden xl:flex items-center gap-1.5 px-2.5 py-1.5 border-2 border-gray-200 rounded-lg hover:border-primary transition-colors text-sm font-medium">
<span class="material-symbols-outlined text-lg">language</span>
<span id="currentLang">AR</span>
</button>
<a href="/checkout/cart" class="relative p-1.5 hover:bg-gray-100 rounded-lg transition-colors">
<span class="material-symbols-outlined text-2xl text-primary">shopping_cart</span>
<span id="cart-badge-desktop" class="hidden absolute -top-0.5 -right-0.5 bg-red-500 text-white text-[10px] font-bold rounded-full size-4 items-center justify-center">0</span>
</a>
<a href="/customer/account" class="hidden lg:flex p-1.5 hover:bg-gray-100 rounded-lg transition-colors">
<span class="material-symbols-outlined text-2xl text-gray-700">person</span>
</a>
</div>
</div>
</nav>

<!-- Mobile Search Bar -->
<div id="mobileSearch" class="hidden md:hidden bg-white border-b px-4 py-3">
<div class="relative">
<input type="text" placeholder="ابحث..." class="w-full px-4 py-2.5 pr-11 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-primary transition-colors text-sm" />
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xl">search</span>
</div>
</div>

<!-- Hamburger Menu -->
<div id="hamburgerMenu" class="hidden fixed inset-0 bg-black/50 z-50" onclick="toggleMenu()">
<div onclick="event.stopPropagation()" class="absolute right-0 top-0 bottom-0 w-80 bg-white shadow-2xl overflow-y-auto">
<div class="sticky top-0 bg-gradient-to-r from-primary to-orange-600 text-white p-4 flex items-center justify-between">
<h2 class="text-xl font-bold">القائمة</h2>
<button onclick="toggleMenu()" class="size-10 rounded-full hover:bg-white/20 flex items-center justify-center">
<span class="material-symbols-outlined">close</span>
</button>
</div>
<div class="p-4 space-y-2">
<a href="/customer/login" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">login</span>
<span class="font-medium">تسجيل الدخول</span>
</a>
<a href="/customer/register" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">person_add</span>
<span class="font-medium">الاشتراك</span>
</a>
<div class="border-t my-2"></div>
<a href="/categories" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">grid_view</span>
<span class="font-medium">الأقسام</span>
</a>
<a href="/jobs" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">work</span>
<span class="font-medium">فرص العمل</span>
</a>
<a href="/blog" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">article</span>
<span class="font-medium">المقالات</span>
</a>
<div class="border-t my-2"></div>
<a href="/about-us" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">info</span>
<span class="font-medium">من نحن</span>
</a>
<a href="/privacy-policy" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">policy</span>
<span class="font-medium">سياسة الخصوصية</span>
</a>
<a href="/terms-conditions" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">description</span>
<span class="font-medium">شروط الاستخدام</span>
</a>
<a href="/contact-us" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">mail</span>
<span class="font-medium">اتصل بنا</span>
</a>
<div class="border-t my-2"></div>
<button onclick="toggleLanguage()" class="w-full flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
<span class="material-symbols-outlined text-primary">language</span>
<span class="font-medium">تغيير اللغة</span>
<span class="mr-auto text-sm text-gray-500" id="menuLang">AR</span>
</button>
</div>
</div>
</div>

<script>
function toggleMenu() {
    document.getElementById('hamburgerMenu').classList.toggle('hidden');
}

function toggleSearch() {
    document.getElementById('mobileSearch').classList.toggle('hidden');
}

function toggleLanguage() {
    const currentLang = document.documentElement.lang;
    const newLang = currentLang === 'ar' ? 'en' : 'ar';
    window.location.href = `/${newLang}`;
}

window.updateDesktopCartBadge = function() {
    fetch('/api/checkout/cart')
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('cart-badge-desktop');
            if (!badge) return;
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
};
updateDesktopCartBadge();
</script>
