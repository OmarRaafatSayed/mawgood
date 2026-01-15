<?php
if (file_exists(__DIR__ . '/bootstrap/cache/config.php')) {
    unlink(__DIR__ . '/bootstrap/cache/config.php');
    echo "Deleted bootstrap/cache/config.php";
} else {
    echo "bootstrap/cache/config.php not found.";
}
