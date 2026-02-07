@php
    $locale = core()->getCurrentLocale();
@endphp

<div class="flex flex-wrap gap-4 px-4 pt-6 pb-4 shadow-sm lg:hidden">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center" style="gap: 8px;">
            @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
                @include('shop::checkout.cart.mini-cart')
            @endif
            <a href="{{ route('shop.search.index') }}" class="px-3 py-1.5 rounded-md bg-navyBlue text-white text-xs font-medium shadow-sm hover:shadow-md transition">السوق</a>
            <a href="{{ route('jobs.index') }}" class="px-3 py-1.5 rounded-md bg-navyBlue text-white text-xs font-bold shadow-sm hover:shadow-md transition">الوظائف</a>
        </div>

        <a href="{{ route('shop.home.index') }}" class="max-h-[30px]" style="margin-left: 15px;" aria-label="Mawgood">
            <img src="{{ bagisto_asset('images/logo.svg') }}" alt="{{ config('app.name') }}" width="131" height="29">
        </a>
    </div>

    <form action="{{ route('shop.search.index') }}" class="flex items-center w-full">
        <label for="organic-search" class="sr-only">@lang('shop::app.components.layouts.header.mobile.search')</label>
        <div class="relative w-full">
            <div class="icon-search pointer-events-none absolute top-3 flex items-center text-2xl max-md:text-xl max-sm:top-2.5 ltr:left-3 rtl:right-3"></div>
            <input type="text" class="block w-full rounded-xl border border-['#E3E3E3'] px-11 py-3.5 text-sm font-medium text-gray-900 max-md:rounded-lg max-md:px-10 max-md:py-3 max-md:font-normal max-sm:text-xs" name="query" value="{{ request('query') }}" placeholder="@lang('shop::app.components.layouts.header.mobile.search-text')" required>
            @if (core()->getConfigData('catalog.products.settings.image_search'))
                @include('shop::search.images.index')
            @endif
        </div>
    </form>
</div>
