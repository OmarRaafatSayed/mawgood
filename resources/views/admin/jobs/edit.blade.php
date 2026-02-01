<x-admin::layouts>
    <x-slot:title>
        تعديل الوظيفة
    </x-slot>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap mb-6">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            تعديل الوظيفة: {{ $job->title }}
        </p>
    </div>

    <form method="POST" action="{{ route('admin.jobs.update', $job->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-lg shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2">عنوان الوظيفة <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ $job->title }}" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">اسم الشركة <span class="text-red-500">*</span></label>
                    <input type="text" name="company_name" value="{{ $job->company_name }}" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">المدينة <span class="text-red-500">*</span></label>
                    <input type="text" name="city" value="{{ $job->city }}" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الفئة <span class="text-red-500">*</span></label>
                    <select name="job_category_id" required class="w-full px-3 py-2 border rounded-md">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $job->job_category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">نوع الوظيفة</label>
                    <select name="job_type" class="w-full px-3 py-2 border rounded-md">
                        <option value="">اختر النوع</option>
                        <option value="full-time" {{ $job->job_type == 'full-time' ? 'selected' : '' }}>دوام كامل</option>
                        <option value="part-time" {{ $job->job_type == 'part-time' ? 'selected' : '' }}>دوام جزئي</option>
                        <option value="contract" {{ $job->job_type == 'contract' ? 'selected' : '' }}>عقد</option>
                        <option value="freelance" {{ $job->job_type == 'freelance' ? 'selected' : '' }}>عمل حر</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">الحالة</label>
                    <select name="status" class="w-full px-3 py-2 border rounded-md">
                        <option value="1" {{ $job->status ? 'selected' : '' }}>نشط</option>
                        <option value="0" {{ !$job->status ? 'selected' : '' }}>غير نشط</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">صورة الوظيفة</label>
                    @if($job->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $job->image) }}" alt="Job Image" class="w-32 h-32 object-cover rounded" />
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border rounded-md" />
                    <p class="text-xs text-gray-500 mt-1">اختياري - اترك فارغاً للإبقاء على الصورة الحالية</p>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">رابط التقديم <span class="text-red-500">*</span></label>
                    <input type="url" name="application_link" value="{{ $job->application_link }}" required class="w-full px-3 py-2 border rounded-md" />
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium mb-2">وصف الوظيفة <span class="text-red-500">*</span></label>
                    <textarea name="description" required rows="5" class="w-full px-3 py-2 border rounded-md">{{ $job->description }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex gap-2">
                <button type="submit" class="primary-button">حفظ التعديلات</button>
                <a href="{{ route('admin.jobs.index') }}" class="secondary-button">إلغاء</a>
            </div>
        </div>
    </form>
</x-admin::layouts>
