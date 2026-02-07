@php
    $hideOnRoutes = ['checkout.*', 'customer.session.*', 'admin.*', 'vendor.*'];
    $shouldHide = collect($hideOnRoutes)->contains(fn($pattern) => request()->routeIs($pattern));
@endphp

@if(!$shouldHide)
<nav class="mobile-nav-bar">
    <a href="{{ route('shop.search.index') }}" class="nav-item {{ request()->routeIs('shop.search.index') ? 'active' : '' }}">
        {!! '<i class="fas fa-store"></i>' !!}
        <span>السوق</span>
    </a>

    <a href="{{ route('shop.customers.account.index') }}" class="nav-item {{ request()->routeIs('shop.customers.account.*') ? 'active' : '' }}">
        {!! '<i class="fas fa-user"></i>' !!}
        <span>حسابي</span>
    </a>

    <a href="{{ route('vendor.dashboard.index') }}" class="nav-item nav-fab">
        {!! '<i class="fas fa-plus"></i>' !!}
    </a>

    <button type="button" class="nav-item" onclick="document.getElementById('searchModal').classList.add('show')">
        {!! '<i class="fas fa-search"></i>' !!}
        <span>البحث</span>
    </button>

    <button type="button" class="nav-item" onclick="document.getElementById('offCanvasMenu').classList.add('show')">
        {!! '<i class="fas fa-bars"></i>' !!}
        <span>القائمة</span>
    </button>
</nav>

<div id="offCanvasMenu" class="off-canvas-menu">
    <div class="off-canvas-overlay" onclick="document.getElementById('offCanvasMenu').classList.remove('show')"></div>
    <div class="off-canvas-content">
        <div class="off-canvas-header">
            <h3>القائمة</h3>
            <button type="button" onclick="document.getElementById('offCanvasMenu').classList.remove('show')">
                {!! '<i class="fas fa-times"></i>' !!}
            </button>
        </div>
        <div class="off-canvas-body">
            <div class="menu-section">
                @guest('customer')
                    <a href="{{ route('shop.customer.session.create') }}" class="menu-link">
                        {!! '<i class="fas fa-sign-in-alt"></i>' !!}
                        <span>تسجيل الدخول</span>
                    </a>
                    <a href="{{ route('shop.customers.register.index') }}" class="menu-link">
                        {!! '<i class="fas fa-user-plus"></i>' !!}
                        <span>الاشتراك</span>
                    </a>
                @endguest
            </div>

            <div class="menu-section">
                <a href="{{ route('blog.index') }}" class="menu-link">
                    {!! '<i class="fas fa-newspaper"></i>' !!}
                    <span>المقالات</span>
                </a>
                <a href="{{ route('jobs.index') }}" class="menu-link">
                    {!! '<i class="fas fa-briefcase"></i>' !!}
                    <span>فرص العمل</span>
                </a>
                <a href="{{ route('shop.search.index') }}" class="menu-link">
                    {!! '<i class="fas fa-search"></i>' !!}
                    <span>البحث</span>
                </a>
            </div>

            <div class="menu-section">
                <a href="{{ route('shop.cms.page', 'about-us') }}" class="menu-link">
                    {!! '<i class="fas fa-info-circle"></i>' !!}
                    <span>من نحن</span>
                </a>
                <a href="{{ route('shop.cms.page', 'privacy-policy') }}" class="menu-link">
                    {!! '<i class="fas fa-shield-alt"></i>' !!}
                    <span>سياسة الخصوصية</span>
                </a>
                <a href="{{ route('shop.cms.page', 'terms-of-use') }}" class="menu-link">
                    {!! '<i class="fas fa-file-contract"></i>' !!}
                    <span>شروط الاستخدام</span>
                </a>
                <a href="{{ route('shop.cms.page', 'contact-us') }}" class="menu-link">
                    {!! '<i class="fas fa-envelope"></i>' !!}
                    <span>اتصل بنا</span>
                </a>
            </div>

            <div class="menu-section social-section">
                <a href="#" class="social-link" aria-label="Facebook">{!! '<i class="fab fa-facebook-f"></i>' !!}</a>
                <a href="#" class="social-link" aria-label="TikTok">{!! '<i class="fab fa-tiktok"></i>' !!}</a>
                <a href="#" class="social-link" aria-label="YouTube">{!! '<i class="fab fa-youtube"></i>' !!}</a>
                <a href="#" class="social-link" aria-label="WhatsApp">{!! '<i class="fab fa-whatsapp"></i>' !!}</a>
                <a href="#" class="social-link" aria-label="Instagram">{!! '<i class="fab fa-instagram"></i>' !!}</a>
            </div>
        </div>
    </div>
