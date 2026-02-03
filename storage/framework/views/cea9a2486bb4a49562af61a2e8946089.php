<?php if (! $__env->hasRenderedOnce('6efda6b6-0ae4-4379-bceb-881c1bec28f6')): $__env->markAsRenderedOnce('6efda6b6-0ae4-4379-bceb-881c1bec28f6');
$__env->startPush('styles'); ?>
<style>
    /* Critical CSS for above-the-fold content */
    .hero-section {
        min-height: 400px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Optimize carousel loading */
    .carousel-slide {
        background-color: #f0f0f0;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Prevent layout shift for images */
    .image-container {
        position: relative;
        overflow: hidden;
    }
    
    .image-container::before {
        content: '';
        display: block;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        background-color: #f0f0f0;
    }
    
    .image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Optimize product grid */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
        contain: layout style paint;
    }
    
    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
    }
    
    .product-card:hover {
        transform: translateY(-2px);
    }
    
    /* Loading states */
    .loading-skeleton {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }
    
    @keyframes loading {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    /* Responsive optimizations */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 300px;
        }
        
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 0.5rem;
        }
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c2e1b40e-373e-4363-a4f6-70ecc13ff86d')): $__env->markAsRenderedOnce('c2e1b40e-373e-4363-a4f6-70ecc13ff86d');
$__env->startPush('scripts'); ?>
<script>
// Optimize image loading performance
document.addEventListener('DOMContentLoaded', function() {
    // Preload first carousel image
    const firstCarouselImage = document.querySelector('.carousel-slide:first-child img');
    if (firstCarouselImage && firstCarouselImage.dataset.src) {
        const preloadLink = document.createElement('link');
        preloadLink.rel = 'preload';
        preloadLink.as = 'image';
        preloadLink.href = firstCarouselImage.dataset.src;
        document.head.appendChild(preloadLink);
    }
    
    // Optimize scroll performance
    let ticking = false;
    function updateScrollPosition() {
        // Handle scroll-based optimizations
        ticking = false;
    }
    
    window.addEventListener('scroll', function() {
        if (!ticking) {
            requestAnimationFrame(updateScrollPosition);
            ticking = true;
        }
    }, { passive: true });
    
    // Optimize touch events for mobile
    if ('ontouchstart' in window) {
        document.addEventListener('touchstart', function() {}, { passive: true });
        document.addEventListener('touchmove', function() {}, { passive: true });
    }
});
</script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\performance\critical-css.blade.php ENDPATH**/ ?>