<?php

if (! function_exists('bagisto_asset_safe')) {
    /**
     * Safely return bagisto asset URL; if Vite manifest lookup fails, fall back to a public/cache path.
     */
    function bagisto_asset_safe(string $path) {
        try {
            return bagisto_asset($path);
        } catch (\Throwable $e) {
            // Attempt to fall back to a cached folder inside public so page doesn't crash
            return url('cache/' . trim($path, '/'));
        }
    }
}
