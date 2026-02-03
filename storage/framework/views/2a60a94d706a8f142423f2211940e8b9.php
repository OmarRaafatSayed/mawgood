<?php if (! $__env->hasRenderedOnce('884a2077-9a68-4c5c-b599-9ca70e4dc5d0')): $__env->markAsRenderedOnce('884a2077-9a68-4c5c-b599-9ca70e4dc5d0');
$__env->startPush('styles'); ?>
<style>
    /* Optimize image loading and prevent layout shifts */
    img {
        max-width: 100%;
        height: auto;
    }
    
    /* Shimmer effect for loading images */
    .shimmer {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: shimmer 1.5s infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    /* Optimize carousel performance */
    .carousel-container {
        contain: layout style paint;
        will-change: transform;
    }
    
    /* Prevent layout shifts */
    .aspect-ratio-container {
        position: relative;
        width: 100%;
    }
    
    .aspect-ratio-container::before {
        content: '';
        display: block;
        padding-top: var(--aspect-ratio, 100%);
    }
    
    .aspect-ratio-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9ec0170e-805f-451b-a2f5-3589a4450a85')): $__env->markAsRenderedOnce('9ec0170e-805f-451b-a2f5-3589a4450a85');
$__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preload critical images
    const criticalImages = document.querySelectorAll('img[fetchpriority="high"]');
    criticalImages.forEach(img => {
        if (img.dataset.src) {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.as = 'image';
            link.href = img.dataset.src;
            document.head.appendChild(link);
        }
    });
    
    // Optimize image loading with Intersection Observer
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('shimmer');
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Check for broken images and replace with fallback
    document.addEventListener('error', function(e) {
        if (e.target.tagName === 'IMG') {
            console.warn('Image failed to load:', e.target.src);
            e.target.src = '<?php echo e(bagisto_asset("images/small-product-placeholder.webp")); ?>';
            e.target.alt = 'Image not available';
        }
    }, true);
});
</script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\performance\image-optimizer.blade.php ENDPATH**/ ?>