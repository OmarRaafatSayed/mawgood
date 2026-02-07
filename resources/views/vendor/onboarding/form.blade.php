<x-shop::layouts>
    <x-slot:title>
        {{ __('Become a Vendor') }}
    </x-slot>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">{{ __('Vendor Application') }}</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vendor.onboarding.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf

            <!-- Store Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">{{ __('Store Information') }}</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_name">
                        {{ __('Store Name') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="store_name" id="store_name" value="{{ old('store_name') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_description">
                        {{ __('Store Description') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea name="store_description" id="store_description" rows="4" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('store_description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">
                        {{ __('Primary Category') }} <span class="text-red-500">*</span>
                    </label>
                    <select name="category_id" id="category_id" 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">{{ __('Select Category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="store_logo">
                        {{ __('Store Logo') }}
                    </label>
                    <input type="file" name="store_logo" id="store_logo" accept="image/*"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Business Information -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">{{ __('Business Information') }}</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_name">
                        {{ __('Business Name') }}
                    </label>
                    <input type="text" name="business_name" id="business_name" value="{{ old('business_name') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tax_id">
                        {{ __('Tax ID / Commercial Registration') }}
                    </label>
                    <input type="text" name="tax_id" id="tax_id" value="{{ old('tax_id') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_email">
                        {{ __('Business Email') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="business_email" id="business_email" value="{{ old('business_email') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_phone">
                        {{ __('Business Phone') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="business_phone" id="business_phone" value="{{ old('business_phone') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_address">
                        {{ __('Business Address') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea name="business_address" id="business_address" rows="3" 
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('business_address') }}</textarea>
                </div>
            </div>

            <!-- Social Media -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">{{ __('Social Media (Optional)') }}</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="facebook_url">
                        {{ __('Facebook URL') }}
                    </label>
                    <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="instagram_url">
                        {{ __('Instagram URL') }}
                    </label>
                    <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url') }}" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Submit Application') }}
                </button>
            </div>
        </form>
    </div>
</div>
</x-shop::layouts>
