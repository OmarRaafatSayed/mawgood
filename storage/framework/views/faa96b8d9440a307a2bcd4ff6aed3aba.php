<?php
    $searchTitle = $suggestion ?? $query;
    $title = $searchTitle ? trans('shop::app.search.title', ['query' => $searchTitle]) : trans('shop::app.search.results');
    $searchInstead = $suggestion ? $query : null;
?>

<?php $__env->startPush('meta'); ?>
    <meta name="description" content="<?php echo e($title); ?>"/>
    <meta name="keywords" content="<?php echo e($title); ?>"/>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasFeature' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
     <?php $__env->slot('title', null, []); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>

    <div class="search-page">
        <!-- Header Section -->
        <div class="search-header">
            <div class="search-header__content">
                <h1 class="search-header__title"><?php echo e($title); ?></h1>
                
                <?php if($searchInstead): ?>
                    <form action="<?php echo e(route('shop.search.index', ['suggest' => false])); ?>" class="search-header__suggest">
                        <input type="hidden" name="query" value="<?php echo e($searchInstead); ?>">
                        <input type="hidden" name="suggest" value="0">
                        <p>
                            <?php echo e(trans('shop::app.search.suggest')); ?>

                            <button type="submit" class="search-header__suggest-link"><?php echo e($searchInstead); ?></button>
                        </p>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Main Content -->
        <v-search>
            <?php if (isset($component)) { $__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.categories.view','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.categories.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f)): ?>
<?php $attributes = $__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f; ?>
<?php unset($__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f)): ?>
<?php $component = $__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f; ?>
<?php unset($__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f); ?>
<?php endif; ?>
        </v-search>
    </div>

    <?php if (! $__env->hasRenderedOnce('e61b945f-9bd3-46f1-acd6-1a9c3f60e844')): $__env->markAsRenderedOnce('e61b945f-9bd3-46f1-acd6-1a9c3f60e844');
