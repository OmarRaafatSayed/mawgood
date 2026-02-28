<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} - موجود</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B00',
                        'accent-gold': '#FFB800'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Top Navbar -->
    <nav class="hidden lg:flex bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-bold text-primary">موجود</a>
            <div class="flex-1 max-w-2xl mx-8">
                <div class="relative">
                    <input type="text" placeholder="ابحث عن منتجات..." class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-[15px] focus:outline-none focus:ring-2 focus:ring-primary" />
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <a href="/checkout/cart" class="relative">
                    <span class="material-symbols-outlined text-3xl text-primary">shopping_cart</span>
                    <span id="cart-badge-desktop" class="absolute -top-1 -right-1 bg-primary text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">0</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4 py-6 pb-24 lg:pb-6">
        <!-- Back Button -->
        <button onclick="window.history.back()" class="flex items-center gap-2 text-gray-600 hover:text-primary mb-6 transition-colors">
            <span class="material-symbols-outlined">arrow_forward</span>
            <span class="font-medium">العودة للوظائف</span>
        </button>

        <!-- Job Header Card -->
        <div class="bg-white rounded-[15px] p-6 shadow-sm border border-primary/5 mb-6">
            <div class="flex items-start gap-4 mb-6">
                <div class="size-20 rounded-lg bg-gray-50 p-3 flex items-center justify-center border border-primary/5 overflow-hidden flex-shrink-0">
                    @if($job->company_logo)
                        <img src="{{ $job->company_logo }}" alt="{{ $job->company_name }}" class="w-full h-full object-contain" />
                    @else
                        <span class="material-symbols-outlined text-4xl text-gray-400">business</span>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="flex items-start justify-between gap-4 mb-2">
                        <h1 class="text-2xl lg:text-3xl font-bold text-primary leading-tight">{{ $job->title }}</h1>
                        @if($job->job_type)
                            <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded uppercase tracking-wider flex-shrink-0">{{ $job->job_type }}</span>
                        @endif
                    </div>
                    <p class="text-lg text-gray-700 font-medium mb-4">{{ $job->company_name }}</p>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-lg text-accent-gold">location_on</span>
                            <span>{{ $job->city }}</span>
                        </div>
                        @if($job->salary_from && $job->salary_to)
                            <div class="flex items-center gap-1 font-semibold text-primary">
                                <span class="material-symbols-outlined text-lg text-accent-gold">payments</span>
                                <span>{{ number_format($job->salary_from / 1000) }} - {{ number_format($job->salary_to / 1000) }} ألف جنيه</span>
                            </div>
                        @endif
                        @if($job->category)
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-lg text-accent-gold">category</span>
                                <span>{{ $job->category->name }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex gap-3">
                @if($job->application_link)
                    <a href="{{ $job->application_link }}" target="_blank" class="flex-1 py-3 bg-primary text-white font-bold rounded-lg text-center transition-transform active:scale-[0.98] hover:bg-primary/90">
                        قدم الآن
                    </a>
                @else
                    <button class="flex-1 py-3 bg-primary text-white font-bold rounded-lg text-center transition-transform active:scale-[0.98] hover:bg-primary/90">
                        قدم الآن
                    </button>
                @endif
                <button onclick="toggleBookmark(this)" class="px-4 py-3 bg-gray-50 text-gray-400 rounded-lg border border-primary/10 transition-all active:scale-95 hover:bg-gray-100">
                    <span class="material-symbols-outlined text-2xl align-middle">bookmark</span>
                </button>
            </div>
        </div>

        <!-- Job Description Card -->
        <div class="bg-white rounded-[15px] p-6 shadow-sm border border-primary/5 mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="w-1 h-6 bg-accent-gold rounded-full"></span>
                وصف الوظيفة
            </h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $job->description !!}
            </div>
        </div>

        <!-- Related Jobs -->
        @if($relatedJobs->count() > 0)
            <div class="bg-white rounded-[15px] p-6 shadow-sm border border-primary/5">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-1 h-6 bg-accent-gold rounded-full"></span>
                    وظائف مشابهة
                </h2>
                <div class="space-y-3">
                    @foreach($relatedJobs as $relatedJob)
                        <a href="{{ route('jobs.show', $relatedJob->slug) }}" class="block p-4 border border-gray-200 rounded-lg hover:border-primary hover:shadow-md transition-all">
                            <div class="flex items-center justify-between gap-3">
                                <div class="flex-1">
                                    <h3 class="font-bold text-primary mb-1">{{ $relatedJob->title }}</h3>
                                    <p class="text-sm text-gray-600">{{ $relatedJob->company_name }} • {{ $relatedJob->city }}</p>
                                </div>
                                <span class="material-symbols-outlined text-gray-400">arrow_back</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    @include('components.footer')

    <!-- Bottom Navbar -->
    <nav class="fixed bottom-0 left-0 right-0 w-full mx-auto bg-white/80 backdrop-blur-md border-t flex items-center justify-around py-2 z-50 lg:hidden">
        <a class="flex flex-col items-center gap-1 text-gray-400" href="/">
            <span class="material-symbols-outlined text-2xl">home</span>
            <span class="text-[10px] font-bold">الرئيسية</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-gray-400" href="#">
            <span class="material-symbols-outlined text-2xl">favorite</span>
            <span class="text-[10px] font-bold">المفضلة</span>
        </a>
        <a class="relative -top-4" href="/checkout/cart">
            <div class="size-14 bg-primary rounded-full shadow-lg shadow-primary/30 flex items-center justify-center border-4 border-white">
                <span class="material-symbols-outlined text-white text-2xl">shopping_cart</span>
                <span id="cart-badge" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-bold rounded-full size-5 items-center justify-center">0</span>
            </div>
        </a>
        <a class="flex flex-col items-center gap-1 text-gray-400" href="/categories">
            <span class="material-symbols-outlined text-2xl">grid_view</span>
            <span class="text-[10px] font-bold">الأقسام</span>
        </a>
        <a class="flex flex-col items-center gap-1 text-gray-400" href="#">
            <span class="material-symbols-outlined text-2xl">person</span>
            <span class="text-[10px] font-bold">حسابي</span>
        </a>
    </nav>

    <script>
        function toggleBookmark(btn) {
            const icon = btn.querySelector('.material-symbols-outlined');
            if (icon.classList.contains('fill-1')) {
                icon.classList.remove('fill-1');
                btn.classList.remove('text-primary', 'bg-primary/10');
                btn.classList.add('text-gray-400', 'bg-gray-50');
            } else {
                icon.classList.add('fill-1');
                btn.classList.remove('text-gray-400', 'bg-gray-50');
                btn.classList.add('text-primary', 'bg-primary/10');
            }
        }

        window.updateCartBadge = function() {
            fetch('/api/checkout/cart')
                .then(res => res.json())
                .then(data => {
                    const badge = document.getElementById('cart-badge');
                    const badgeDesktop = document.getElementById('cart-badge-desktop');
                    const count = data.data?.items_count || 0;
                    [badge, badgeDesktop].forEach(b => {
                        if (!b) return;
                        if (count > 0) {
                            b.textContent = count;
                            b.classList.remove('hidden');
                            b.classList.add('flex');
                        } else {
                            b.classList.add('hidden');
                        }
                    });
                })
                .catch(() => {});
        };
        updateCartBadge();
    </script>
</body>
</html>
