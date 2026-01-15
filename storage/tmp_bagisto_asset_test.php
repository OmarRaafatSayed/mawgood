<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo bagisto_asset('images/product-placeholders/front.svg');
} catch (Throwable $e) {
    echo 'ERR: ' . get_class($e) . ': ' . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