$__env->startPush('scripts'); ?>
        <script type="text/x-template" id="v-search-template">
            <div class="search-container">
                <div class="search-layout">
                    <!-- Products Section -->
                    <main class="search-main">
                        <!-- Toolbar -->
                        <div class="search-toolbar">
                            <div class="search-toolbar__actions">
                                <?php echo $__env->make('shop::categories.toolbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            </div>
                        </div>

                        <!-- Products Grid -->
                        <div class="search-products">
                            <!-- Loading State -->
                            <template v-if="isLoading">
                                <div class="search-products__grid">
                                    <?php if (isset($component)) { $__componentOriginal63d85b8bc2d72394bd433a79cbb59384 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.products.cards.grid','data' => ['count' => '12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.products.cards.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $attributes = $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $component = $__componentOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
                                </div>
                            </template>

                            <!-- Products List -->
                            <template v-else-if="products.length">
                                <div class="search-products__grid" :class="gridClass">
                                    <?php if (isset($component)) { $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.card','data' => [':mode' => 'currentMode','vFor' => 'product in products','navigationLink' => route('shop.search.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':mode' => 'currentMode','v-for' => 'product in products','navigation-link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.search.index'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $attributes = $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $component = $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
                                </div>

                                <!-- Load More -->
                                <button v-if="links.next" @click="loadMoreProducts" class="search-products__load-more">
                                    <?php echo app('translator')->get('shop::app.categories.view.load-more'); ?>
                                </button>
                            </template>

                            <!-- Empty State -->
                            <template v-else>
                                <div class="search-empty">
                                    <img src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>" alt="No results" class="search-empty__image" loading="lazy">
                                    <p class="search-empty__text"><?php echo app('translator')->get('shop::app.categories.view.empty'); ?></p>
                                </div>
                            </template>
                        </div>
                    </main>
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-search', {
                template: '#v-search-template',

                data() {
                    return {
                        isLoading: true,
                        isDrawerActive: { toolbar: false },
                        filters: { toolbar: { default: {}, applied: {} } },
                        products: [],
                        links: {}
                    }
                },

                computed: {
                    currentMode() {
                        return this.filters.toolbar.applied.mode ?? this.filters.toolbar.default.mode ?? 'grid';
                    },
                    gridClass() {
                        return this.currentMode === 'list' ? 'search-products__grid--list' : 'search-products__grid--grid';
                    },
                    queryParams() {
                        return this.removeJsonEmptyValues({...this.filters.toolbar.applied});
                    },
                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    }
                },

                watch: {
                    queryParams() { this.getProducts(); },
                    queryString() { window.history.pushState({}, '', '?' + this.queryString); }
                },

                methods: {
                    setFilters(type, filters) { this.filters[type] = filters; },

                    getProducts() {
                        this.isDrawerActive = { toolbar: false };
                        this.$axios.get("<?php echo e(route('shop.api.products.index')); ?>", { params: this.queryParams })
                            .then(response => {
                                this.isLoading = false;
                                this.products = response.data.data;
                                this.links = response.data.links;
                            })
                            .catch(error => console.log(error));
                    },

                    loadMoreProducts() {
                        if (this.links.next) {
                            this.$axios.get(this.links.next)
                                .then(response => {
                                    this.products = [...this.products, ...response.data.data];
                                    this.links = response.data.links;
                                })
                                .catch(error => console.log(error));
                        }
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(key => {
                            if (!params[key] && params[key] !== undefined) delete params[key];
                            if (Array.isArray(params[key])) params[key] = params[key].join(',');
                        });
                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();
                        for (const key in params) parameters.append(key, params[key]);
                        return parameters.toString();
                    }
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>

    <?php if (! $__env->hasRenderedOnce('d56a24cf-fc10-41d1-a436-5b1d3e86b35d')): $__env->markAsRenderedOnce('d56a24cf-fc10-41d1-a436-5b1d3e86b35d');
$__env->startPush('styles'); ?>
        <style>
            /* Base Reset */
            .search-page * { box-sizing: border-box; }

            /* Header */
            .search-header {
                padding: 1.25rem 1rem;
                background: #fff;
                border-bottom: 1px solid #e5e7eb;
            }
            .search-header__content {
                max-width: 1280px;
                margin: 0 auto;
            }
            .search-header__title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #111827;
                margin: 0 0 0.5rem;
                word-break: break-word;
            }
            .search-header__suggest p {
                font-size: 0.875rem;
                color: #6b7280;
                margin: 0;
            }
            .search-header__suggest-link {
                color: #2563eb;
                text-decoration: none;
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
            }
            .search-header__suggest-link:hover {
                text-decoration: underline;
            }

            /* Container */
            .search-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 1rem;
            }

            /* Layout */
            .search-layout {
                display: block;
            }

            /* Main Content */
            .search-main {
                width: 100%;
            }

            /* Toolbar */
            .search-toolbar {
                margin-bottom: 1.5rem;
                padding: 1rem;
                background: #fff;
                border-radius: 0.5rem;
                border: 1px solid #e5e7eb;
            }

            /* Products Grid */
            .search-products__grid {
                display: grid;
                gap: 1.5rem;
            }
            .search-products__grid--grid {
                grid-template-columns: repeat(4, 1fr);
            }
            .search-products__grid--list {
                grid-template-columns: 1fr;
            }

            /* Load More */
            .search-products__load-more {
                display: block;
                margin: 2rem auto 0;
                padding: 0.75rem 2rem;
                background: #fff;
                border: 1px solid #d1d5db;
                border-radius: 0.5rem;
                font-size: 0.875rem;
                font-weight: 500;
                color: #374151;
                cursor: pointer;
                min-height: 44px;
            }
            .search-products__load-more:hover {
                background: #f9fafb;
            }

            /* Empty State */
            .search-empty {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 4rem 1rem;
                text-align: center;
            }
            .search-empty__image {
                width: 120px;
                height: 120px;
                margin-bottom: 1rem;
            }
            .search-empty__text {
                font-size: 1.125rem;
                color: #6b7280;
                margin: 0;
            }

            /* Tablet (768-1023px) */
            @media (max-width: 1023px) {
                .search-products__grid--grid {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            /* Mobile (≤767px) */
            @media (max-width: 767px) {
                .search-header {
                    padding: 1rem;
                }
                .search-header__title {
                    font-size: 1rem;
                }
                .search-container {
                    padding: 0.75rem;
                }
                .search-toolbar {
                    padding: 0.75rem;
                }
                .search-products__grid {
                    gap: 1rem;
                }
                .search-products__grid--grid {
                    grid-template-columns: 1fr;
                }
                .search-products__load-more {
                    width: 100%;
                    margin-top: 1.5rem;
                }
                .search-empty__image {
                    width: 100px;
                    height: 100px;
                }
                .search-empty__text {
                    font-size: 0.875rem;
                }
            }
        </style>
    <?php $__env->stopPush(); endif; ?>
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
<?php /**PATH C:\Users\EXPRESS\Downloads\coding\mawgood\mawgood\packages\Webkul\Shop\src/resources/views/search/index.blade.php ENDPATH**/ ?>