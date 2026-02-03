<v-tinymce <?php echo e($attributes); ?>></v-tinymce>

<?php if (! $__env->hasRenderedOnce('956be40c-28e4-42d5-9f91-e13ebec04a4a')): $__env->markAsRenderedOnce('956be40c-28e4-42d5-9f91-e13ebec04a4a');
$__env->startPush('scripts'); ?>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.6.2/tinymce.min.js"
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <script
        type="text/x-template"
        id="v-tinymce-template"
    >
    </script>

    <script type="module">
        app.component('v-tinymce', {
            template: '#v-tinymce-template',
                
            props: ['selector', 'field'],

            mounted() {
                this.init();

                this.$emitter.on('change-theme', (theme) => {
                    tinymce.activeEditor.destroy();

                    this.init();
                });
            },

            methods: {
                init() {
                    tinymce.init({
                        selector: this.selector,
                        relative_urls: false,
                        menubar: false,
                        remove_script_host: false,
                        document_base_url: '<?php echo e(asset('/')); ?>',
                        plugins: 'wordcount save fullscreen code table lists link',
                        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor alignleft aligncenter alignright alignjustify | link hr | numlist bullist outdent indent | removeformat | code | table',
                        directionality: "<?php echo e(core()->getCurrentLocale()->direction); ?>",

                        setup: editor => {
                            editor.on('keyup', () => this.field.onInput(editor.getContent()));
                        },
                    });
                },
            },
        })
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src\Resources\views\components\tinymce\index.blade.php ENDPATH**/ ?>