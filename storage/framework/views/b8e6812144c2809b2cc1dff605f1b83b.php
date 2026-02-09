<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => true,'hasFeature' => false,'hasFooter' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => true,'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => true]); ?>
     <?php $__env->slot('title', null, []); ?> 
		<?php echo app('translator')->get('shop::app.checkout.success.thanks'); ?>
     <?php $__env->endSlot(); ?>

	<div class="container mt-8 px-4 md:px-8 lg:px-16 pb-12">
		<div class="max-w-3xl mx-auto">
			<!-- Success Icon -->
			<div class="text-center mb-6">
				<div class="inline-flex items-center justify-center w-20 h-20 md:w-24 md:h-24 bg-green-100 rounded-full mb-4">
					<svg class="w-12 h-12 md:w-16 md:h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
					</svg>
				</div>
				<h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">
					شكراً لك على طلبك!
				</h1>
				<p class="text-lg md:text-xl text-gray-600">
					تم تأكيد طلبك بنجاح
				</p>
			</div>

			<!-- Delivery Timeline - Priority Section -->
			<div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-300 rounded-lg p-6 mb-6 shadow-sm">
				<div class="flex items-start gap-3">
					<svg class="w-8 h-8 text-blue-600 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
					</svg>
					<div>
						<h2 class="text-xl md:text-2xl font-bold text-blue-900 mb-2">موعد التوصيل المتوقع</h2>
						<p class="text-lg md:text-xl text-blue-800 font-semibold">
							سيصل طلبك خلال 2 إلى 4 أيام عمل
						</p>
					</div>
				</div>
			</div>

			<!-- Order Details -->
			<div class="bg-white border border-gray-200 rounded-lg p-6 mb-6 shadow-sm">
				<h3 class="text-lg font-semibold text-gray-900 mb-4 border-b pb-2">تفاصيل الطلب</h3>
				<div class="space-y-3">
					<div class="flex justify-between items-center">
						<span class="text-gray-600">رقم الطلب:</span>
						<span class="font-semibold text-gray-900">
							<?php if(auth()->guard('customer')->check()): ?>
								<a class="text-blue-600 hover:text-blue-800 underline" href="<?php echo e(route('shop.customers.account.orders.view', $order->id)); ?>">
									#<?php echo e($order->increment_id); ?>

								</a>
							<?php else: ?>
								#<?php echo e($order->increment_id); ?>

							<?php endif; ?>
						</span>
					</div>
					<div class="flex justify-between items-center">
						<span class="text-gray-600">إجمالي المبلغ:</span>
						<span class="font-bold text-xl text-green-600"><?php echo e(core()->formatPrice($order->grand_total)); ?></span>
					</div>
					<div class="flex justify-between items-center">
						<span class="text-gray-600">تاريخ الطلب:</span>
						<span class="font-medium text-gray-900"><?php echo e(core()->formatDate($order->created_at, 'd/m/Y')); ?></span>
					</div>
				</div>
			</div>

			<!-- Customer Next Steps -->
			<div class="bg-gray-50 border border-gray-200 rounded-lg p-6 mb-6">
				<h3 class="text-lg font-semibold text-gray-900 mb-4">الخطوات التالية</h3>
				<div class="flex flex-col sm:flex-row gap-3">
					<a href="<?php echo e(route('shop.home.index')); ?>" class="flex-1">
						<button class="w-full bg-navyBlue hover:bg-blue-800 text-white font-medium py-3 px-6 rounded-lg transition duration-200 shadow-sm">
							متابعة التسوق
						</button>
					</a>
					<?php if(auth()->guard('customer')->check()): ?>
						<a href="<?php echo e(route('shop.customers.account.orders.index')); ?>" class="flex-1">
							<button class="w-full bg-white hover:bg-gray-50 text-navyBlue border-2 border-navyBlue font-medium py-3 px-6 rounded-lg transition duration-200 shadow-sm">
								عرض طلباتي
							</button>
						</a>
					<?php endif; ?>
				</div>
			</div>

			<!-- Support Section -->
			<div class="bg-yellow-50 border border-yellow-200 rounded-lg p-5 text-center">
				<p class="text-gray-700 mb-2">
					<span class="font-semibold">هل لديك أي استفسار؟</span>
				</p>
				<p class="text-gray-600 text-sm">
					يرجى التواصل معنا عبر واتساب أو البريد الإلكتروني
				</p>
			</div>
		</div>
	</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/checkout/success.blade.php ENDPATH**/ ?>