// Service Worker for image caching and performance optimization
const CACHE_NAME = 'mawgood-images-v1';
const IMAGE_CACHE_NAME = 'mawgood-images';

// Cache critical resources
const CRITICAL_RESOURCES = [
    '/themes/shop/default/build/assets/app.css',
    '/themes/shop/default/build/assets/app.js',
    '/fonts/Hind-Regular.ttf',
    '/fonts/Hind-Bold.ttf'
];

// Install event - cache critical resources
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => cache.addAll(CRITICAL_RESOURCES))
            .then(() => self.skipWaiting())
    );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME && cacheName !== IMAGE_CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch event - handle requests
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);
    
    // Handle image requests
    if (request.destination === 'image' || 
        url.pathname.match(/\.(webp|jpg|jpeg|png|gif|svg)$/i)) {
        
        event.respondWith(
            caches.open(IMAGE_CACHE_NAME).then(cache => {
                return cache.match(request).then(response => {
                    if (response) {
                        return response;
                    }
                    
                    return fetch(request).then(fetchResponse => {
                        // Only cache successful responses
                        if (fetchResponse.status === 200) {
                            cache.put(request, fetchResponse.clone());
                        }
                        return fetchResponse;
                    }).catch(() => {
                        // Return fallback image if network fails
                        return caches.match('/images/small-product-placeholder.webp');
                    });
                });
            })
        );
        return;
    }
    
    // Handle other requests with cache-first strategy for static assets
    if (url.pathname.match(/\.(css|js|woff2?|ttf)$/i)) {
        event.respondWith(
            caches.match(request).then(response => {
                return response || fetch(request);
            })
        );
        return;
    }
    
    // Network-first for HTML and API requests
    event.respondWith(fetch(request));
});

// Background sync for failed image loads
self.addEventListener('sync', event => {
    if (event.tag === 'retry-failed-images') {
        event.waitUntil(retryFailedImages());
    }
});

async function retryFailedImages() {
    // Implementation for retrying failed image loads
    console.log('Retrying failed image loads...');
}