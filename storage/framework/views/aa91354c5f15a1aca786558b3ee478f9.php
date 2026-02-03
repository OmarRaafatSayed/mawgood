<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتج - <?php echo e($slug); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .product-card { border: 1px solid #ddd; padding: 20px; border-radius: 5px; margin: 20px 0; }
        .btn { background: #007cba; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        .btn:hover { background: #005a87; }
        .price { font-size: 24px; color: #e74c3c; font-weight: bold; }
        .error { background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 4px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>المنتج: <?php echo e($slug); ?></h1>
        
        <?php if(isset($error)): ?>
        <div class="error">
            <strong>تحذير:</strong> <?php echo e($error); ?>

        </div>
        <?php endif; ?>
        
        <div class="product-card">
            <h2>منتج متاح</h2>
            <p><strong>رمز المنتج:</strong> <?php echo e($slug); ?></p>
            <p><strong>الحالة:</strong> متاح</p>
            <div class="price">السعر: 25.00 ريال</div>
            <br>
            <button class="btn" onclick="addToCart()">إضافة إلى السلة</button>
            <button class="btn" onclick="buyNow()" style="background: #27ae60;">اشتري الآن</button>
        </div>
        
        <div style="margin-top: 30px;">
            <a href="/" style="color: #007cba;">← العودة إلى الصفحة الرئيسية</a>
        </div>
    </div>

    <script>
        function addToCart() {
            fetch('/api/checkout/cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    product_id: 1,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert('تم إضافة المنتج إلى السلة بنجاح!');
                } else {
                    alert('حدث خطأ أثناء إضافة المنتج');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('تم إضافة المنتج إلى السلة');
            });
        }

        function buyNow() {
            addToCart();
            setTimeout(() => {
                window.location.href = '/checkout/cart';
            }, 1000);
        }
    </script>
</body>
</html><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\views\errors\product-fallback.blade.php ENDPATH**/ ?>