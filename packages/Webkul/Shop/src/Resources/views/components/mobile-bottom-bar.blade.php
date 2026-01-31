@php
    $cartCount = cart()->getCart()?->items_count ?? 0;
    $wishlistCount = auth()->check() ? auth()->user()->wishlist_items_count ?? 0 : 0;
    $hideOnRoutes = ['checkout.*', 'customer.session.*', 'admin.*', 'vendor.*'];
    $shouldHide = collect($hideOnRoutes)->contains(fn($pattern) => request()->routeIs($pattern));
@endphp

@if(!$shouldHide)
<nav class="mobile-nav-bar">
    @php
        $isSearchPage = request()->routeIs('shop.search.index') || request()->routeIs('shop.product_or_category.index') || request()->routeIs('shop.products.index');
    @endphp
    
    @if($isSearchPage)
    <a href="{{ route('shop.home.index') }}" class="nav-item">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        <span>الرئيسية</span>
    </a>
    @else
    <a href="{{ route('shop.search.index') }}" class="nav-item">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        <span>السوق</span>
    </a>
    @endif

    <button type="button" class="nav-item" onclick="document.getElementById('categoriesSheet').classList.add('show')">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
            <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
        </svg>
        <span>@lang('shop::app.components.layouts.header.desktop.bottom.categories')</span>
    </button>

    <button type="button" class="nav-item nav-search" onclick="document.getElementById('searchModal').classList.add('show')">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
    </button>

    <a href="{{ route('shop.customers.account.wishlist.index') }}" class="nav-item {{ request()->routeIs('shop.customers.account.wishlist.*') ? 'active' : '' }}">
        <div class="icon-wrap">
            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
            </svg>
            @if($wishlistCount > 0)<span class="badge">{{ $wishlistCount > 99 ? '99+' : $wishlistCount }}</span>@endif
        </div>
        <span>@lang('shop::app.components.layouts.header.desktop.bottom.wishlist')</span>
    </a>

    <a href="{{ route('shop.checkout.cart.index') }}" class="nav-item {{ request()->routeIs('shop.checkout.cart.*') ? 'active' : '' }}">
        <div class="icon-wrap">
            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            @if($cartCount > 0)<span class="badge">{{ $cartCount > 99 ? '99+' : $cartCount }}</span>@endif
        </div>
        <span>@lang('shop::app.checkout.cart.index.cart')</span>
    </a>
</nav>

<div id="categoriesSheet" class="bottom-sheet">
    <div class="sheet-overlay" onclick="document.getElementById('categoriesSheet').classList.remove('show')"></div>
    <div class="sheet-content">
        <div class="sheet-header">
            <h3>@lang('shop::app.components.layouts.header.desktop.bottom.categories')</h3>
            <button type="button" onclick="document.getElementById('categoriesSheet').classList.remove('show')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <div class="sheet-body">
            @foreach(app('Webkul\Category\Repositories\CategoryRepository')->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id) as $category)
            <a href="{{ route('shop.product_or_category.index', $category->slug) }}" class="cat-item">
                @if($category->category_icon_path)<img src="{{ $category->category_icon_path }}" alt="{{ $category->name }}">@endif
                <span>{{ $category->name }}</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>
            @endforeach
        </div>
    </div>
</div>

<style>
.mobile-nav-bar{display:none;position:fixed;bottom:0;left:0;right:0;background:#fff;border-top:1px solid #e5e7eb;padding:8px 0 max(8px,env(safe-area-inset-bottom));z-index:999;box-shadow:0 -2px 10px rgba(0,0,0,.05)}
@media(max-width:768px){.mobile-nav-bar{display:flex;justify-content:space-around;align-items:center}body{padding-bottom:calc(65px + env(safe-area-inset-bottom))}}
.mobile-nav-bar .nav-item{display:flex;flex-direction:column;align-items:center;gap:4px;flex:1;padding:6px 4px;color:#6b7280;text-decoration:none;transition:all .2s;border:none;background:none;cursor:pointer;position:relative}
.mobile-nav-bar .nav-item.nav-search{background:linear-gradient(135deg,#f97316 0%,#ea580c 100%);color:#fff;border-radius:50%;width:56px;height:56px;margin-top:-28px;box-shadow:0 4px 12px rgba(249,115,22,.3);flex:0 0 56px}
.mobile-nav-bar .nav-item.nav-search .icon{width:24px;height:24px}
.mobile-nav-bar .nav-item.nav-search span{display:none}
.mobile-nav-bar .nav-item .icon{width:22px;height:22px;stroke-width:2}
.mobile-nav-bar .nav-item span{font-size:11px;font-weight:500;white-space:nowrap}
.mobile-nav-bar .nav-item.active{color:#f97316}
.mobile-nav-bar .nav-item:active{transform:scale(.95)}
.mobile-nav-bar .icon-wrap{position:relative}
.mobile-nav-bar .badge{position:absolute;top:-6px;right:-8px;background:#ef4444;color:#fff;font-size:10px;font-weight:700;padding:2px 5px;border-radius:10px;min-width:18px;text-align:center;line-height:1.2;box-shadow:0 2px 4px rgba(0,0,0,.2)}
.bottom-sheet{display:none;position:fixed;inset:0;z-index:9999}
.bottom-sheet.show{display:block}
.sheet-overlay{position:absolute;inset:0;background:rgba(0,0,0,.5);animation:fadeIn .3s}
.sheet-content{position:absolute;bottom:0;left:0;right:0;background:#fff;border-radius:20px 20px 0 0;max-height:70vh;display:flex;flex-direction:column;animation:slideUp .3s}
.sheet-header{display:flex;justify-content:space-between;align-items:center;padding:20px;border-bottom:1px solid #e5e7eb}
.sheet-header h3{font-size:18px;font-weight:700;color:#111827;margin:0}
.sheet-header button{width:32px;height:32px;border:none;background:#f3f4f6;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;color:#6b7280;padding:0}
.sheet-header button svg{width:18px;height:18px}
.sheet-body{overflow-y:auto;padding:12px 0}
.cat-item{display:flex;align-items:center;gap:12px;padding:14px 20px;color:#374151;text-decoration:none;transition:background .2s}
.cat-item:active{background:#f9fafb}
.cat-item img{width:32px;height:32px;object-fit:contain}
.cat-item span{flex:1;font-size:15px;font-weight:500}
.cat-item svg{width:18px;height:18px;color:#9ca3af}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes slideUp{from{transform:translateY(100%)}to{transform:translateY(0)}}
</style>
@endif
