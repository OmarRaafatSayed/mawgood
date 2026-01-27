<x-shop::layouts>
    <x-slot:title>لوحة تحكم الشركة</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">مرحباً {{ $user->name }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">إجمالي الوظائف</h3>
                <p class="text-3xl font-bold">{{ $stats['total_jobs'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">الوظائف النشطة</h3>
                <p class="text-3xl font-bold text-green-600">{{ $stats['active_jobs'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">إجمالي المتقدمين</h3>
                <p class="text-3xl font-bold">{{ $stats['total_applications'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600 mb-2">طلبات قيد المراجعة</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_applications'] }}</p>
            </div>
        </div>

        <div class="flex gap-4 mb-8">
            <a href="{{ route('company.jobs.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر وظيفة جديدة
            </a>
            <a href="{{ route('company.jobs.index') }}" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                إدارة الوظائف
            </a>
            <a href="{{ route('company.profile') }}" class="bg-gray-200 px-6 py-3 rounded-lg hover:bg-gray-300">
                الملف الشخصي
            </a>
        </div>

        @if($recentApplications->count() > 0)
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-4">آخر الطلبات</h2>
                <div class="space-y-4">
                    @foreach($recentApplications as $app)
                        <div class="border-b pb-4">
                            <h3 class="font-bold">{{ $app->job->title }}</h3>
                            <p class="text-gray-600">المتقدم: {{ $app->customer->name }}</p>
                            <p class="text-sm text-gray-500">{{ $app->created_at->diffForHumans() }}</p>
                            <a href="{{ route('company.jobs.applications', $app->job->id) }}" class="text-blue-600 hover:underline">
                                عرض التفاصيل
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-shop::layouts>
