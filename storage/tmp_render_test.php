<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    echo 'RENDER_TEST: OK - Rendering view...\n';
    echo view('vendor.admin.dashboard.index', ['vendor' => \App\Models\Vendor::first()])->render();
} catch (Throwable $e) {
    echo 'ERROR: ' . get_class($e) . ' - ' . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
