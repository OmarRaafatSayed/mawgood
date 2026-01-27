# 🔗 ربط VendorOrder مع Wallet System

## 1️⃣ VendorOrder → Vendor Wallet

### الآلية:
```
Order Paid → VendorOrder → unavailable_balance ↑
Order Delivered → unavailable_balance ↓ + available_balance ↑
Order Cancelled → unavailable_balance ↓
```

### الاستخدام:
```php
use Mawgood\Vendor\Services\VendorWalletUpdater;

$updater = app(VendorWalletUpdater::class);

// عند الدفع
$updater->onOrderPaid($vendorOrder);

// عند التسليم
$updater->onOrderDelivered($vendorOrder);

// عند الإلغاء
$updater->onOrderCancelled($vendorOrder);
```

---

## 2️⃣ Customer Wallet Service

### المميزات:
- ✅ Charge / Refund
- ✅ Multi-Currency (SAR, USD, EUR)
- ✅ Transaction Logging
- ✅ جاهز للربط مع External API

### الاستخدام:
```php
use Mawgood\Vendor\Services\Customer\CustomerWalletService;

$wallet = app(CustomerWalletService::class);

// شحن المحفظة
$wallet->charge($customer, 100, 'USD', ['source' => 'refund']);

// استرداد
$wallet->refund($customer, 50, 'SAR', ['order_id' => 123]);
```

---

## 3️⃣ Payment Gateway Enhancement

### Transaction Logging:
```php
use Webkul\Payment\Services\PaymentTransactionLogger;

$logger = app(PaymentTransactionLogger::class);

$logger->log(
    orderId: $order->id,
    method: 'moyasar',
    transactionId: 'pay_123',
    amount: 100.50,
    currency: 'SAR',
    status: 'pending',
    response: $gatewayResponse
);
```

### Webhook Handling:
```php
use Webkul\Payment\Services\WebhookHandler;

$handler = app(WebhookHandler::class);
$handler->handle('moyasar', $webhookPayload);
```

### Payment Verification:
```php
use Webkul\Payment\Services\PaymentVerifier;

$verifier = app(PaymentVerifier::class);
$response = $verifier->verify('moyasar', 'pay_123');

if ($verifier->isValid($response)) {
    // Payment confirmed
}
```

---

## 4️⃣ Integration Flow

```
1. Customer pays → Moyasar Gateway
2. Payment success → Transaction logged
3. Webhook received → WebhookHandler
4. Order status updated → payment_status = 'paid'
5. VendorOrders updated → unavailable_balance ↑
6. Order delivered → available_balance ↑
```

---

## 5️⃣ Multi-Currency Support

### Exchange Rates:
```php
// في CustomerWalletService
private function convertToBase(float $amount, string $currency): float
{
    $rates = cache()->remember('exchange_rates', 3600, fn() => [
        'USD' => 3.75,
        'EUR' => 4.10,
        'SAR' => 1
    ]);
    
    return $amount * $rates[$currency];
}
```

### External API Integration (لاحقاً):
```php
// استبدال cache بـ API call
$rates = Http::get('https://api.exchangerate.com/latest')->json();
```

---

## 6️⃣ Database Changes

### Migration:
```bash
php artisan migrate
```

### الجداول الجديدة:
- `customer_wallet_transactions` - تسجيل معاملات المحفظة
- `customers.wallet_balance` - رصيد العميل

---

## 7️⃣ الملفات المُنشأة

### Vendor Wallet:
- ✅ `VendorWalletUpdater.php`

### Customer Wallet:
- ✅ `CustomerWalletService.php`
- ✅ Migration للمحفظة

### Payment Gateway:
- ✅ `PaymentTransactionLogger.php`
- ✅ `WebhookHandler.php`
- ✅ `PaymentVerifier.php`
- ✅ تحديث `Moyasar.php`

---

## 8️⃣ Next Steps

1. تشغيل Migration
2. ربط VendorWalletUpdater مع Order Events
3. إضافة Routes للـ Webhooks
4. اختبار Payment Flow
5. إضافة External Exchange Rate API
