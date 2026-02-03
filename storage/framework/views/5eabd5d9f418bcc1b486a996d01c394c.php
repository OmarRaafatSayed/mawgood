<v-time-picker <?php echo e($attributes); ?>>
    <?php echo e($slot); ?>

</v-time-picker>

<?php if (! $__env->hasRenderedOnce('c49bff26-ec79-4e83-a127-850c8f1b2db6')): $__env->markAsRenderedOnce('c49bff26-ec79-4e83-a127-850c8f1b2db6');
$__env->startPush('scripts'); ?>
    <script type="text/x-template" id="v-time-picker-template">
        <span class="w-full relative inline-block">
            <slot></slot>

            <i class="icon-clock text-[24px] text-gray-400 absolute ltr:right-[8px] rtl:left-[8px] top-[50%] -translate-y-[50%]"></i>
        </span>
    </script>

    <script type="module">
        app.component('v-time-picker', {
            template: '#v-time-picker-template',

            data () {
                return {
                    timepicker: null
                };
            },

            mounted () {
                let options = this.setOptions();

                this.activate(options);
            },

            methods: {
                setOptions () {
                    let self = this;

                    return {
                        dateFormat: 'H:i',
                        altFormat: 'H:i',
                        noCalendar: true,
                        altInput: true,
                        enableTime: true,
                        time_24hr: true,

                        onChange: function(selectedDates, timeStr, instance) {
                            self.$emit("onChange", timeStr);
                        }
                    };
                },

                activate (options) {
                    let element = this.$el.getElementsByTagName("input")[0];

                    this.timepicker = new Flatpickr(element, options);
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Admin\src\Resources\views\components\flat-picker\time.blade.php ENDPATH**/ ?>