# 🔧 خطوات إصلاح Checkout Service

## ❌ المشاكل الموجودة

### 1. Order Splitting غير مفعّل
- `OrderSplittingService` موجود لكن لا يتم استدعاؤه
- لا يوجد Listener مربوط بـ `checkout.order.save.after`

### 2. Payment Gateway Integration ناقصة
- لا يوجد webhook handling
- لا يوجد payment verification
- لا يوجد transaction logging

### 3. Commission/Wallet System غير مكتمل
- لا يتم إنشاء Wallet Transactions
- لا يتم تسجيل العمولات
- حقول ناقصة في VendorOrder

---

## ✅ الحلول المطلوبة

### الخطوة 1: تفعيل Order Splitting

في `packages/Mawgood/Vendor/src/Providers/VendorServiceProvider.php`:

```php
use Illuminate\Support\Facades\Event;
use Mawgood\Vendor\Listeners\ProcessOrderSplitting;

public function boot()
{
    Event::listen('checkout.order.save.after', ProcessOrderSplitting::class);
}
```

### الخطوة 2: إضافة حقول ناقصة لـ VendorOrder

Migration جديدة:

```php
Schema::table('vendor_orders', function (Blueprint $table) {
    $table->decimal('tax_amount', 12, 4)->default(0)->after('sub_total');
    $table->decimal('shipping_amount', 12, 4)->default(0)->after('tax_amount');
    $table->decimal('discount_amount', 12, 4)->default(0)->after('shipping_amount');
    $table->decimal('grand_total', 12, 4)->default(0)->after('discount_amount');
});
```

### الخطوة 3: تحديث OrderSplittingService

في `createVendorOrder()`:

```php
$grandTotal = $subTotal + $taxAmount + $shippingAmount - $discountAmount;
$commissionAmount = $grandTotal * ($vendor->commission_rate / 100);
$vendorAmount = $grandTotal - $commissionAmount;

return VendorOrder::create([
    'vendor_id' => $vendor->id,
    'order_id' => $order->id,
    'status' => 'pending',
    'sub_total' => $subTotal,
    'tax_amount' => $taxAmount,
    'shipping_amount' => $shippingAmount,
    'discount_amount' => $discountAmount,
    'grand_total' => $grandTotal,
    'commission_amount' => $commissionAmount,
    'vendor_amount' => $vendorAmount,
]);
```

### الخطوة 4: إضافة Payment Transaction Table

```bash
php artisan make:migration create_payment_transactions_table
```

```php
Schema::create('payment_transactions', function (Blueprint $table) {
    $table->id();
    $table->unsignedInteger('order_id');
    $table->string('payment_method');
    $table->string('transaction_id')->nullable();
    $table->decimal('amount', 12, 4);
    $table->string('currency', 3);
    $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'refunded']);
    $table->json('gateway_response')->nullable();
    $table->json('metadata')->nullable();
    $table->timestamps();
    
    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
});
```

### الخطوة 5: تسجيل Payment Gateways

في `config/payment_methods.php`:

```php
'moyasar' => [
    'class' => 'Webkul\Payment\Payment\Moyasar',
    'active' => true,
    'title' => 'Moyasar (بطاقات محلية)',
    'description' => 'الدفع بالبطاقات السعودية',
    'sort' => 1,
],

'stripe' => [
    'class' => 'Webkul\Payment\Payment\StripePayment',
    'active' => true,
    'title' => 'Stripe (بطاقات دولية)',
    'description' => 'الدفع بالبطاقات الدولية',
    'sort' => 2,
],
```

### الخطوة 6: إنشاء Payment Controllers

```php
// app/Http/Controllers/Shop/PaymentController.php

class PaymentController extends Controller
{
    public function moyasarRedirect()
    {
        $cart = Cart::getCart();
        $order = session('pending_order');
        
        $moyasar = app(Moyasar::class);
        $payment = $moyasar->initiatePayment($order);
        
        return redirect($payment['source']['transaction_url']);
    }
    
    public function moyasarCallback(Request $request)
    {
        $moyasar = app(Moyasar::class);
        $payment = $moyasar->verifyPayment($request->id);
        
        if ($payment['status'] === 'paid') {
            $order = Order::find($payment['metadata']['order_id']);
            $order->update(['payment_status' => 'paid']);
            
            PaymentTransaction::create([
                'order_id' => $order->id,
                'payment_method' => 'moyasar',
                'transaction_id' => $payment['id'],
                'amount' => $payment['amount'] / 100,
                'currency' => $payment['currency'],
                'status' => 'completed',
                'gateway_response' => $payment,
            ]);
            
            return redirect()->route('shop.checkout.onepage.success');
        }
        
        return redirect()->route('shop.checkout.cart.index')
            ->with('error', 'فشلت عملية الدفع');
    }
}
```

### الخطوة 7: إضافة Webhook Handler

```php
// app/Http/Controllers/Shop/WebhookController.php

class WebhookController extends Controller
{
    public function moyasar(Request $request)
    {
        $moyasar = app(Moyasar::class);
        $moyasar->handleWebhook($request->all());
        
        return response()->json(['status' => 'success']);
    }
    
    public function stripe(Request $request)
    {
        $stripe = app(StripePayment::class);
        $stripe->handleWebhook($request->all());
        
        return response()->json(['status' => 'success']);
    }
}
```

---

## 🎯 الخلاصة

### Missing Steps:
1. ✅ Order Splitting Listener
2. ✅ Payment Transaction Logging
3. ✅ Wallet Transaction Creation
4. ✅ Webhook Handling

### Split/Commission ناقص:
1. ✅ حقول إضافية في VendorOrder (tax, shipping, discount, grand_total)
2. ✅ Wallet Transaction عند الدفع
3. ✅ Commission Recording

### التجهيز للبوابات:
1. ✅ PaymentGateway Base Class
2. ✅ Moyasar (محلي)
3. ✅ Stripe (دولي)
4. ✅ Transaction Model
5. ✅ Webhook Controllers
6. ✅ Payment Verification

---

## 📝 الأولويات

### عاجل (الآن):
1. تفعيل Order Splitting Listener
2. إضافة حقول VendorOrder الناقصة
3. إنشاء Payment Transaction Table

### مهم (قريباً):
1. تطبيق Moyasar Gateway
2. إضافة Webhook Handlers
3. اختبار Payment Flow

### لاحقاً:
1. إضافة Stripe
2. إضافة بوابات أخرى
3. Dashboard للـ Transactions
