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
<style>
body { font-family: 'Tajawal', sans-serif; }
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

<main class="max-w-4xl mx-auto px-4 lg:px-8 py-6 pb-24 lg:pb-8">
<h1 class="text-2xl font-bold text-gray-800 mb-6">إتمام الطلب</h1>

<div id="loading" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
<div class="bg-white p-6 rounded-[15px] text-center">
<div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto mb-3"></div>
<p class="text-gray-800 font-medium">جاري التحميل...</p>
</div>
</div>

<div class="space-y-4">
<div class="bg-white rounded-[15px] p-6 shadow-sm">
<div class="flex items-center justify-between mb-4">
<h2 class="text-lg font-bold text-gray-800">1. عنوان التوصيل</h2>
<button onclick="toggleSection('address')" id="address-toggle" class="text-primary text-sm font-medium">إضافة</button>
</div>
<div id="address-display" class="hidden text-sm text-gray-600">
<p class="font-medium text-gray-800" id="saved-name"></p>
<p id="saved-address"></p>
<p id="saved-phone"></p>
</div>
<div id="address-form" class="space-y-3">
<input type="text" id="name" placeholder="الاسم الكامل" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<input type="email" id="email" placeholder="البريد الإلكتروني" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<input type="text" id="phone" placeholder="رقم الهاتف" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<input type="text" id="address" placeholder="العنوان بالتفصيل" class="w-full border rounded-lg px-3 py-2 text-sm"/>
<select id="city" class="w-full border rounded-lg px-3 py-2 text-sm">
<option value="">اختر المحافظة</option>
<option>القاهرة</option>
<option>الجيزة</option>
<option>الإسكندرية</option>
</select>
<button onclick="saveAddress()" class="w-full bg-primary text-white py-2 rounded-lg font-medium">حفظ العنوان</button>
</div>
</div>

<div class="bg-white rounded-[15px] p-6 shadow-sm">
<h2 class="text-lg font-bold text-gray-800 mb-4">2. طريقة الشحن</h2>
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

<div class="bg-white rounded-[15px] p-6 shadow-sm">
<h2 class="text-lg font-bold text-gray-800 mb-4">3. طريقة الدفع</h2>
<div class="space-y-2">
<label class="flex items-center gap-3 p-3 border-2 border-primary bg-primary/5 rounded-lg cursor-pointer">
<input type="radio" name="payment" value="cod" checked class="w-4 h-4"/>
<div>
<p class="font-medium text-gray-800">الدفع عند الاستلام</p>
<p class="text-xs text-gray-600">ادفع نقداً عند استلام الطلب</p>
</div>
</label>
</div>
</div>

<div class="bg-white rounded-[15px] p-6 shadow-sm">
<h2 class="text-lg font-bold text-gray-800 mb-4">المنتجات</h2>
<div id="cart-items" class="space-y-3"></div>
</div>

<div class="bg-white rounded-[15px] p-6 shadow-sm">
<h2 class="text-lg font-bold text-gray-800 mb-4">ملخص الطلب</h2>
<div class="space-y-2 text-sm">
<div class="flex justify-between">
<span class="text-gray-600">المجموع الفرعي</span>
<span class="font-medium" id="subtotal">0 جنيه</span>
</div>
<div class="flex justify-between">
<span class="text-gray-600">الشحن</span>
<span class="font-medium text-green-600" id="shipping-cost">مجاناً</span>
</div>
<div class="border-t pt-2 flex justify-between text-lg">
<span class="font-bold">الإجمالي</span>
<span class="font-bold text-primary" id="total">0 جنيه</span>
</div>
</div>
<button onclick="placeOrder()" class="w-full bg-primary text-white font-bold py-4 rounded-lg mt-4">تأكيد الطلب</button>
</div>
</div>
</main>

@include('components.footer')

@include('components.navbar')

<script>
let cartData = [];
let shippingCost = 0;
let savedAddress = null;

async function loadCart() {
    try {
        const response = await fetch('/api/checkout/cart');
        const data = await response.json();
        cartData = data.data?.items || [];
        renderCart();
        calculateTotal();
    } catch (error) {
        console.error('Error:', error);
    }
}

function renderCart() {
    const container = document.getElementById('cart-items');
    if (!cartData.length) {
        container.innerHTML = '<p class="text-gray-500 text-center">السلة فارغة</p>';
        return;
    }
    
    container.innerHTML = cartData.map(item => {
        let imageUrl = '/images/placeholder.png';
        if (item.product?.base_image?.small_image_url) {
            imageUrl = item.product.base_image.small_image_url;
        } else if (item.base_image?.small_image_url) {
            imageUrl = item.base_image.small_image_url;
        }
        
        return `
        <div class="flex gap-3">
            <img src="${imageUrl}" class="w-16 h-16 object-cover rounded-lg" onerror="this.src='/images/placeholder.png'"/>
            <div class="flex-1">
                <p class="font-medium text-sm">${item.name}</p>
                <p class="text-xs text-gray-600">الكمية: ${item.quantity}</p>
                <p class="font-bold text-primary text-sm">${item.price} جنيه</p>
            </div>
        </div>
        `;
    }).join('');
}

function calculateTotal() {
    const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const total = subtotal + shippingCost;
    
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
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();
    const city = document.getElementById('city').value;
    
    if (!name || !email || !phone || !address || !city) {
        alert('يرجى ملء جميع الحقول');
        return;
    }
    
    const nameParts = name.split(' ');
    savedAddress = { 
        first_name: nameParts[0], 
        last_name: nameParts.length > 1 ? nameParts.slice(1).join(' ') : nameParts[0], 
        address1: address, 
        city: city, 
        phone: phone,
        email: email
    };
    
    document.getElementById('saved-name').textContent = name;
    document.getElementById('saved-address').textContent = address + '، ' + city;
    document.getElementById('saved-phone').textContent = 'رقم الهاتف: ' + phone;
    document.getElementById('address-display').classList.remove('hidden');
    document.getElementById('address-form').classList.add('hidden');
    document.getElementById('address-toggle').textContent = 'تغيير';
}

document.querySelectorAll('input[name="shipping"]').forEach(radio => {
    radio.addEventListener('change', (e) => {
        shippingCost = e.target.value === 'express' ? 50 : 0;
        document.getElementById('shipping-cost').textContent = shippingCost === 0 ? 'مجاناً' : shippingCost + ' جنيه';
        calculateTotal();
    });
});

async function placeOrder() {
    if (!savedAddress) {
        alert('يرجى إضافة عنوان التوصيل أولاً');
        return;
    }
    
    document.getElementById('loading').classList.remove('hidden');
    
    setTimeout(() => {
        window.location.href = '/checkout/onepage/success';
    }, 3000);
    
    fetch('/api/checkout/onepage/addresses', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify({
            billing: {
                address: [savedAddress.address1],
                city: savedAddress.city,
                state: savedAddress.city,
                country: 'EG',
                postcode: '12345',
                first_name: savedAddress.first_name,
                last_name: savedAddress.last_name,
                phone: savedAddress.phone,
                email: savedAddress.email,
                use_for_shipping: true
            }
        })
    }).then(() => {
        return fetch('/api/checkout/onepage/shipping-methods', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ shipping_method: 'free_free' })
        });
    }).then(() => {
        return fetch('/api/checkout/onepage/payment-methods', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ payment: { method: 'cashondelivery' } })
        });
    }).then(() => {
        return fetch('/api/checkout/onepage/orders', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        });
    }).catch(err => console.error('Error:', err));
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
            }
        })
        .catch(() => {});
}

loadCart();
updateTopBadge();
</script>
</body>
</html>
