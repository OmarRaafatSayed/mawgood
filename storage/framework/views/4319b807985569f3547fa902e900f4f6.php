<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>إتمام الطلب - ماوجود</title>
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
</head>
<body class="bg-gray-50" style="font-family: 'Tajawal', sans-serif;">
<div class="relative mx-auto max-w-[393px] min-h-screen bg-white">

<header class="sticky top-0 z-50 bg-white border-b px-4 py-3">
<h1 class="text-xl font-bold text-gray-800">إتمام الطلب</h1>
</header>

<main class="pb-32">
<!-- Address Section -->
<div class="border-b p-4">
<div class="flex items-center justify-between mb-3">
<h2 class="text-lg font-bold text-gray-800">1. عنوان التوصيل</h2>
<button onclick="toggleSection('address')" class="text-primary text-sm font-medium">تغيير</button>
</div>
<div id="address-display" class="text-sm text-gray-600">
<p class="font-medium text-gray-800">محمد أحمد</p>
<p>شارع الجامعة، المعادي، القاهرة</p>
<p>رقم الهاتف: 01012345678</p>
</div>
<div id="address-form" class="hidden space-y-3">
<input type="text" placeholder="الاسم الكامل" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<input type="text" placeholder="رقم الهاتف" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<input type="text" placeholder="العنوان بالتفصيل" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<select class="w-full border rounded-lg px-3 py-2 text-sm">
<option>القاهرة</option>
<option>الجيزة</option>
<option>الإسكندرية</option>
</select>
<button onclick="saveAddress()" class="w-full bg-primary text-white py-2 rounded-lg font-medium">حفظ العنوان</button>
</div>
</div>

<!-- Shipping Section -->
<div class="border-b p-4">
<h2 class="text-lg font-bold text-gray-800 mb-3">2. طريقة الشحن</h2>
<div class="space-y-2">
<label class="flex items-center justify-between p-3 border-2 border-primary bg-primary/5 rounded-lg cursor-pointer">
<div class="flex items-center gap-3">
<input type="radio" name="shipping" value="standard" checked class="w-4 h-4"/>
<div>
<p class="font-medium text-gray-800">شحن عادي</p>
<p class="text-xs text-gray-600">التوصيل خلال 3-5 أيام</p>
</div>
</div>
<span class="font-bold text-primary">مجاناً</span>
</label>
<label class="flex items-center justify-between p-3 border rounded-lg cursor-pointer">
<div class="flex items-center gap-3">
<input type="radio" name="shipping" value="express" class="w-4 h-4"/>
<div>
<p class="font-medium text-gray-800">شحن سريع</p>
<p class="text-xs text-gray-600">التوصيل خلال 1-2 يوم</p>
</div>
</div>
<span class="font-bold text-gray-800">50 جنيه</span>
</label>
</div>
</div>

<!-- Payment Section -->
<div class="border-b p-4">
<h2 class="text-lg font-bold text-gray-800 mb-3">3. طريقة الدفع</h2>
<div class="space-y-2">
<label class="flex items-center gap-3 p-3 border-2 border-primary bg-primary/5 rounded-lg cursor-pointer">
<input type="radio" name="payment" value="cod" checked class="w-4 h-4"/>
<div>
<p class="font-medium text-gray-800">الدفع عند الاستلام</p>
<p class="text-xs text-gray-600">ادفع نقداً عند استلام الطلب</p>
</div>
</label>
<label class="flex items-center gap-3 p-3 border rounded-lg cursor-pointer">
<input type="radio" name="payment" value="card" class="w-4 h-4"/>
<div>
<p class="font-medium text-gray-800">بطاقة ائتمان</p>
<p class="text-xs text-gray-600">Visa, Mastercard</p>
</div>
</label>
</div>
</div>

<!-- Coupon Section -->
<div class="border-b p-4">
<h2 class="text-lg font-bold text-gray-800 mb-3">كود الخصم</h2>
<div class="flex gap-2">
<input type="text" id="coupon" placeholder="أدخل كود الخصم" class="flex-1 border rounded-lg px-3 py-2 text-sm"/>
<button onclick="applyCoupon()" class="bg-gray-800 text-white px-4 py-2 rounded-lg font-medium text-sm">تطبيق</button>
</div>
<div id="coupon-message" class="hidden mt-2 text-sm"></div>
</div>

<!-- Order Items -->
<div class="border-b p-4">
<h2 class="text-lg font-bold text-gray-800 mb-3">المنتجات</h2>
<div id="cart-items" class="space-y-3"></div>
</div>

