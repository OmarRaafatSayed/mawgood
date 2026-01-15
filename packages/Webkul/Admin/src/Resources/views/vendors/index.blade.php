<x-admin::layouts>
    <x-slot:title>
        إدارة التجار
    </x-slot>

    <div class="flex items-center justify-between gap-4 mb-5 max-sm:flex-wrap">
        <div class="grid gap-1.5">
            <p class="text-xl font-bold !leading-normal text-gray-800 dark:text-white">
                إدارة التجار
            </p>
            <p class="!leading-normal text-gray-600 dark:text-gray-300">
                إدارة وعرض جميع التجار المسجلين في النظام
            </p>
        </div>
        
        <div class="flex gap-x-2.5 items-center">
            <a 
                href="{{ route('admin.vendors.create') }}" 
                class="primary-button"
            >
                إضافة تاجر جديد
            </a>
        </div>
    </div>

    <div class="bg-white rounded box-shadow dark:bg-gray-900">
        <x-admin::datagrid :src="route('admin.vendors.index')" />
    </div>
</x-admin::layouts>