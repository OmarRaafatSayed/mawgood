<v-shimmer-image <?php echo e($attributes); ?>>
    <div <?php echo e($attributes->merge(['class' => 'shimmer'])); ?>></div>
</v-shimmer-image>

<?php if (! $__env->hasRenderedOnce('5d3b32b0-a017-4f29-a8f8-46e96fba66f7')): $__env->markAsRenderedOnce('5d3b32b0-a017-4f29-a8f8-46e96fba66f7');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-shimmer-image-template"
    >
        <div
            :id="'image-shimmer-' + $.uid"
            class="shimmer"
            v-bind="$attrs"
            v-if="isLoading"
        >
        </div>

        <img
            v-bind="$attrs"
            :data-src="src"
            :id="'image-' + $.uid"
            loading="lazy"
            decoding="async"
            fetchpriority="low"
            @load="onLoad"
            <?php $__errorArgs = [];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>="onError"
            v-show="! isLoading"
            v-if="lazy"
        >

        <img
            v-bind="$attrs"
            :src="src"
            :id="'image-' + $.uid"
            loading="eager"
            decoding="sync"
            fetchpriority="high"
            @load="onLoad"
            <?php $__errorArgs = [];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>="onError"
            v-else
            v-show="! isLoading"
        >
    </script>

    <script type="module">
        app.component('v-shimmer-image', {
            template: '#v-shimmer-image-template',

            props: {
                lazy: {
                    type: Boolean,
                    default: true,
                },

                src: {
                    type: String,
                    default: '',
                },
            },

            data() {
                return {
                    isLoading: true,
                    hasError: false,
                };
            },

            mounted() {
                let self = this;

                if (! this.lazy) {
                    return;
                }

                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = document.getElementById('image-' + self.$.uid);

                            lazyImage.src = lazyImage.dataset.src;

                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImageObserver.observe(document.getElementById('image-shimmer-' + this.$.uid));
            },

            methods: {
                onLoad() {
                    this.isLoading = false;
                },

                onError() {
                    this.isLoading = false;
                    this.hasError = true;
                    console.warn('Image failed to load:', this.src);
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\resources\themes\mawgood\views\components\media\images\lazy.blade.php ENDPATH**/ ?>