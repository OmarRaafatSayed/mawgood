<div id="searchModal" class="search-modal">
    <div class="search-content">
        <div class="search-header">
            <button type="button" onclick="document.getElementById('searchModal').classList.remove('show')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"/>
                </svg>
            </button>
            <form action="<?php echo e(route('shop.search.index')); ?>" method="GET" class="search-form">
                <input type="text" name="query" placeholder="<?php echo app('translator')->get('shop::app.components.layouts.header.desktop.bottom.search-text'); ?>" autocomplete="off" autofocus>
                <button type="submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                    </svg>
                </button>
            </form>
        </div>

        <div class="search-body">
            <?php if(auth()->check() && auth()->user()->search_history): ?>
            <div class="search-section">
                <div class="section-header">
                    <h4><?php echo app('translator')->get('shop::app.search.title'); ?></h4>
                    <button type="button"><?php echo app('translator')->get('shop::app.categories.filters.clear-all'); ?></button>
                </div>
                <div class="search-items">
                    <?php $__currentLoopData = json_decode(auth()->user()->search_history, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('shop.search.index', ['query' => $term])); ?>" class="search-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="1 4 1 10 7 10"/>
                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"/>
                        </svg>
                        <span><?php echo e($term); ?></span>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="search-section">
                <div class="section-header">
                    <h4><?php echo app('translator')->get('shop::app.search.results'); ?></h4>
                </div>
                <div class="search-tags">
                    <?php $tags = ['Electronics', 'Fashion', 'Home', 'Beauty', 'Sports', 'Books']; ?>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('shop.search.index', ['query' => $tag])); ?>" class="tag"><?php echo e($tag); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.search-modal{display:none;position:fixed;inset:0;background:#fff;z-index:10000}
.search-modal.show{display:block;animation:slideInRight .3s}
@media(min-width:769px){.search-modal{display:none!important}}
.search-content{display:flex;flex-direction:column;height:100%}
.search-header{display:flex;align-items:center;gap:12px;padding:12px 16px;border-bottom:1px solid #e5e7eb;background:#fff;position:sticky;top:0;z-index:10}
.search-header button{width:40px;height:40px;border:none;background:none;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#374151;padding:0;flex-shrink:0}
.search-header button svg{width:24px;height:24px}
.search-form{flex:1;display:flex;align-items:center;gap:8px;background:#f3f4f6;border-radius:12px;padding:0 12px}
.search-form input{flex:1;border:none;background:none;padding:12px 0;font-size:16px;color:#111827;outline:none}
.search-form input::placeholder{color:#9ca3af}
.search-form button{width:36px;height:36px;border:none;background:none;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#6b7280;padding:0}
.search-form button svg{width:20px;height:20px}
.search-body{flex:1;overflow-y:auto;padding:16px}
.search-section{margin-bottom:24px}
.section-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:12px}
.section-header h4{font-size:14px;font-weight:700;color:#111827;margin:0;text-transform:uppercase;letter-spacing:.5px}
.section-header button{border:none;background:none;color:#f97316;font-size:13px;font-weight:600;cursor:pointer;padding:0}
.search-items{display:flex;flex-direction:column;gap:4px}
.search-item{display:flex;align-items:center;gap:12px;padding:12px;color:#374151;text-decoration:none;border-radius:8px;transition:background .2s}
.search-item:active{background:#f9fafb}
.search-item svg{width:20px;height:20px;color:#9ca3af;flex-shrink:0}
.search-item span{font-size:15px}
.search-tags{display:flex;flex-wrap:wrap;gap:8px}
.tag{padding:8px 16px;background:#f3f4f6;color:#374151;text-decoration:none;border-radius:20px;font-size:14px;font-weight:500;transition:all .2s}
.tag:active{background:#e5e7eb;transform:scale(.95)}
@keyframes slideInRight{from{transform:translateX(100%)}to{transform:translateX(0)}}
</style>
<?php /**PATH /var/www/mawgood/packages/Webkul/Shop/src/Providers/../Resources/views/components/mobile-search-modal.blade.php ENDPATH**/ ?>