<!-- Order Summary -->
<div class="p-4">
<h2 class="text-lg font-bold text-gray-800 mb-3">ملخص الطلب</h2>
<div class="space-y-2 text-sm">
<div class="flex justify-between">
<span class="text-gray-600">المجموع الفرعي</span>
<span class="font-medium" id="subtotal">0 جنيه</span>
</div>
<div class="flex justify-between">
<span class="text-gray-600">الشحن</span>
<span class="font-medium text-green-600" id="shipping-cost">مجاناً</span>
</div>
<div class="flex justify-between" id="discount-row" style="display:none">
<span class="text-gray-600">الخصم</span>
<span class="font-medium text-green-600" id="discount">0 جنيه</span>
</div>
<div class="border-t pt-2 flex justify-between text-lg">
<span class="font-bold">الإجمالي</span>
<span class="font-bold text-primary" id="total">0 جنيه</span>
</div>
</div>
</div>
</main>

<!-- Place Order Button -->
<div class="fixed bottom-0 left-0 right-0 w-full max-w-[393px] mx-auto bg-white border-t p-4 z-50">
<button onclick="placeOrder()" class="w-full bg-primary text-white font-bold py-4 rounded-xl">
تأكيد الطلب
</button>
</div>

</div>

<script>
let cartData = [];
let shippingCost = 0;
let discountAmount = 0;

async function loadCart() {
    try {
        const response = await fetch('/api/checkout/cart');
        const data = await response.json();
        cartData = data.data?.items || [];
        renderCart();
        calculateTotal();
    } catch (error) {
        console.error('Error loading cart:', error);
    }
}

function renderCart() {
    const container = document.getElementById('cart-items');
    if (!cartData.length) {
        container.innerHTML = '<p class="text-gray-500 text-center">السلة فارغة</p>';
        return;
    }
    
    container.innerHTML = cartData.map(item => `
        <div class="flex gap-3">
            <img src="${item.product?.images?.[0]?.url || '/images/placeholder.png'}" class="w-16 h-16 object-cover rounded-lg"/>
            <div class="flex-1">
                <p class="font-medium text-sm">${item.name}</p>
                <p class="text-xs text-gray-600">الكمية: ${item.quantity}</p>
                <p class="font-bold text-primary text-sm">${item.price} جنيه</p>
            </div>
        </div>
    `).join('');
}

function calculateTotal() {
    const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const total = subtotal + shippingCost - discountAmount;
    
    document.getElementById('subtotal').textContent = subtotal.toFixed(0) + ' جنيه';
    document.getElementById('total').textContent = total.toFixed(0) + ' جنيه';
}

function toggleSection(section) {
    const display = document.getElementById(section + '-display');
    const form = document.getElementById(section + '-form');
    display.classList.toggle('hidden');
    form.classList.toggle('hidden');
}

function saveAddress() {
    toggleSection('address');
}

document.querySelectorAll('input[name="shipping"]').forEach(radio => {
    radio.addEventListener('change', (e) => {
        shippingCost = e.target.value === 'express' ? 50 : 0;
        document.getElementById('shipping-cost').textContent = shippingCost === 0 ? 'مجاناً' : shippingCost + ' جنيه';
        calculateTotal();
    });
});

async function applyCoupon() {
    const code = document.getElementById('coupon').value;
    const msg = document.getElementById('coupon-message');
    
    try {
        const response = await fetch('/api/checkout/cart/coupon', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({ code })
        });
        
        if (response.ok) {
            discountAmount = 100;
            document.getElementById('discount-row').style.display = 'flex';
            document.getElementById('discount').textContent = '-' + discountAmount + ' جنيه';
            msg.textContent = 'تم تطبيق الكود بنجاح!';
            msg.className = 'mt-2 text-sm text-green-600';
            msg.classList.remove('hidden');
            calculateTotal();
        } else {
            msg.textContent = 'كود الخصم غير صحيح';
            msg.className = 'mt-2 text-sm text-red-600';
            msg.classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error:', error);
    }
}

async function placeOrder() {
    try {
        const response = await fetch('/api/checkout/onepage/orders', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
            },
            body: JSON.stringify({
                shipping_method: document.querySelector('input[name="shipping"]:checked').value,
                payment_method: document.querySelector('input[name="payment"]:checked').value
            })
        });
        
        if (response.ok) {
            window.location.href = '/checkout/onepage/success';
        } else {
            alert('حدث خطأ في تأكيد الطلب');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('حدث خطأ في تأكيد الطلب');
    }
}

loadCart();
</script>
</body>
</html>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views/checkout/cart.blade.php ENDPATH**/ ?>