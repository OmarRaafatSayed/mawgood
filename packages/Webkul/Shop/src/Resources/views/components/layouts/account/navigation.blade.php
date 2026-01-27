@php
    $customer = auth()->guard('customer')->user();
    $vendor = \App\Models\Vendor::where('customer_id', auth('customer')->id())->first();
@endphp

<div class="panel-side journal-scroll grid max-h-[1320px] min-w-[342px] max-w-[380px] grid-cols-[1fr] gap-8 overflow-y-auto overflow-x-hidden max-xl:min-w-[270px] max-md:max-w-full max-md:gap-5">
    <!-- Account Profile Hero Section -->
    <div class="grid grid-cols-[auto_1fr] items-center gap-4 rounded-xl border border-zinc-200 px-5 py-[25px] max-md:py-2.5">
        <div class="">
            <img
                src="{{ $customer->image_url ??  bagisto_asset('images/user-placeholder.png') }}"
                class="h-[60px] w-[60px] rounded-full"
                alt="Profile Image"
            >
        </div>

        <div class="flex flex-col justify-between">
            <p 
                class="text-2xl break-all font-mediums max-md:text-xl"
                v-text="'Hello! {{ $customer->first_name }}'"
            > 
            </p>

            <p class="no-underline max-md:text-md: text-zinc-500">{{ $customer->email }}</p>
        </div>
    </div>

    <!-- Account Navigation Menus -->
    @foreach (menu()->getItems('customer') as $menuItem)
        <div>
            <!-- Account Navigation Toggler -->
            <div class="select-none pb-5 max-md:pb-1.5">
                <p class="text-xl font-medium max-md:text-lg">
                    {{ $menuItem->getName() }}
                </p>
            </div>

            <!-- Account Navigation Content -->
            @if ($menuItem->haveChildren())
                <div class="grid rounded-md border border-b border-l-[1px] border-r border-t-0 border-zinc-200 max-md:border-none">
                    @foreach ($menuItem->getChildren() as $subMenuItem)
                        @if($subMenuItem->getKey() === 'account.jobs')
                            @if(auth('customer')->check() && auth('customer')->user()->user_type === 'company' && !$vendor)
                                <a href="{{ $subMenuItem->getUrl() }}">
                                    <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-zinc-100 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 {{ $subMenuItem->isActive() ? 'bg-zinc-100' : '' }}">
                                        <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base">
                                            <span class="{{ $subMenuItem->getIcon() }} text-2xl"></span>

                                            {{ $subMenuItem->getName() }}
                                        </p>

                                        <span class="text-2xl icon-arrow-right rtl:icon-arrow-left"></span>
                                    </div>
                                </a>
                            @endif
                        @else
                            <a href="{{ $subMenuItem->getUrl() }}">
                                <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-zinc-100 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 {{ $subMenuItem->isActive() ? 'bg-zinc-100' : '' }}">
                                    <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base">
                                        <span class="{{ $subMenuItem->getIcon() }} text-2xl"></span>

                                        {{ $subMenuItem->getName() }}
                                    </p>

                                    <span class="text-2xl icon-arrow-right rtl:icon-arrow-left"></span>
                                </div>
                            </a>
                        @endif
                    @endforeach
                    
                    <!-- Dynamic Vendor Status Button -->
                    @php
                        $vendor = \App\Models\Vendor::where('customer_id', auth('customer')->id())->first();
                    @endphp
                    
                    @if(!$vendor)
                        <!-- Become a Seller -->
                        <a href="{{ route('vendor.onboarding.form') }}">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-emerald-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-emerald-50 to-green-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-emerald-700">
                                    <span class="icon-store text-2xl"></span>
                                    {{ app()->getLocale() === 'ar' ? 'افتتح متجرك الآن' : 'Open Your Store Now' }}
                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-emerald-600"></span>
                            </div>
                        </a>
                    @elseif($vendor->status === 'pending')
                        <!-- Under Review -->
                        <a href="{{ route('vendor.under-review') }}">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-blue-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-blue-50 to-indigo-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-blue-700">
                                    <span class="icon-clock text-2xl"></span>
                                    {{ app()->getLocale() === 'ar' ? 'طلبك تحت المراجعة' : 'Under Review' }}
                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-blue-600"></span>
                            </div>
                        </a>
                    @elseif($vendor->status === 'approved')
                        <!-- Vendor Dashboard -->
                        <a href="{{ route('vendor.dashboard') }}">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-purple-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-purple-50 to-indigo-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-purple-700">
                                    <span class="icon-dashboard text-2xl"></span>
                                    {{ app()->getLocale() === 'ar' ? 'لوحة تحكم التاجر' : 'Vendor Dashboard' }}
                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-purple-600"></span>
                            </div>
                        </a>
                    @elseif($vendor->status === 'rejected')
                        <!-- Reapply -->
                        <a href="{{ route('vendor.onboarding.form') }}">
                            <div class="flex justify-between px-6 py-5 border-t border-zinc-200 hover:bg-orange-50 cursor-pointer max-md:p-4 max-md:border-0 max-md:py-3 max-md:px-0 bg-gradient-to-r from-orange-50 to-red-50">
                                <p class="flex items-center text-lg font-medium gap-x-4 max-sm:text-base text-orange-700">
                                    <span class="icon-refresh text-2xl"></span>
                                    {{ app()->getLocale() === 'ar' ? 'إعادة التقديم' : 'Reapply' }}
                                </p>
                                <span class="text-2xl icon-arrow-right rtl:icon-arrow-left text-orange-600"></span>
                            </div>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    @endforeach
</div>