<x-shop::layouts.account>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.customers.account.profile.index.title')
    </x-slot>

    <!-- Breadcrumbs -->
    @if ((core()->getConfigData('general.general.breadcrumbs.shop')))
        @section('breadcrumbs')
            <x-shop::breadcrumbs name="profile" />
        @endSection
    @endif

    <div class="max-md:hidden">
        <x-shop::layouts.account.navigation />
    </div>

    <div class="flex-auto mx-4 max-md:mx-6 max-sm:mx-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <!-- Back Button -->
                <a
                    class="grid md:hidden"
                    href="{{ route('shop.customers.account.index') }}"
                >
                    <span class="text-2xl icon-arrow-left rtl:icon-arrow-right"></span>
                </a>

                <h2 class="text-2xl font-medium max-md:text-xl max-sm:text-base ltr:ml-2.5 md:ltr:ml-0 rtl:mr-2.5 md:rtl:mr-0">
                    @lang('shop::app.customers.account.profile.index.title')
                </h2>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.before') !!}

            <div class="flex items-center gap-3">
                @php
                    $vendor = \App\Models\Vendor::where('customer_id', $customer->id)->first();
                @endphp
                
                @if(!$vendor)
                    <!-- Become a Seller Button -->
                    <a
                        href="{{ route('vendor.onboarding.form') }}"
                        class="flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-600 text-white px-6 py-3 rounded-2xl font-medium shadow-lg hover:shadow-xl hover:from-emerald-700 hover:to-green-700 transition-all duration-200 max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                    >
                        <i class="fas fa-store text-sm"></i>
                        {{ app()->getLocale() === 'ar' ? 'افتح متجرك' : 'Open Your Store' }}
                    </a>
                @elseif($vendor->status === 'pending')
                    <!-- Under Review Status -->
                    <a
                        href="{{ route('vendor.under-review') }}"
                        class="flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-2xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                    >
                        <i class="fas fa-clock text-sm"></i>
                        {{ app()->getLocale() === 'ar' ? 'قيد المراجعة' : 'Under Review' }}
                    </a>
                @elseif($vendor->status === 'approved')
                    <!-- Go to Dashboard -->
                    <a
                        href="{{ route('vendor.dashboard') }}"
                        class="flex items-center gap-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-2xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                    >
                        <i class="fas fa-tachometer-alt text-sm"></i>
                        {{ app()->getLocale() === 'ar' ? 'لوحة التحكم' : 'Seller Dashboard' }}
                    </a>
                @elseif($vendor->status === 'rejected')
                    <!-- Reapply Button -->
                    <a
                        href="{{ route('vendor.onboarding.form') }}"
                        class="flex items-center gap-2 bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-2xl font-medium shadow-lg hover:shadow-xl transition-all duration-200 max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                    >
                        <i class="fas fa-redo text-sm"></i>
                        {{ app()->getLocale() === 'ar' ? 'إعادة التقديم' : 'Reapply' }}
                    </a>
                @endif

                <a
                    href="{{ route('shop.customers.account.profile.edit') }}"
                    class="secondary-button border-zinc-200 px-5 py-3 font-normal max-md:rounded-lg max-md:py-2 max-sm:py-1.5 max-sm:text-sm"
                >
                    @lang('shop::app.customers.account.profile.index.edit')
                </a>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit_button.after') !!}
        </div>

        <!-- Profile Information -->
        <div class="grid grid-cols-1 mt-8 gap-y-6 max-md:mt-5 max-sm:gap-y-4">
            {!! view_render_event('bagisto.shop.customers.account.profile.first_name.before') !!}

            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    @lang('shop::app.customers.account.profile.index.first-name')
                </p>

                <p class="text-sm font-medium text-zinc-500" v-pre>
                    {{ $customer->first_name }}
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.first_name.after') !!}

            {!! view_render_event('bagisto.shop.customers.account.profile.last_name.before') !!}

            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    @lang('shop::app.customers.account.profile.index.last-name')
                </p>

                <p class="text-sm font-medium text-zinc-500" v-pre>
                    {{ $customer->last_name }}
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.last_name.after') !!}

            {!! view_render_event('bagisto.shop.customers.account.profile.gender.before') !!}

            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    @lang('shop::app.customers.account.profile.index.gender')
                </p>

                <p class="text-sm font-medium text-zinc-500">
                    {{ $customer->gender ?? '-'}}
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.gender.after') !!}

            {!! view_render_event('bagisto.shop.customers.account.profile.date_of_birth.before') !!}

            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    @lang('shop::app.customers.account.profile.index.dob')
                </p>

                <p class="text-sm font-medium text-zinc-500">
                    {{ $customer->date_of_birth ?? '-' }}
                </p>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.date_of_birth.after') !!}

            {!! view_render_event('bagisto.shop.customers.account.profile.email.before') !!}

            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    @lang('shop::app.customers.account.profile.index.email')
                </p>

                <p class="text-sm font-medium no-underline text-zinc-500">
                    {{ $customer->email }}
                </p>
            </div>
            
            {!! view_render_event('bagisto.shop.customers.account.profile.email.after') !!}

            <!-- User Type -->
            <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                <p class="text-sm font-medium">
                    {{ app()->getLocale() === 'ar' ? 'نوع الحساب' : 'Account Type' }}
                </p>

                <p class="text-sm font-medium text-zinc-500">
                    @if($customer->user_type === 'company')
                        {{ app()->getLocale() === 'ar' ? 'شركة' : 'Company' }}
                    @elseif($customer->user_type === 'vendor')
                        {{ app()->getLocale() === 'ar' ? 'بائع متجر' : 'Store Vendor' }}
                    @else
                        {{ app()->getLocale() === 'ar' ? 'عميل عادي' : 'Regular Customer' }}
                    @endif
                </p>
            </div>

            @if($customer->company_name)
                <!-- Company Name -->
                <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                    <p class="text-sm font-medium">
                        {{ app()->getLocale() === 'ar' ? 'اسم الشركة' : 'Company Name' }}
                    </p>

                    <p class="text-sm font-medium text-zinc-500">
                        {{ $customer->company_name }}
                    </p>
                </div>
            @endif

            @if($customer->company_description)
                <!-- Company Description -->
                <div class="grid w-full grid-cols-[2fr_3fr] border-b border-zinc-200 px-8 py-3 max-md:px-0">
                    <p class="text-sm font-medium">
                        {{ app()->getLocale() === 'ar' ? 'وصف الشركة' : 'Company Description' }}
                    </p>

                    <p class="text-sm font-medium text-zinc-500">
                        {{ $customer->company_description }}
                    </p>
                </div>
            @endif

            {!! view_render_event('bagisto.shop.customers.account.profile.delete.before') !!}

            <!-- Profile Delete modal -->
            <x-shop::form action="{{ route('shop.customers.account.profile.destroy') }}">
                <x-shop::modal>
                    <x-slot:toggle>
                        <div class="py-3 primary-button rounded-2xl px-11 max-md:hidden max-md:rounded-lg">
                            @lang('shop::app.customers.account.profile.index.delete-profile')
                        </div>

                        <div class="rounded-2xl py-3 text-center font-medium text-red-500 max-md:w-full max-md:max-w-full max-md:py-1.5 md:hidden">
                            @lang('shop::app.customers.account.profile.index.delete-profile')
                        </div>
                    </x-slot>

                    <x-slot:header>
                        <h2 class="text-2xl font-medium max-md:text-base">
                            @lang('shop::app.customers.account.profile.index.enter-password')
                        </h2>
                    </x-slot>

                    <x-slot:content>
                        <x-shop::form.control-group class="!mb-0">
                            <x-shop::form.control-group.control
                                type="password"
                                name="password"
                                class="px-6 py-4"
                                rules="required"
                                placeholder="Enter your password"
                            />

                            <x-shop::form.control-group.error
                                class="text-left"
                                control-name="password"
                            />
                        </x-shop::form.control-group>
                    </x-slot>

                    <!-- Modal Footer -->
                    <x-slot:footer>
                        <button
                            type="submit"
                            class="flex py-3 primary-button rounded-2xl px-11 max-md:rounded-lg max-md:px-6 max-md:text-sm"
                        >
                            @lang('shop::app.customers.account.profile.index.delete')
                        </button>
                    </x-slot>
                </x-shop::modal>
            </x-shop::form>

            {!! view_render_event('bagisto.shop.customers.account.profile.delete.after') !!}

        </div>
    </div>
</x-shop::layouts.account>