</div>

<style>
.mobile-nav-bar {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 1px solid #e5e7eb;
    padding: 8px 0 max(8px, env(safe-area-inset-bottom));
    z-index: 999;
    box-shadow: 0 -2px 10px rgba(0,0,0,.05);
}

@media(max-width:768px) {
    .mobile-nav-bar { display: flex; justify-content: space-around; align-items: flex-end; }
    body { padding-bottom: calc(70px + env(safe-area-inset-bottom)); }
}

@media(min-width:769px) {
    .mobile-nav-bar { display: none !important; }
}

.mobile-nav-bar .nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
    flex: 1;
    padding: 8px 4px;
    color: #6b7280;
    text-decoration: none;
    transition: all .2s;
    border: none;
    background: none;
    cursor: pointer;
}

.mobile-nav-bar .nav-item i { font-size: 20px; }

.mobile-nav-bar .nav-item.nav-fab {
    background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
    color: #fff;
    border-radius: 50%;
    width: 56px;
    height: 56px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(249,115,22,.3), 0 0 0 5px #fff;
    flex: 0 0 56px;
    padding: 0;
    justify-content: center;
}

.mobile-nav-bar .nav-item.nav-fab i { font-size: 24px; }

.mobile-nav-bar .nav-item span { font-size: 11px; font-weight: 500; white-space: nowrap; }

.mobile-nav-bar .nav-item.active { color: #f97316; }

.mobile-nav-bar .nav-item:active { transform: scale(.95); }

.off-canvas-menu { display: none; position: fixed; inset: 0; z-index: 9999; }

.off-canvas-menu.show { display: block; }

.off-canvas-overlay { position: absolute; inset: 0; background: rgba(0,0,0,.5); animation: fadeIn .3s; }

.off-canvas-content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 80%;
    max-width: 320px;
    background: #fff;
    display: flex;
    flex-direction: column;
    animation: slideInRight .3s;
}

html[dir="ltr"] .off-canvas-content { right: auto; left: 0; animation: slideInLeft .3s; }

.off-canvas-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #e5e7eb;
}

.off-canvas-header h3 { font-size: 18px; font-weight: 700; color: #111827; margin: 0; }

.off-canvas-header button {
    width: 32px;
    height: 32px;
    border: none;
    background: #f3f4f6;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: #6b7280;
}

.off-canvas-body { overflow-y: auto; height: 100vh; }

.menu-section { padding: 16px 0; border-bottom: 1px solid #e5e7eb; }

.menu-link {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #374151;
    text-decoration: none;
    transition: background .2s;
}

.menu-link:hover { background: #f9fafb; }

.menu-link i { width: 20px; font-size: 18px; color: #6b7280; }

.menu-link span { font-size: 15px; font-weight: 500; }

.social-section {
    display: flex;
    justify-content: center;
    gap: 16px;
    padding: 20px;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6b7280;
    transition: all .2s;
}

.social-link:hover { background: #f97316; color: #fff; }

@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes slideInRight { from { transform: translateX(100%); } to { transform: translateX(0); } }
@keyframes slideInLeft { from { transform: translateX(-100%); } to { transform: translateX(0); } }
</style>
@endif