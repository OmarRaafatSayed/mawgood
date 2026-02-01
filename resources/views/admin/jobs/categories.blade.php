<x-admin::layouts>
    <x-slot:title>
        فئات الوظائف
    </x-slot>

    <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            فئات الوظائف
        </p>

        <div class="flex gap-x-2.5 items-center">
            <button 
                type="button"
                class="primary-button"
                onclick="document.getElementById('categoryModal').style.display='block'"
            >
                + إضافة فئة
            </button>
        </div>
    </div>

    <div class="mt-8">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>Slug</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <span class="badge {{ $category->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $category->status ? 'نشط' : 'غير نشط' }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">لا توجد فئات</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="categoryModal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.4);">
        <div style="background-color:#fefefe; margin:10% auto; padding:20px; border:1px solid #888; width:50%; border-radius:8px;">
            <span onclick="document.getElementById('categoryModal').style.display='none'" style="color:#aaa; float:right; font-size:28px; font-weight:bold; cursor:pointer;">&times;</span>
            
            <h2 class="text-lg font-bold mb-4">إضافة فئة جديدة</h2>
            
            <form method="POST" action="{{ route('admin.jobs.categories.store') }}">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">الاسم <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Slug <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="slug" 
                        required 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="primary-button">
                        حفظ
                    </button>
                    <button type="button" onclick="document.getElementById('categoryModal').style.display='none'" class="secondary-button">
                        إلغاء
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin::layouts>
