<x-shop::layouts.account>
    <x-slot:title>
        {{ app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs' }}
    </x-slot>

    <div class="max-md:hidden">
        <x-shop::layouts.account.navigation />
    </div>

    <div class="mx-4 flex-auto">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-x-2.5">
                <h2 class="text-2xl font-medium">
                    {{ app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs' }}
                </h2>
            </div>

            <a 
                href="{{ route('shop.customers.account.jobs.create') }}"
                class="primary-button px-5 py-3 font-normal"
            >
                {{ app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job' }}
            </a>
        </div>

        @if(session('success'))
            <div class="mt-4 rounded-md bg-green-50 p-4">
                <div class="text-sm text-green-700">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="mt-8">
            @if($jobs->count())
                <div class="grid gap-6">
                    @foreach($jobs as $job)
                        <div class="rounded-lg border border-zinc-200 p-6">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="text-xl font-semibold mb-2">
                                        <a href="{{ route('jobs.show', $job->slug) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                            {{ $job->title }}
                                        </a>
                                    </h3>
                                    
                                    <p class="text-gray-600 mb-2">{{ $job->company_name }}</p>
                                    
                                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                        <span><i class="fas fa-map-marker-alt"></i> {{ $job->city }}</span>
                                        <span><i class="fas fa-briefcase"></i> 
                                            @if(app()->getLocale() === 'ar')
                                                @if($job->job_type === 'full-time')
                                                    دوام كامل
                                                @elseif($job->job_type === 'part-time')
                                                    دوام جزئي
                                                @elseif($job->job_type === 'contract')
                                                    عقد
                                                @else
                                                    عمل حر
                                                @endif
                                            @else
                                                {{ ucfirst(str_replace('-', ' ', $job->job_type)) }}
                                            @endif
                                        </span>
                                        <span><i class="fas fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</span>
                                    </div>

                                    @if($job->salary_range)
                                        <p class="text-green-600 font-medium mb-3">{{ $job->salary_range }}</p>
                                    @endif

                                    <div class="flex items-center gap-2">
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                            {{ $job->category->name }}
                                        </span>
                                        
                                        @if($job->status)
                                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                                                {{ app()->getLocale() === 'ar' ? 'نشط' : 'Active' }}
                                            </span>
                                        @else
                                            <span class="inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">
                                                {{ app()->getLocale() === 'ar' ? 'غير نشط' : 'Inactive' }}
                                            </span>
                                        @endif

                                        <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">
                                            {{ $job->applications->count() }} {{ app()->getLocale() === 'ar' ? 'متقدم' : 'Applications' }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-col gap-2 ml-4">
                                    <a 
                                        href="{{ route('shop.customers.account.jobs.applications', $job->id) }}"
                                        class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200"
                                    >
                                        {{ app()->getLocale() === 'ar' ? 'عرض المتقدمين' : 'View Applications' }}
                                    </a>
                                    
                                    <a 
                                        href="{{ route('shop.customers.account.jobs.edit', $job->id) }}"
                                        class="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded hover:bg-gray-200"
                                    >
                                        {{ app()->getLocale() === 'ar' ? 'تعديل' : 'Edit' }}
                                    </a>
                                    
                                    <form method="POST" action="{{ route('shop.customers.account.jobs.delete', $job->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 w-full"
                                            onclick="return confirm('{{ app()->getLocale() === 'ar' ? 'هل أنت متأكد من حذف هذه الوظيفة؟' : 'Are you sure you want to delete this job?' }}')"
                                        >
                                            {{ app()->getLocale() === 'ar' ? 'حذف' : 'Delete' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $jobs->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="text-gray-400 text-6xl mb-4">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-600 mb-2">
                        {{ app()->getLocale() === 'ar' ? 'لا توجد وظائف' : 'No Jobs Yet' }}
                    </h3>
                    <p class="text-gray-500 mb-6">
                        {{ app()->getLocale() === 'ar' ? 'ابدأ بإضافة وظيفتك الأولى' : 'Start by adding your first job posting' }}
                    </p>
                    <a 
                        href="{{ route('shop.customers.account.jobs.create') }}"
                        class="primary-button px-6 py-3"
                    >
                        {{ app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job' }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-shop::layouts.account>