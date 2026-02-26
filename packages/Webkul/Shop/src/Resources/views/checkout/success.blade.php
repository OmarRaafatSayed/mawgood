@push('styles')
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Manrope', 'Tajawal', sans-serif; background: #f5f7f8; }
        @keyframes successPulse {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }
        .success-icon { animation: successPulse 0.6s ease-out; }
    </style>
@endPush

<x-shop::layouts
	:has-header="false"
	:has-feature="false"
	:has-footer="false"
>
    <x-slot:title>
		@lang('shop::app.checkout.success.thanks')
    </x-slot>

	<!-- Modern Header -->
	<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-[#FF6B00]/5">
		<div class="container mx-auto px-4 py-3">
			<div class="flex items-center justify-center">
				<a href="{{ route('shop.home.index') }}" class="flex items-center">
					<img src="{{ core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg') }}" alt="{{ config('app.name') }}" class="h-8">
				</a>
			</div>
		</div>
	</header>

	<div class="min-h-screen flex items-center justify-center py-12 px-4">
		<div class="max-w-2xl w-full">
			<div class="bg-white rounded-2xl p-8 md:p-12 shadow-sm border border-slate-100 text-center">
				<!-- Success Icon -->
				<div class="success-icon w-20 h-20 mx-auto mb-6 bg-[#FF6B00] rounded-full flex items-center justify-center">
					<span class="material-symbols-outlined text-6xl text-white">check_circle</span>
				</div>
				<h1 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
					تم تأكيد طلبك بنجاح!
				</h1>
				<p class="text-lg text-gray-600 mb-8">
					شكراً لك على ثقتك بنا. سيتم معالجة طلبك في أقرب وقت ممكن.
				</p>

				<!-- Order Details -->
				<div class="bg-gray-50 rounded-2xl p-6 mb-8 text-right">
					<div class="grid md:grid-cols-2 gap-4">
						<div>
							<p class="text-sm text-gray-500 mb-1">رقم الطلب</p>
							<p class="text-xl font-bold text-slate-800">
								@if (auth()->guard('customer')->check())
									<a class="text-[#FF6B00] hover:text-[#E65F00]" href="{{ route('shop.customers.account.orders.view', $order->id) }}">
										#{{ $order->increment_id }}
									</a>
								@else
									#{{ $order->increment_id }}
								@endif
							</p>
						</div>
						<div>
							<p class="text-sm text-gray-500 mb-1">إجمالي المبلغ</p>
							<p class="text-xl font-bold text-[#FF6B00]">{{ core()->formatPrice($order->grand_total) }}</p>
						</div>
						<div>
							<p class="text-sm text-gray-500 mb-1">تاريخ الطلب</p>
							<p class="text-base font-semibold text-slate-800">{{ core()->formatDate($order->created_at, 'd/m/Y') }}</p>
						</div>
						<div>
							<p class="text-sm text-gray-500 mb-1">حالة الطلب</p>
							<span class="inline-block px-3 py-1 bg-[#FF6B00] text-white text-xs font-bold rounded-full">{{ $order->status_label }}</span>
						</div>
					</div>
				</div>

				<!-- Action Buttons -->
				<div class="flex flex-col md:flex-row gap-4 justify-center">
					@if (auth()->guard('customer')->check())
						<a href="{{ route('shop.customers.account.orders.view', $order->id) }}" class="px-8 py-3 bg-[#FF6B00] text-white rounded-full font-bold hover:bg-[#E65F00] transition-colors flex items-center justify-center gap-2">
							<span class="material-symbols-outlined">receipt_long</span>
							<span>عرض تفاصيل الطلب</span>
						</a>
					@endif
					<a href="{{ route('shop.home.index') }}" class="px-8 py-3 border-2 border-[#FF6B00] text-[#FF6B00] rounded-full font-bold hover:bg-[#FF6B00] hover:text-white transition-colors flex items-center justify-center gap-2">
						<span class="material-symbols-outlined">home</span>
						<span>العودة للرئيسية</span>
					</a>
				</div>

				<!-- Support Section -->
				<div class="mt-8 pt-8 border-t border-gray-200">
					<div class="flex items-center justify-center gap-2 text-gray-600">
						<span class="material-symbols-outlined text-[#FF6B00]">mail</span>
						<p class="text-sm">
							تم إرسال تأكيد الطلب إلى بريدك الإلكتروني
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-shop::layouts>
