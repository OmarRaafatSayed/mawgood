<x-admin::layouts>
    <x-slot:title>
        إضافة تاجر جديد
    </x-slot>

    <form method="POST" action="{{ route('admin.vendors.store') }}">
        @csrf
        
        <div class="flex items-center justify-between gap-4 mb-5 max-sm:flex-wrap">
            <div class="grid gap-1.5">
                <p class="text-xl font-bold !leading-normal text-gray-800 dark:text-white">
                    إضافة تاجر جديد
                </p>
                <p class="!leading-normal text-gray-600 dark:text-gray-300">
                    إضافة تاجر جديد إلى النظام
                </p>
            </div>
            
            <div class="flex gap-x-2.5 items-center">
                <button type="submit" class="primary-button">
                    حفظ التاجر
                </button>
            </div>
        </div>

        <div class="bg-white rounded box-shadow dark:bg-gray-900 p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-admin::form.control-group>
                    <x-admin::form.control-group.label class="required">
                        اسم التاجر
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="text"
                        name="name"
                        rules="required"
                        :value="old('name')"
                    />
                    <x-admin::form.control-group.error control-name="name" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label class="required">
                        اسم المتجر
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="text"
                        name="shop_name"
                        rules="required"
                        :value="old('shop_name')"
                    />
                    <x-admin::form.control-group.error control-name="shop_name" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label class="required">
                        البريد الإلكتروني
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="email"
                        name="email"
                        rules="required|email"
                        :value="old('email')"
                    />
                    <x-admin::form.control-group.error control-name="email" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label class="required">
                        كلمة المرور
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="password"
                        name="password"
                        rules="required|min:6"
                    />
                    <x-admin::form.control-group.error control-name="password" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label>
                        رقم الهاتف
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="text"
                        name="phone"
                        :value="old('phone')"
                    />
                    <x-admin::form.control-group.error control-name="phone" />
                </x-admin::form.control-group>

                <x-admin::form.control-group>
                    <x-admin::form.control-group.label>
                        الحالة
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="select"
                        name="status"
                        :value="old('status', 'pending')"
                    >
                        <option value="pending">في الانتظار</option>
                        <option value="approved">موافق عليه</option>
                        <option value="rejected">مرفوض</option>
                        <option value="suspended">معلق</option>
                    </x-admin::form.control-group.control>
                    <x-admin::form.control-group.error control-name="status" />
                </x-admin::form.control-group>
                
                <x-admin::form.control-group class="md:col-span-2">
                    <x-admin::form.control-group.label>
                        وصف المتجر
                    </x-admin::form.control-group.label>
                    <x-admin::form.control-group.control
                        type="textarea"
                        name="shop_description"
                        :value="old('shop_description')"
                        rows="3"
                    />
                    <x-admin::form.control-group.error control-name="shop_description" />
                </x-admin::form.control-group>
            </div>
        </div>
    </form>
</x-admin::layouts>