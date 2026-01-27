<x-shop::layouts>
    <x-slot:title>الطلبات المستلمة</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-2">الطلبات المستلمة</h1>
        <p class="text-gray-600 mb-6">الوظيفة: {{ $job->title }}</p>

        @if($applications->isEmpty())
            <div class="bg-gray-100 p-8 rounded-lg text-center">
                <p class="text-gray-600">لا توجد طلبات حتى الآن</p>
            </div>
        @else
            <div class="space-y-4">
                @foreach($applications as $application)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold mb-2">{{ $application->customer->name }}</h3>
                                <p class="text-gray-600 mb-2">{{ $application->customer->email }}</p>
                                <p class="text-sm text-gray-500 mb-2">تاريخ التقديم: {{ $application->created_at->format('Y-m-d') }}</p>
                                
                                @if($application->cover_letter)
                                    <p class="text-gray-700 mb-2"><strong>رسالة التقديم:</strong> {{ $application->cover_letter }}</p>
                                @endif

                                @if($application->resume_path)
                                    <a href="{{ Storage::url($application->resume_path) }}" target="_blank" class="text-blue-600 hover:underline">
                                        عرض السيرة الذاتية
                                    </a>
                                @endif

                                <div class="mt-2">
                                    <span class="px-3 py-1 rounded text-sm
                                        @if($application->status === 'accepted') bg-green-100 text-green-800
                                        @elseif($application->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ $application->status === 'accepted' ? 'مقبول' : ($application->status === 'rejected' ? 'مرفوض' : 'قيد المراجعة') }}
                                    </span>
                                </div>
                            </div>

                            @if($application->status === 'pending')
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('company.applications.accept', $application->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                                            قبول
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('company.applications.reject', $application->id) }}">
                                        @csrf
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                            رفض
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $applications->links() }}
            </div>
        @endif
    </div>
</x-shop::layouts>
