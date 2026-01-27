<x-shop::layouts>
    <x-slot:title>إدارة الوظائف</x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">الوظائف المنشورة</h1>
            <a href="{{ route('company.jobs.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر وظيفة جديدة
            </a>
        </div>

        @if($jobs->isEmpty())
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لم تقم بنشر أي وظائف بعد</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($jobs as $job)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2">{{ $job->title }}</h3>
                                <p class="text-gray-600 mb-2">{{ $job->location }}</p>
                                <p class="text-sm text-gray-500">نُشرت في {{ $job->created_at->format('Y-m-d') }}</p>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('company.jobs.applications', $job->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                    الطلبات ({{ $job->applications->count() }})
                                </a>
                                <a href="{{ route('company.jobs.edit', $job->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                                    تعديل
                                </a>
                                <form method="POST" action="{{ route('company.jobs.destroy', $job->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('هل أنت متأكد؟')">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>
</x-shop::layouts>
