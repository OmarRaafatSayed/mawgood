<x-shop::layouts>
    <x-slot:title>الملف الشخصي للشركة</x-slot>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">الملف الشخصي للشركة</h1>

        <form method="POST" action="{{ route('company.profile.update') }}" enctype="multipart/form-data" class="max-w-2xl bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-bold">اسم الشركة *</label>
                <input type="text" name="company_name" class="w-full border rounded-lg px-4 py-2" required value="{{ old('company_name', $profile->company_name) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">المجال</label>
                <input type="text" name="industry" class="w-full border rounded-lg px-4 py-2" value="{{ old('industry', $profile->industry) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الوصف</label>
                <textarea name="description" rows="4" class="w-full border rounded-lg px-4 py-2">{{ old('description', $profile->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الموقع الإلكتروني</label>
                <input type="url" name="website" class="w-full border rounded-lg px-4 py-2" value="{{ old('website', $profile->website) }}">
            </div>

            <div class="mb-4">
                <label class="block mb-2 font-bold">الشعار</label>
                <input type="file" name="logo" class="w-full border rounded-lg px-4 py-2" accept="image/*">
                @if($profile->logo)
                    <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="mt-2 h-20">
                @endif
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                حفظ التعديلات
            </button>
        </form>
    </div>
</x-shop::layouts>
