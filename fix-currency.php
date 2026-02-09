<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Set EGP as default currency in session
session()->put('currency', 'EGP');
session()->save();

echo "✓ Currency set to EGP\n";

// Clear cache
Artisan::call('cache:clear');
echo "✓ Cache cleared\n";

Artisan::call('config:clear');
echo "✓ Config cleared\n";

echo "\nDone! EGP is now the default currency.\n";
