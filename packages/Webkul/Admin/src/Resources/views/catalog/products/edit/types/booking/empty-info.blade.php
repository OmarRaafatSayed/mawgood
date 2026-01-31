@pushOnce('scripts')
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
                    @lang('admin::app.catalog.products.edit.types.booking.empty-info.tickets.add')
                </p>

                <p
                    class="text-base font-semibold text-gray-400"
                    v-else
                >
                    @lang('admin::app.catalog.products.edit.types.booking.empty-info.slots.add')
                </p>

                <p class="text-gray-400">
                    @lang('admin::app.catalog.products.edit.types.booking.empty-info.slots.description')
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
@endpushOnce
