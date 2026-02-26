<v-seo-helper <?php echo e($attributes); ?>></v-seo-helper>

<?php if (! $__env->hasRenderedOnce('ad584e9c-b606-4350-b3f1-724fc3f87a1d')): $__env->markAsRenderedOnce('ad584e9c-b606-4350-b3f1-724fc3f87a1d');
$__env->startPush('scripts'); ?>
    <!-- SEO Vue Component Template -->
    <script
        type="text/x-template"
        id="v-seo-helper-template"
    >
        <div class="mb-8 flex flex-col gap-1">
            <p 
                class="text-[#161B9D] dark:text-white"
                v-text="metaTitle"
            >
            </p>

            <!-- SEO Meta Title -->
            <p 
                class="text-[#135F29]"
                v-text="'<?php echo e(URL::to('/')); ?>/' + (slug ? slug + '/' : '') + (metaTitle ? metaTitle.toLowerCase().replace(/\s+/g, '-') : '')"
            >
            </p>

            <!-- SEP Meta Description -->
            <p 
                class="text-gray-600 dark:text-gray-300"
                v-text="metaDescription"
            >
            </p>
        </div>
    </script>

    <script type="module">
        app.component('v-seo-helper', {
            template: '#v-seo-helper-template',

            props: ["slug"],

            data() {
                return {
                    metaTitle: this.$parent.getValues()['meta_title'],

                    metaDescription: this.$parent.getValues()['meta_description'],
                }
            },

            mounted() {
                this.metaTitle = document.getElementById('meta_title').value;

                this.metaDescription = document.getElementById('meta_description').value;

                document.getElementById('meta_title').addEventListener('input', (e) => {
                    this.metaTitle = e.target.value;
                });

                document.getElementById('meta_description').addEventListener('input', (e) => {
                    this.metaDescription = e.target.value;
                });
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Admin\src/resources/views/components/seo/index.blade.php ENDPATH**/ ?>