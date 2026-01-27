import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/vendor.css',
                'resources/js/vendor.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['bootstrap', 'chart.js'],
                    utils: ['axios']
                }
            }
        },
        cssMinify: true,
        sourcemap: false
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});