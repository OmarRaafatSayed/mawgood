<x-shop::layouts>
    <x-slot:title>الوظائف المتاحة</x-slot>

    <!-- Filter Bar -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-4">
            <form method="GET" action="{{ route('jobs.index') }}" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium mb-1">بحث</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن وظيفة..." class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" />
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">الفئة</label>
                    <select name="category" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع الفئات</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">الموقع</label>
                    <select name="location" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع المواقع</option>
                        @foreach($cities as $city)
                            <option value="{{ $city }}" {{ request('location') == $city ? 'selected' : '' }}>{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="min-w-[180px]">
                    <label class="block text-sm font-medium mb-1">نوع الوظيفة</label>
                    <select name="job_type" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="">جميع الأنواع</option>
                        @foreach($jobTypes as $type)
                            <option value="{{ $type }}" {{ request('job_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">بحث</button>
            </form>
        </div>
    </div>

    <!-- Jobs List -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">الوظائف المتاحة ({{ $jobs->total() }})</h1>
        </div>

        @if($jobs->count() > 0)
            <div class="grid gap-4">
                @foreach($jobs as $job)
                    <div class="bg-white border rounded-lg p-6 hover:shadow-lg transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold mb-2">
                                    <a href="{{ route('jobs.show', $job->slug) }}" class="hover:text-blue-600">{{ $job->title }}</a>
                                </h2>
                                <p class="text-gray-600 mb-2">{{ $job->company_name }}</p>
                                <div class="flex gap-4 text-sm text-gray-500">
                                    <span>📍 {{ $job->city }}</span>
                                    @if($job->job_type)
                                        <span>💼 {{ ucfirst($job->job_type) }}</span>
                                    @endif
                                    @if($job->category)
                                        <span>🏷️ {{ $job->category->name }}</span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('jobs.show', $job->slug) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 whitespace-nowrap">عرض التفاصيل</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $jobs->links() }}</div>
        @else
            <div class="text-center py-12"><p class="text-gray-600 text-lg">لا توجد وظائف متاحة حالياً</p></div>
        @endif
    </div>
</x-shop::layouts>
