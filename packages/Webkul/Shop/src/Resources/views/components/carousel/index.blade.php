@props(['options'])

<div class="w-full">
    <div class="w-full">
        <img 
            src="{{ asset('illustrations/3.png') }}" 
            alt="Banner Image"
            class="w-full h-auto object-cover aspect-[2.743/1] max-h-screen"
            loading="eager"
            fetchpriority="high"
            onerror="this.src='{{ asset('themes/shop/default/assets/images/logo.svg') }}'"
        />
    </div>
</div>
