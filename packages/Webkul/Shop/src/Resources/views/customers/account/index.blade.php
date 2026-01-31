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

    <div class="mx-4">
        <x-shop::layouts.account.navigation />
    </div>

    <span class="mb-5 mt-2 w-full border-t border-zinc-300"></span>

    <div class="mx-4 mb-8">
        <div class="grid gap-4">
            <!-- Account Information -->
            <div class="rounded-lg border border-zinc-200 p-6">
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-xl font-semibold">@lang('shop::app.customers.account.profile.index.title')</h2>
                    <a href="{{ route('shop.customers.account.profile.edit') }}" class="text-navyBlue hover:underline">
                        @lang('shop::app.customers.account.profile.index.edit')
                    </a>
                </div>
                
                <div class="grid gap-3">
                    <div>
                        <span class="text-sm text-gray-600">@lang('shop::app.customers.account.profile.index.first-name'):</span>
                        <span class="ml-2 font-medium">{{ auth()->guard('customer')->user()->first_name }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-600">@lang('shop::app.customers.account.profile.index.last-name'):</span>
                        <span class="ml-2 font-medium">{{ auth()->guard('customer')->user()->last_name }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-600">@lang('shop::app.customers.account.profile.index.email'):</span>
                        <span class="ml-2 font-medium">{{ auth()->guard('customer')->user()->email }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('shop.customers.account.orders.index') }}" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold">@lang('shop::app.customers.account.orders.title')</h3>
                    <p class="text-sm text-gray-600">@lang('shop::app.components.layouts.header.desktop.bottom.orders')</p>
                </a>

                <a href="{{ route('shop.customers.account.addresses.index') }}" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold">@lang('shop::app.customers.account.addresses.index.title')</h3>
                    <p class="text-sm text-gray-600">@lang('shop::app.layouts.address')</p>
                </a>

                <a href="{{ route('shop.customers.account.wishlist.index') }}" class="rounded-lg border border-zinc-200 p-6 hover:border-navyBlue hover:shadow-md transition">
                    <h3 class="mb-2 text-lg font-semibold">@lang('shop::app.customers.account.wishlist.page-title')</h3>
                    <p class="text-sm text-gray-600">@lang('shop::app.layouts.wishlist')</p>
                </a>
            </div>
        </div>
    </div>

</x-shop::layouts.account>