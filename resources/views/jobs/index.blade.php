<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الوظائف المتاحة</title>
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
@include('components.desktop-navbar')

<div class="max-w-md mx-auto px-4 py-6 pb-24 lg:max-w-7xl lg:pb-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-primary flex items-center gap-2">
                <span class="w-1 h-6 bg-accent-gold rounded-full"></span>
                أحدث الوظائف
            </h3>
            <span class="text-sm text-gray-500 font-medium">{{ $jobs->total() }} وظيفة</span>
        </div>

        <!-- Jobs Grid -->
        @if($jobs->count() > 0)
            <div class="flex flex-col gap-4 lg:grid lg:grid-cols-2 lg:gap-6">
                @foreach($jobs as $job)
                    <div class="bg-white rounded-[15px] p-4 shadow-sm border border-primary/5 hover:shadow-md transition-shadow">
                        <div class="flex items-start gap-3">
                            <div class="size-14 rounded-lg bg-gray-50 p-2 flex items-center justify-center border border-primary/5 overflow-hidden flex-shrink-0">
                                @if($job->company_logo)
                                    <img src="{{ $job->company_logo }}" alt="{{ $job->company_name }}" class="w-full h-full object-contain" />
                                @else
                                    <span class="material-symbols-outlined text-2xl text-gray-400">business</span>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start gap-2 mb-1">
                                    <h4 class="font-bold text-primary leading-tight line-clamp-1">{{ $job->title }}</h4>
                                    @if($job->job_type)
                                        <span class="px-2 py-0.5 bg-primary/10 text-primary text-[10px] font-bold rounded uppercase tracking-wider flex-shrink-0">{{ $job->job_type }}</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 font-medium mb-3 line-clamp-1">{{ $job->company_name }}</p>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-xs text-gray-500">
                                    <div class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm text-accent-gold">location_on</span>
                                        <span>{{ $job->city }}</span>
                                    </div>
                                    @if($job->salary_from && $job->salary_to)
                                        <div class="flex items-center gap-1 font-semibold text-primary">
                                            <span class="material-symbols-outlined text-sm text-accent-gold">payments</span>
                                            <span>{{ number_format($job->salary_from / 1000) }} - {{ number_format($job->salary_to / 1000) }} ألف جنيه</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('jobs.show', $job->slug) }}" class="flex-1 py-2.5 bg-primary text-white font-bold rounded-lg text-sm text-center transition-transform active:scale-[0.98] hover:bg-primary/90">قدم الآن</a>
                            <button onclick="toggleBookmark(this)" class="px-3 py-2.5 bg-gray-50 text-gray-400 rounded-lg border border-primary/10 transition-all active:scale-95 hover:bg-gray-100">
                                <span class="material-symbols-outlined text-xl align-middle">bookmark</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $jobs->links() }}</div>
        @else
            <div class="text-center py-16">
                <span class="material-symbols-outlined text-6xl text-gray-300 mb-4">work_off</span>
                <p class="text-gray-500 text-base">لا توجد وظائف متاحة حالياً</p>
            </div>
        @endif
    </div>

@include('components.footer')
@include('components.navbar')
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
</script>
</body>
</html>
