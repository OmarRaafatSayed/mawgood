<x-shop::layouts>
    <x-slot:title>{{ $job->title }}</x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <!-- Job Header -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h1 class="text-3xl font-bold mb-3">{{ $job->title }}</h1>
                <p class="text-xl text-gray-700 mb-2">{{ $job->company_name }}</p>
                <div class="flex gap-4 text-gray-600 mb-4">
                    <span>📍 {{ $job->city }}</span>
                    @if($job->job_type)
                        <span>💼 {{ ucfirst($job->job_type) }}</span>
                    @endif
                    @if($job->category)
                        <span>🏷️ {{ $job->category->name }}</span>
                    @endif
                </div>
                
                @if($job->application_link)
                    <a href="{{ $job->application_link }}" target="_blank" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold">
                        تقديم طلب الآن
                    </a>
                @endif
            </div>

            <!-- Job Description -->
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-2xl font-semibold mb-4">وصف الوظيفة</h2>
                <div class="prose max-w-none">
                    {!! $job->description !!}
                </div>
            </div>

            <!-- Related Jobs -->
            @if($relatedJobs->count() > 0)
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-semibold mb-4">وظائف مشابهة</h2>
                    <div class="grid gap-4">
                        @foreach($relatedJobs as $relatedJob)
                            <div class="border rounded-lg p-4 hover:shadow transition">
                                <h3 class="text-lg font-semibold mb-1">
                                    <a href="{{ route('jobs.show', $relatedJob->slug) }}" class="hover:text-blue-600">{{ $relatedJob->title }}</a>
                                </h3>
                                <p class="text-gray-600 text-sm">{{ $relatedJob->company_name }} - {{ $relatedJob->city }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-shop::layouts>
