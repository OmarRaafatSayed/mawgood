<?php
/**
 * Cache Clearing Script for Mawgood Bagisto
 * This script clears all cache files to fix the array_merge error
 */

$filesToDelete = [
    __DIR__ . '/bootstrap/cache/config.php',
    __DIR__ . '/bootstrap/cache/services.php',
    __DIR__ . '/bootstrap/cache/packages.php',
    __DIR__ . '/bootstrap/cache/routes-v7.php',
];

echo "Starting cache cleanup...\n";

$deleted = 0;
$notFound = 0;

foreach ($filesToDelete as $file) {
    if (file_exists($file)) {
        if (unlink($file)) {
            echo "✓ Deleted: " . basename($file) . "\n";
            $deleted++;
        } else {
            echo "✗ Failed to delete: " . basename($file) . "\n";
        }
    } else {
        echo "○ Not found: " . basename($file) . "\n";
        $notFound++;
    }
}

echo "\nSummary:\n";
echo "- Deleted: $deleted file(s)\n";
echo "- Not found: $notFound file(s)\n";
echo "\nCache cleanup completed!\n";
echo "\nNext steps:\n";
echo "1. Run: php artisan optimize:clear\n";
echo "2. Run: composer dump-autoload\n";
echo "3. Run: php artisan config:clear\n";
echo "4. Run: php artisan cache:clear\n";
