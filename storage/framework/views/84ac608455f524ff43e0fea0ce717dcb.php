<?php if (! $__env->hasRenderedOnce('44b49af7-5c61-4cc0-b9b6-dcb5253811bc')): $__env->markAsRenderedOnce('44b49af7-5c61-4cc0-b9b6-dcb5253811bc');
$__env->startPush('scripts'); ?>
<script>
// Performance monitoring and optimization script
(function() {
    'use strict';
    
    // Track performance metrics
    const performanceMetrics = {
        imageLoadTimes: [],
        brokenImages: [],
        totalImages: 0,
        loadedImages: 0
    };
    
    // Monitor image loading
    function monitorImageLoading() {
        const images = document.querySelectorAll('img');
        performanceMetrics.totalImages = images.length;
        
        images.forEach((img, index) => {
            const startTime = performance.now();
            
            img.addEventListener('load', function() {
                const loadTime = performance.now() - startTime;
                performanceMetrics.imageLoadTimes.push(loadTime);
                performanceMetrics.loadedImages++;
                
                // Log slow loading images
                if (loadTime > 2000) {
                    console.warn(`Slow loading image (${loadTime.toFixed(2)}ms):`, img.src);
                }
            });
            
            img.addEventListener('error', function() {
                performanceMetrics.brokenImages.push({
                    src: img.src,
                    alt: img.alt,
                    index: index
                });
                
                console.error('Broken image detected:', img.src);
                
                // Replace with fallback
                img.src = '<?php echo e(bagisto_asset("images/small-product-placeholder.webp")); ?>';
                img.alt = 'Image not available';
                img.classList.add('fallback-image');
            });
        });
    }
    
    // Optimize carousel performance
    function optimizeCarousels() {
        const carousels = document.querySelectorAll('[class*="carousel"]');
        
        carousels.forEach(carousel => {
            // Add performance optimizations
            carousel.style.willChange = 'transform';
            carousel.style.contain = 'layout style paint';
            
            // Optimize touch events
            carousel.addEventListener('touchstart', function(e) {
                carousel.style.pointerEvents = 'none';
            }, { passive: true });
            
            carousel.addEventListener('touchend', function(e) {
                setTimeout(() => {
                    carousel.style.pointerEvents = 'auto';
                }, 100);
            }, { passive: true });
        });
    }
    
    // Check for layout shifts
    function monitorLayoutShifts() {
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                let cumulativeScore = 0;
                
                list.getEntries().forEach((entry) => {
                    if (entry.entryType === 'layout-shift' && !entry.hadRecentInput) {
                        cumulativeScore += entry.value;
                    }
                });
                
                if (cumulativeScore > 0.1) {
                    console.warn('High Cumulative Layout Shift detected:', cumulativeScore);
                }
            });
            
            observer.observe({ entryTypes: ['layout-shift'] });
        }
    }
    
    // Preload critical resources
    function preloadCriticalResources() {
        // Preload first carousel image
        const firstCarouselImg = document.querySelector('.carousel img, [class*="carousel"] img');
        if (firstCarouselImg && firstCarouselImg.dataset.src) {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = firstCarouselImg.dataset.src;
            document.head.appendChild(link);
        }
        
        // Preload critical fonts
        const criticalFonts = [
            '/fonts/Hind-Regular.ttf',
            '/fonts/Hind-Bold.ttf'
        ];
        
        criticalFonts.forEach(font => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'font';
            link.type = 'font/ttf';
            link.crossOrigin = 'anonymous';
            link.href = font;
            document.head.appendChild(link);
        });
    }
    
    // Report performance metrics
    function reportPerformanceMetrics() {
        setTimeout(() => {
            const avgLoadTime = performanceMetrics.imageLoadTimes.reduce((a, b) => a + b, 0) / performanceMetrics.imageLoadTimes.length;
            
            console.group('🚀 Landing Page Performance Report');
            console.log(`📊 Total Images: ${performanceMetrics.totalImages}`);
            console.log(`✅ Loaded Images: ${performanceMetrics.loadedImages}`);
            console.log(`❌ Broken Images: ${performanceMetrics.brokenImages.length}`);
            console.log(`⏱️ Average Load Time: ${avgLoadTime ? avgLoadTime.toFixed(2) + 'ms' : 'N/A'}`);
            
            if (performanceMetrics.brokenImages.length > 0) {
                console.warn('🔍 Broken Images:', performanceMetrics.brokenImages);
            }
            
            console.groupEnd();
        }, 5000);
    }
    
    // Initialize optimizations
    document.addEventListener('DOMContentLoaded', function() {
        preloadCriticalResources();
        monitorImageLoading();
        optimizeCarousels();
        monitorLayoutShifts();
        reportPerformanceMetrics();
    });
    
    // Service Worker registration for caching
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('✅ Service Worker registered successfully');
            }).catch(function(error) {
                console.log('❌ Service Worker registration failed:', error);
            });
        });
    }
})();
</script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\performance\monitor.blade.php ENDPATH**/ ?>