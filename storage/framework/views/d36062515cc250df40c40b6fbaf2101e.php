<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo app('translator')->get('shop::app.customers.login-form.page-title'); ?>"/>

    <meta name="keywords" content="<?php echo app('translator')->get('shop::app.customers.login-form.page-title'); ?>"/>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => false,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.customers.login-form.page-title'); ?>
     <?php $__env->endSlot(); ?>

    <div class="container mt-20 max-1180:px-5 max-md:mt-12">
        <?php echo view_render_event('bagisto.shop.customers.login.logo.before'); ?>


        <!-- Company Logo -->
        <div class="flex items-center gap-x-14 max-[1180px]:gap-x-9">
            <a
                href="<?php echo e(route('shop.home.index')); ?>"
                class="m-[0_auto_20px_auto]"
                aria-label="Mawgood"
            >
                <img
                    src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>"
                    alt="<?php echo e(config('app.name')); ?>"
                    width="131"
                    height="29"
                >
            </a>
        </div>

        <?php echo view_render_event('bagisto.shop.customers.login.logo.after'); ?>


        <!-- Form Container -->
        <div class="m-auto w-full max-w-[870px] rounded-xl border border-zinc-200 p-16 px-[90px] max-md:px-8 max-md:py-8 max-sm:border-none max-sm:p-0">
            <h1 class="font-dmserif text-4xl max-md:text-3xl max-sm:text-xl">
                <?php echo app('translator')->get('shop::app.customers.login-form.page-title'); ?>
            </h1>

            <p class="mt-4 text-xl text-zinc-500 max-sm:mt-0 max-sm:text-sm">
                <?php echo app('translator')->get('shop::app.customers.login-form.form-login-text'); ?>
            </p>

            <?php echo view_render_event('bagisto.shop.customers.login.before'); ?>


            <div class="mt-14 rounded max-sm:mt-8">
                <?php if (isset($component)) { $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.index','data' => ['action' => route('shop.customer.session.create')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customer.session.create'))]); ?>

                    <?php echo view_render_event('bagisto.shop.customers.login_form_controls.before'); ?>


                    <!-- Email -->
                    <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal2f2718777649517fc23f75e819ccd670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f2718777649517fc23f75e819ccd670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                            <?php echo app('translator')->get('shop::app.customers.login-form.email'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $attributes = $__attributesOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__attributesOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $component = $__componentOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__componentOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'email','class' => 'px-6 py-4 max-md:py-3 max-sm:py-2','name' => 'email','rules' => 'required|email','value' => '','label' => trans('shop::app.customers.login-form.email'),'placeholder' => 'email@example.com','ariaLabel' => trans('shop::app.customers.login-form.email'),'ariaRequired' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'email','class' => 'px-6 py-4 max-md:py-3 max-sm:py-2','name' => 'email','rules' => 'required|email','value' => '','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.login-form.email')),'placeholder' => 'email@example.com','aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.login-form.email')),'aria-required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'email']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>

                    <!-- Password -->
                    <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal2f2718777649517fc23f75e819ccd670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f2718777649517fc23f75e819ccd670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                            <?php echo app('translator')->get('shop::app.customers.login-form.password'); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $attributes = $__attributesOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__attributesOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $component = $__componentOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__componentOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'password','class' => 'px-6 py-4 max-md:py-3 max-sm:py-2','id' => 'password','name' => 'password','rules' => 'required|min:6','value' => '','label' => trans('shop::app.customers.login-form.password'),'placeholder' => trans('shop::app.customers.login-form.password'),'ariaLabel' => trans('shop::app.customers.login-form.password'),'ariaRequired' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'password','class' => 'px-6 py-4 max-md:py-3 max-sm:py-2','id' => 'password','name' => 'password','rules' => 'required|min:6','value' => '','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.login-form.password')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.login-form.password')),'aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('shop::app.customers.login-form.password')),'aria-required' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>

                    <div class="flex justify-between">
                        <div class="flex select-none items-center gap-1.5">
                            <input
                                type="checkbox"
                                id="show-password"
                                class="peer hidden"
                                onchange="switchVisibility()"
                            />

                            <label
                                class="icon-uncheck peer-checked:icon-check-box cursor-pointer text-2xl text-navyBlue peer-checked:text-navyBlue max-sm:text-xl"
                                for="show-password"
                            ></label>

                            <label
                                class="cursor-pointer select-none text-base text-zinc-500 max-sm:text-sm ltr:pl-0 rtl:pr-0"
                                for="show-password"
                            >
                                <?php echo app('translator')->get('shop::app.customers.login-form.show-password'); ?>
                            </label>
                        </div>

                        <div class="block">
                            <a
                                href="<?php echo e(route('shop.customers.forgot_password.create')); ?>"
                                class="cursor-pointer text-base text-black max-sm:text-sm"
                            >
                                <span>
                                    <?php echo app('translator')->get('shop::app.customers.login-form.forgot-pass'); ?>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Captcha -->
                    <?php if(core()->getConfigData('customer.captcha.credentials.status')): ?>
                        <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => ['class' => 'mt-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-5']); ?>
                            <?php echo \Webkul\Customer\Facades\Captcha::render(); ?>


                            <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'g-recaptcha-response']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'g-recaptcha-response']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <!-- Submit Button -->
                    <div class="mt-8 flex flex-wrap items-center gap-9 max-sm:justify-center max-sm:gap-5 max-sm:text-center">
                        <button
                            class="primary-button m-0 mx-auto block w-full max-w-[374px] rounded-2xl px-11 py-4 text-center text-base max-md:max-w-full max-md:rounded-lg max-md:py-3 max-sm:py-1.5 ltr:ml-0 rtl:mr-0"
                            type="submit"
                        >
                            <?php echo app('translator')->get('shop::app.customers.login-form.button-title'); ?>
                        </button>

                        <?php echo view_render_event('bagisto.shop.customers.login_form_controls.after'); ?>

                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $attributes = $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $component = $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
            </div>

            <?php echo view_render_event('bagisto.shop.customers.login.after'); ?>


            <!-- Social Login -->
            <div class="mt-8">
                <div class="relative flex items-center justify-center">
                    <hr class="w-full border-zinc-200">
                    <span class="absolute bg-white px-4 text-sm text-zinc-500">
                        <?php echo app('translator')->get('shop::app.customers.login-form.or'); ?>
                    </span>
                </div>

                <div class="mt-6 flex flex-col gap-3">
                    <!-- Google Login -->
                    <a href="<?php echo e(route('customer.social-login.index', 'google')); ?>"
                       class="flex items-center justify-center gap-3 rounded-xl border border-zinc-300 px-6 py-3 transition-all hover:bg-zinc-50">
                        <svg class="h-5 w-5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        <span class="font-medium text-zinc-700">تسجيل الدخول بـ Google</span>
                    </a>

                    <!-- Facebook Login -->
                    <a href="<?php echo e(route('customer.social-login.index', 'facebook')); ?>"
                       class="flex items-center justify-center gap-3 rounded-xl border border-zinc-300 bg-[#1877F2] px-6 py-3 text-white transition-all hover:bg-[#166FE5]">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span class="font-medium">تسجيل الدخول بـ Facebook</span>
                    </a>
                </div>
            </div>

            <p class="mt-5 font-medium text-zinc-500 max-sm:text-center max-sm:text-sm">
                <?php echo app('translator')->get('shop::app.customers.login-form.new-customer'); ?>

                <a
                    class="text-navyBlue"
                    href="<?php echo e(route('shop.customers.register.index')); ?>"
                >
                    <?php echo app('translator')->get('shop::app.customers.login-form.create-your-account'); ?>
                </a>
            </p>
        </div>

        <p class="mb-4 mt-8 text-center text-xs text-zinc-500">
            <?php echo app('translator')->get('shop::app.customers.login-form.footer', ['current_year'=> date('Y') ]); ?>
        </p>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <?php echo \Webkul\Customer\Facades\Captcha::renderJS(); ?>


        <script>
            function switchVisibility() {
                let passwordField = document.getElementById("password");

                passwordField.type = passwordField.type === "password"
                    ? "text"
                    : "password";
            }
        </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/customers/sign-in.blade.php ENDPATH**/ ?>