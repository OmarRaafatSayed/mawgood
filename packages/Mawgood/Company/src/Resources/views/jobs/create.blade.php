<x-shop::layouts>
    <x-slot:title>نشر وظيفة جديدة</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">نشر وظيفة جديدة</h1>

        <form method="POST" action="{{ route('company.jobs.store') }}" class="max-w-2xl bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-bold">عنوان الوظيفة *</label>
                <input type="text" name="title" class="w-full border rounded-lg px-4 py-2" required value="{{ old('title') }}">
                @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الوصف *</label>
                <textarea name="description" rows="6" class="w-full border rounded-lg px-4 py-2" required>{{ old('description') }}</textarea>
                @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الموقع *</label>
                <input type="text" name="location" class="w-full border rounded-lg px-4 py-2" required value="{{ old('location') }}">
                @error('location')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نوع الوظيفة</label>
                <input type="text" name="job_type" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: دوام كامل" value="{{ old('job_type') }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نطاق الراتب</label>
                <input type="text" name="salary_range" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: 5000-7000 ريال" value="{{ old('salary_range') }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">مستوى الخبرة</label>
                <input type="text" name="experience_level" class="w-full border rounded-lg px-4 py-2" placeholder="مثال: 2-5 سنوات" value="{{ old('experience_level') }}">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                نشر الوظيفة
            </button>
        </form>
    </div>
</x-shop::layouts>
