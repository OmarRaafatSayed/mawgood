<?php if (! $__env->hasRenderedOnce('f680d10d-3c62-42f4-812c-28cb995ed43a')): $__env->markAsRenderedOnce('f680d10d-3c62-42f4-812c-28cb995ed43a');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-empty-info-template"
    >
        <div class="grid justify-center justify-items-center gap-3.5 px-2.5 py-10">
            <img
                class="h-20 w-20 flex items-center justify-center"><span class="text-4xl text-gray-400">??</span></div><div style="display:none">

            <div class="flex flex-col items-center gap-2">
                <p
                    class="text-base font-semibold text-gray-400"
                    v-if="type == 'event'"
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.empty-info.tickets.add'); ?>
                </p>

                <p
                    class="text-base font-semibold text-gray-400"
                    v-else
                >
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.empty-info.slots.add'); ?>
                </p>

                <p class="text-gray-400">
                    <?php echo app('translator')->get('admin::app.catalog.products.edit.types.booking.empty-info.slots.description'); ?>
                </p>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-empty-info', {
            template: '#v-empty-info-template',

            props: ['type'],
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Admin\src\Resources\views\catalog\products\edit\types\booking\empty-info.blade.php ENDPATH**/ ?>