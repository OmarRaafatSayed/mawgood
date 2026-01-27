<x-shop::layouts>
    <x-slot:title>تعديل الوظيفة</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">تعديل الوظيفة</h1>

        <form method="POST" action="{{ route('company.jobs.update', $job->id) }}" class="max-w-2xl bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 font-bold">عنوان الوظيفة *</label>
                <input type="text" name="title" class="w-full border rounded-lg px-4 py-2" required value="{{ old('title', $job->title) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الوصف *</label>
                <textarea name="description" rows="6" class="w-full border rounded-lg px-4 py-2" required>{{ old('description', $job->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الموقع *</label>
                <input type="text" name="location" class="w-full border rounded-lg px-4 py-2" required value="{{ old('location', $job->location) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نوع الوظيفة</label>
                <input type="text" name="job_type" class="w-full border rounded-lg px-4 py-2" value="{{ old('job_type', $job->job_type) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">نطاق الراتب</label>
                <input type="text" name="salary_range" class="w-full border rounded-lg px-4 py-2" value="{{ old('salary_range', $job->salary_range) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">مستوى الخبرة</label>
                <input type="text" name="experience_level" class="w-full border rounded-lg px-4 py-2" value="{{ old('experience_level', $job->experience_level) }}">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                حفظ التعديلات
            </button>
        </form>
    </div>
</x-shop::layouts>
