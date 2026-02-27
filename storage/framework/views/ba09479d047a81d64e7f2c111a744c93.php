<nav class="fixed bottom-0 left-0 right-0 w-full mx-auto bg-white/80 backdrop-blur-md border-t flex items-center justify-around py-2 z-50 lg:hidden">
<a class="flex flex-col items-center gap-1 <?php echo e(request()->is('/') ? 'text-primary' : 'text-gray-400'); ?>" href="/">
<span class="material-symbols-outlined text-2xl <?php echo e(request()->is('/') ? 'fill-current' : ''); ?>">home</span>
<span class="text-[10px] font-bold">الرئيسية</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="#">
<span class="material-symbols-outlined text-2xl">favorite</span>
<span class="text-[10px] font-bold">المفضلة</span>
</a>
<a class="relative -top-4" href="/checkout/cart">
<div class="size-14 bg-primary rounded-full shadow-lg shadow-primary/30 flex items-center justify-center border-4 border-white">
<span class="material-symbols-outlined text-white text-2xl">shopping_cart</span>
<span id="cart-badge" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold rounded-full size-5 items-center justify-center">0</span>
</div>
</a>
<a class="flex flex-col items-center gap-1 <?php echo e(request()->is('categories*') ? 'text-primary' : 'text-gray-400'); ?>" href="/categories">
<span class="material-symbols-outlined text-2xl <?php echo e(request()->is('categories*') ? 'fill-current' : ''); ?>">grid_view</span>
<span class="text-[10px] font-bold">الأقسام</span>
</a>
<a class="flex flex-col items-center gap-1 text-gray-400" href="#">
<span class="material-symbols-outlined text-2xl">person</span>
<span class="text-[10px] font-bold">حسابي</span>
</a>
</nav>

<script>
window.updateCartBadge = function() {
    fetch('/api/checkout/cart')
        .then(res => res.json())
        .then(data => {
            const badge = document.getElementById('cart-badge');
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
updateCartBadge();
</script>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/components/navbar.blade.php ENDPATH**/ ?>