<x-shop::layouts.account>
    <x-slot:title>
        {{ app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job' }}
    </x-slot>

    <div class="max-md:hidden">
        <x-shop::layouts.account.navigation />
    </div>

    <div class="mx-4 flex-auto">
        <div class="flex items-center gap-x-2.5 mb-8">
            <a href="{{ route('shop.customers.account.jobs.index') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-list"></i> {{ app()->getLocale() === 'ar' ? 'وظائفي' : 'My Jobs' }}
            </a>
            <span class="text-gray-400">|</span>
            <h2 class="text-2xl font-medium">
                {{ app()->getLocale() === 'ar' ? 'إضافة وظيفة جديدة' : 'Add New Job' }}
            </h2>
        </div>

        <form method="POST" action="{{ route('shop.customers.account.jobs.store') }}" class="bg-white rounded-lg border border-zinc-200 p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Job Title -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'عنوان الوظيفة' : 'Job Title' }} *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Job Title Arabic -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'عنوان الوظيفة بالعربية' : 'Job Title (Arabic)' }}</label>
                    <input type="text" name="title_ar" value="{{ old('title_ar') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('title_ar')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'اسم الشركة' : 'Company Name' }} *</label>
                    <input type="text" name="company_name" value="{{ old('company_name', auth('customer')->user()->company_name) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('company_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Company Logo -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'شعار الشركة (رابط)' : 'Company Logo (URL)' }}</label>
                    <input type="url" name="company_logo" value="{{ old('company_logo') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('company_logo')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'الموقع' : 'Location' }} *</label>
                    <input type="text" name="location" value="{{ old('location') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('location')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- City -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'المدينة' : 'City' }} *</label>
                    <input type="text" name="city" value="{{ old('city') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Country -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'البلد' : 'Country' }} *</label>
                    <input type="text" name="country" value="{{ old('country', 'Egypt') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('country')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Job Category -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'تصنيف الوظيفة' : 'Job Category' }} *</label>
                    <select name="job_category_id" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">{{ app()->getLocale() === 'ar' ? 'اختر التصنيف' : 'Select Category' }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('job_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('job_category_id')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Job Type -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'نوع الوظيفة' : 'Job Type' }} *</label>
                    <select name="job_type" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="full-time" {{ old('job_type') == 'full-time' ? 'selected' : '' }}>{{ app()->getLocale() === 'ar' ? 'دوام كامل' : 'Full Time' }}</option>
                        <option value="part-time" {{ old('job_type') == 'part-time' ? 'selected' : '' }}>{{ app()->getLocale() === 'ar' ? 'دوام جزئي' : 'Part Time' }}</option>
                        <option value="contract" {{ old('job_type') == 'contract' ? 'selected' : '' }}>{{ app()->getLocale() === 'ar' ? 'عقد' : 'Contract' }}</option>
                        <option value="freelance" {{ old('job_type') == 'freelance' ? 'selected' : '' }}>{{ app()->getLocale() === 'ar' ? 'عمل حر' : 'Freelance' }}</option>
                    </select>
                    @error('job_type')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Salary Range -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'نطاق الراتب' : 'Salary Range' }}</label>
                    <input type="text" name="salary_range" value="{{ old('salary_range') }}" placeholder="e.g. 15000-25000 EGP"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('salary_range')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Experience Level -->
                <div>
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'مستوى الخبرة' : 'Experience Level' }}</label>
                    <input type="text" name="experience_level" value="{{ old('experience_level') }}" placeholder="e.g. 3-5 years"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('experience_level')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Application URL -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'رابط التقديم' : 'Application URL' }} *</label>
                    <input type="url" name="application_url" value="{{ old('application_url') }}" required
                           placeholder="https://example.com/apply"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('application_url')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>

                <!-- Expires At -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'تاريخ انتهاء الصلاحية' : 'Expires At' }}</label>
                    <input type="date" name="expires_at" value="{{ old('expires_at') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('expires_at')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Job Description -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'وصف الوظيفة' : 'Job Description' }} *</label>
                <textarea name="description" rows="6" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                @error('description')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Job Description Arabic -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'وصف الوظيفة بالعربية' : 'Job Description (Arabic)' }}</label>
                <textarea name="description_ar" rows="6"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description_ar') }}</textarea>
                @error('description_ar')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Requirements -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'المتطلبات' : 'Requirements' }}</label>
                <textarea name="requirements" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('requirements') }}</textarea>
                @error('requirements')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Requirements Arabic -->
            <div class="mt-6">
                <label class="block text-sm font-medium mb-2">{{ app()->getLocale() === 'ar' ? 'المتطلبات بالعربية' : 'Requirements (Arabic)' }}</label>
                <textarea name="requirements_ar" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('requirements_ar') }}</textarea>
                @error('requirements_ar')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-4">
                <button type="submit" class="primary-button px-6 py-3">
                    {{ app()->getLocale() === 'ar' ? 'إنشاء الوظيفة' : 'Create Job' }}
                </button>
                <a href="{{ route('shop.customers.account.jobs.index') }}" class="secondary-button px-6 py-3">
                    {{ app()->getLocale() === 'ar' ? 'إلغاء' : 'Cancel' }}
                </a>
            </div>
        </form>
    </div>
</x-shop::layouts.account>