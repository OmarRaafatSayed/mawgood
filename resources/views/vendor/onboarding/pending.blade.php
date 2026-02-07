<x-shop::layouts>
    <x-slot:title>
        {{ __('Pending Approval') }}
    </x-slot>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-white shadow-md rounded-lg p-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6">
                <svg class="mx-auto h-16 w-16 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <h1 class="text-3xl font-bold mb-4">{{ __('Pending Approval') }}</h1>
            
            <p class="text-gray-600 mb-6 text-lg">
                {{ __('Your store application has been received. Please wait for admin approval.') }}
            </p>
            
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <h2 class="font-semibold mb-2">{{ __('Application Details') }}</h2>
                <div class="text-left">
                    <p class="mb-2"><strong>{{ __('Store Name') }}:</strong> {{ $vendor->store_name }}</p>
                    <p class="mb-2"><strong>{{ __('Status') }}:</strong> 
                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-yellow-100 text-yellow-800">
                            {{ ucfirst($vendor->status) }}
                        </span>
                    </p>
                    <p><strong>{{ __('Submitted') }}:</strong> {{ $vendor->created_at->format('M d, Y') }}</p>
                </div>
            </div>
            
            <p class="text-sm text-gray-500">
                {{ __('You will receive an email notification once your application has been reviewed. This typically takes 1-3 business days.') }}
            </p>
            
            <div class="mt-6">
                <a href="{{ route('shop.customers.account.profile.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ __('Back to Profile') }}
                </a>
            </div>
        </div>
    </div>
</div>
</x-shop::layouts>
