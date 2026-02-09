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

    <?php if (! $__env->hasRenderedOnce('f65ebbb2-ae45-4147-ae3f-21acbf679410')): $__env->markAsRenderedOnce('f65ebbb2-ae45-4147-ae3f-21acbf679410');
$__env->startPush('scripts'); ?>
        <script type="text/x-template" id="v-search-template">
            <div class="search-container">
                <div class="search-layout">
                    <!-- Filters Sidebar (Desktop) -->
                    <aside class="search-filters sidebar-filter">
                        <v-filters
                            @filter-applied="setFilters('filter', $event)"
                            @filter-clear="clearFilters('filter', $event)"
                        >
                            <?php if (isset($component)) { $__componentOriginal8d0f18a0464611f33d443c290edba98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d0f18a0464611f33d443c290edba98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.categories.filters','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.categories.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $attributes = $__attributesOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__attributesOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $component = $__componentOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__componentOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
                        </v-filters>
                    </aside>

                    <!-- Products Section -->
                    <main class="search-main">
                        <!-- Filter Dropdown Button -->
                        <div class="filter-dropdown-wrapper">
                            <button 
                                class="filter-dropdown-btn"
                                @click="isDrawerActive.filter = !isDrawerActive.filter"
                            >
                                <span class="icon-filter text-xl"></span>
                                <span>تصفية النتائج</span>
                                <span class="icon-arrow-down text-lg" :class="{'rotate-180': isDrawerActive.filter}"></span>
                            </button>

                            <!-- Dropdown Content -->
                            <div class="filter-dropdown-content" :class="{active: isDrawerActive.filter}">
                                <div class="filter-dropdown-header">
                                    <h3>التصفية</h3>
                                    <button @click="clearFilters('filter', {})" class="clear-btn">مسح الكل</button>
                                </div>

                                <v-filters
                                    @filter-applied="setFilters('filter', $event)"
                                    @filter-clear="clearFilters('filter', $event)"
                                >
                                    <?php if (isset($component)) { $__componentOriginal8d0f18a0464611f33d443c290edba98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d0f18a0464611f33d443c290edba98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.categories.filters','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.categories.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $attributes = $__attributesOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__attributesOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $component = $__componentOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__componentOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
                                </v-filters>

                                <div class="filter-dropdown-footer">
                                    <button @click="applyFilters" class="apply-btn">تطبيق</button>
                                </div>
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

        <!-- Filters Component Template -->
        <script type="text/x-template" id="v-filters-template">
            <template v-if="isLoading">
                <?php if (isset($component)) { $__componentOriginal8d0f18a0464611f33d443c290edba98e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d0f18a0464611f33d443c290edba98e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.categories.filters','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.categories.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $attributes = $__attributesOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__attributesOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d0f18a0464611f33d443c290edba98e)): ?>
<?php $component = $__componentOriginal8d0f18a0464611f33d443c290edba98e; ?>
<?php unset($__componentOriginal8d0f18a0464611f33d443c290edba98e); ?>
<?php endif; ?>
            </template>

            <template v-else>
                <div class="filter-container">
                    <div class="flex h-[50px] items-center justify-between border-b border-zinc-200 pb-2.5 max-md:hidden">
                        <p class="text-lg font-semibold max-sm:font-medium">التصفية</p>
                        <p class="cursor-pointer text-xs font-medium" tabindex="0" @click="clear()">مسح الكل</p>
                    </div>

                    <!-- Hierarchical Categories -->
                    <div class="category-filter">
                        <!-- Categories Header -->
                        <div class="filter-section-header">
                            <p class="text-lg font-semibold">الفئات</p>
                        </div>

                        <!-- Back Button -->
                        <div 
                            v-if="currentCategory"
                            class="back-nav"
                            @click="goBack"
                        >
                            <span class="icon-arrow-right text-xl"></span>
                            <span>رجوع</span>
                        </div>

                        <!-- Categories List -->
                        <div class="categories-list">
                            <div 
                                v-for="category in displayCategories"
                                :key="category.id"
                                class="category-item"
                                @click="selectCategory(category)"
                            >
                                <span>{{ category.name }}</span>
                                <span class="icon-arrow-left text-lg" v-if="category.children_count > 0"></span>
                            </div>
                            <div v-if="displayCategories.length === 0" class="no-categories">
                                <p class="text-sm text-gray-500">لا توجد فئات فرعية</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="price-filter-section">
                        <?php if (isset($component)) { $__componentOriginald3ba50c765d00f082351f5b73fecce50 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3ba50c765d00f082351f5b73fecce50 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.accordion.index','data' => ['class' => 'last:border-b-0']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::accordion'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'last:border-b-0']); ?>
                             <?php $__env->slot('header', null, ['class' => 'px-0 py-2.5 max-sm:!pb-1.5']); ?> 
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-semibold max-sm:text-base max-sm:font-medium">نطاق السعر</p>
                                </div>
                             <?php $__env->endSlot(); ?>
                             <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                                <v-price-filter
                                    :key="priceRefreshKey"
                                    :default-price-range="appliedPrice"
                                    @set-price-range="applyPrice($event)"
                                >
                                </v-price-filter>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $attributes = $__attributesOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__attributesOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3ba50c765d00f082351f5b73fecce50)): ?>
<?php $component = $__componentOriginald3ba50c765d00f082351f5b73fecce50; ?>
<?php unset($__componentOriginald3ba50c765d00f082351f5b73fecce50); ?>
<?php endif; ?>
                    </div>
                </div>
            </template>
        </script>

        <!-- Filter Item Template -->
        <script type="text/x-template" id="v-filter-item-template">
            <!-- Removed - Not needed for hierarchical category filter -->
        </script>

        <!-- Price Filter Template -->
        <script type="text/x-template" id="v-price-filter-template">
            <div>
                <template v-if="isLoading">
                    <?php if (isset($component)) { $__componentOriginal381c2a85a436b293bdf7706572920569 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal381c2a85a436b293bdf7706572920569 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.range-slider.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.range-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal381c2a85a436b293bdf7706572920569)): ?>
<?php $attributes = $__attributesOriginal381c2a85a436b293bdf7706572920569; ?>
<?php unset($__attributesOriginal381c2a85a436b293bdf7706572920569); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal381c2a85a436b293bdf7706572920569)): ?>
<?php $component = $__componentOriginal381c2a85a436b293bdf7706572920569; ?>
<?php unset($__componentOriginal381c2a85a436b293bdf7706572920569); ?>
<?php endif; ?>
                </template>
                <template v-else>
                    <?php if (isset($component)) { $__componentOriginal1b07d32d5e8259f29b6a913a57b6a71e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b07d32d5e8259f29b6a913a57b6a71e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.range-slider.index','data' => [':key' => 'refreshKey','defaultType' => 'price',':defaultAllowedMaxRange' => 'allowedMaxPrice',':defaultMinRange' => 'minRange',':defaultMaxRange' => 'maxRange','@changeRange' => 'setPriceRange($event)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::range-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':key' => 'refreshKey','default-type' => 'price',':default-allowed-max-range' => 'allowedMaxPrice',':default-min-range' => 'minRange',':default-max-range' => 'maxRange','@change-range' => 'setPriceRange($event)']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b07d32d5e8259f29b6a913a57b6a71e)): ?>
<?php $attributes = $__attributesOriginal1b07d32d5e8259f29b6a913a57b6a71e; ?>
<?php unset($__attributesOriginal1b07d32d5e8259f29b6a913a57b6a71e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b07d32d5e8259f29b6a913a57b6a71e)): ?>
<?php $component = $__componentOriginal1b07d32d5e8259f29b6a913a57b6a71e; ?>
<?php unset($__componentOriginal1b07d32d5e8259f29b6a913a57b6a71e); ?>
<?php endif; ?>
                </template>
            </div>
        </script>

        <script type="module">
            // Filters Component
            app.component('v-filters', {
                template: '#v-filters-template',
                data() {
                    return {
                        isLoading: true,
                        allCategories: [],
                        currentCategory: null,
                        categoryHistory: [],
                        appliedPrice: null,
                        priceRefreshKey: 0
                    };
                },
                computed: {
                    displayCategories() {
                        if (!this.currentCategory) {
                            return this.allCategories.filter(cat => !cat.parent_id);
                        }
                        return this.allCategories.filter(cat => cat.parent_id === this.currentCategory.id);
                    }
                },
                mounted() {
                    this.getCategories();
                },
                watch: {
                    allCategories() {
                        this.loadFromUrl();
                    }
                },
                methods: {
                    getCategories() {
                        this.$axios.get('<?php echo e(route("shop.api.categories.index")); ?>')
                            .then((response) => {
                                this.isLoading = false;
                                this.allCategories = response.data.data;
                            })
                            .catch((error) => console.log(error));
                    },
                    loadFromUrl() {
                        const urlParams = new URLSearchParams(window.location.search);
                        const categoryId = urlParams.get('category_id');
                        const price = urlParams.get('price');
                        
                        if (categoryId) {
                            const category = this.allCategories.find(c => c.id == categoryId);
                            if (category) this.currentCategory = category;
                        }
                        if (price) this.appliedPrice = price;
                    },
                    selectCategory(category) {
                        if (category.children_count > 0) {
                            this.categoryHistory.push(this.currentCategory);
                            this.currentCategory = category;
                        } else {
                            // If no children, still select it for filtering
                            this.currentCategory = category;
                        }
                        this.applyFilters();
                    },
                    goBack() {
                        this.currentCategory = this.categoryHistory.pop() || null;
                        this.applyFilters();
                    },
                    applyPrice(priceRange) {
                        this.appliedPrice = priceRange;
                        this.applyFilters();
                    },
                    applyFilters() {
                        let filters = {};
                        if (this.currentCategory) {
                            filters.category_id = this.currentCategory.id;
                        }
                        if (this.appliedPrice) {
                            filters.price = this.appliedPrice;
                        }
                        this.$emit('filter-applied', filters);
                    },
                    clear() {
                        this.currentCategory = null;
                        this.categoryHistory = [];
                        this.appliedPrice = null;
                        this.priceRefreshKey++;
                        this.$emit('filter-applied', {});
                    }
                }
            });

            // Filter Item Component (Removed)
            app.component('v-filter-item', {
                template: '#v-filter-item-template',
                props: ['filter'],
                data() { return {}; },
                methods: {}
            });

            // Price Filter Component
            app.component('v-price-filter', {
                template: '#v-price-filter-template',
                props: ['defaultPriceRange'],
                data() {
                    return {
                        refreshKey: 0,
                        isLoading: true,
                        allowedMaxPrice: 100,
                        priceRange: null
                    };
                },
                computed: {
                    minRange() {
                        let priceRange = (this.priceRange || '0,100').split(',');
                        return priceRange[0];
                    },
                    maxRange() {
                        let priceRange = (this.priceRange || '0,100').split(',');
                        return priceRange[1];
                    }
                },
                created() {
                    this.priceRange = this.defaultPriceRange ?? [0, 100].join(',');
                },
                mounted() {
                    this.getMaxPrice();
                },
                methods: {
                    getMaxPrice() {
                        this.$axios.get('<?php echo e(route("shop.api.categories.max_price", "")); ?>')
                            .then((response) => {
                                this.isLoading = false;
                                if (response.data.data.max_price) {
                                    this.allowedMaxPrice = response.data.data.max_price;
                                }
                                if (!this.defaultPriceRange) {
                                    this.priceRange = [0, this.allowedMaxPrice].join(',');
                                }
                                ++this.refreshKey;
                            })
                            .catch((error) => console.log(error));
                    },
                    setPriceRange($event) {
                        this.priceRange = [$event.minRange, $event.maxRange].join(',');
                        this.$emit('set-price-range', this.priceRange);
                    }
                }
            });

            // Main Search Component
            app.component('v-search', {
                template: '#v-search-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,
                        isLoading: true,
                        isDrawerActive: { toolbar: false, filter: false },
                        filters: { 
                            toolbar: { default: {}, applied: {} },
                            filter: {}
                        },
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
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar.applied);
                        return this.removeJsonEmptyValues(queryParams);
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

                    clearFilters(type, filters) { 
                        this.filters[type] = {};
                        this.getProducts();
                    },

                    applyFilters() {
                        this.isDrawerActive.filter = false;
                        this.getProducts();
                    },

                    getProducts() {
                        this.isDrawerActive = { toolbar: false, filter: false };
                        
                        let params = {...this.queryParams};
                        const urlParams = new URLSearchParams(window.location.search);
                        if (urlParams.has('query')) {
                            params.query = urlParams.get('query');
                        }
                        
                        this.$axios.get("<?php echo e(route('shop.api.products.index')); ?>", { params })
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

    <?php if (! $__env->hasRenderedOnce('1a283e4a-0dbe-4b03-a69c-67aa30f2f827')): $__env->markAsRenderedOnce('1a283e4a-0dbe-4b03-a69c-67aa30f2f827');
$__env->startPush('styles'); ?>
        <style>
            /* RTL Support */
            [dir="rtl"] .search-page { direction: rtl; text-align: right; }
            [dir="ltr"] .search-page { direction: ltr; text-align: left; }

            /* Header */
            .search-header {
                padding: 15px;
                background: #fff;
                border-bottom: 1px solid #e5e7eb;
            }
            .search-header__content {
                max-width: 1280px;
                margin: 0 auto;
            }
            .search-header__title {
                font-size: 1.5rem;
                font-weight: 600;
                color: #111827;
                margin: 0 0 10px;
            }
            .search-header__suggest p {
                font-size: 0.9rem;
                color: #6b7280;
                margin: 0;
            }
            .search-header__suggest-link {
                color: #2563eb;
                background: none;
                border: none;
                padding: 0;
                cursor: pointer;
                text-decoration: underline;
            }

            /* Container */
            .search-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 15px;
            }

            /* Toolbar */
            .search-toolbar {
                margin-bottom: 15px;
                padding: 15px;
                background: #fff;
                border-radius: 8px;
                border: 1px solid #e5e7eb;
            }

            /* Products Grid */
            .search-products__grid {
                display: grid;
                gap: 15px;
                margin-bottom: 20px;
            }
            .search-products__grid--grid {
                grid-template-columns: repeat(3, 1fr);
            }
            .search-products__grid--list {
                grid-template-columns: 1fr;
            }

            /* Product Card Styling */
            .search-products__grid > div {
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                padding: 15px;
                transition: box-shadow 0.3s;
            }
            .search-products__grid > div:hover {
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }

            /* Product Title */
            .search-products__grid p[class*="text-base"] {
                font-size: 1.1rem !important;
                font-weight: 500;
                margin: 10px 0;
                line-height: 1.4;
            }

            /* Product Price */
            .search-products__grid div[class*="font-semibold"] {
                font-size: 1.2rem !important;
                font-weight: 700 !important;
                color: #111827;
                margin: 10px 0;
            }

            /* Buy Button */
            .search-products__grid button.secondary-button {
                width: 100% !important;
                padding: 12px !important;
                background: #2563eb !important;
                color: #fff !important;
                border: none !important;
                border-radius: 6px !important;
                font-size: 1rem !important;
                font-weight: 600 !important;
                cursor: pointer;
                transition: background 0.3s;
                margin-top: 10px;
            }
            .search-products__grid button.secondary-button:hover {
                background: #1d4ed8 !important;
            }

            /* Load More */
            .search-products__load-more {
                display: block;
                margin: 20px auto;
                padding: 12px 40px;
                background: #fff;
                border: 2px solid #2563eb;
                border-radius: 6px;
                font-size: 1rem;
                font-weight: 600;
                color: #2563eb;
                cursor: pointer;
                min-height: 44px;
            }
            .search-products__load-more:hover {
                background: #2563eb;
                color: #fff;
            }

            /* Empty State */
            .search-empty {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 60px 20px;
                text-align: center;
            }
            .search-empty__image {
                width: 120px;
                height: 120px;
                margin-bottom: 20px;
            }
            .search-empty__text {
                font-size: 1.1rem;
                color: #6b7280;
            }

            /* Tablet */
            @media (max-width: 1023px) {
                .search-products__grid--grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            /* Filters Sidebar */
            .search-filters {
                width: 342px;
                flex-shrink: 0;
            }
            .filter-container {
                width: 100%;
            }
            @media (min-width: 768px) {
                .filter-container {
                    min-width: 342px;
                    max-width: 342px;
                    max-height: 1320px;
                    overflow-y: auto;
                    overflow-x: hidden;
                    padding-right: 28px;
                }
                [dir="rtl"] .filter-container {
                    padding-right: 0;
                    padding-left: 28px;
                }
            }
            .search-main {
                flex: 1;
            }
            .search-layout {
                display: flex;
                gap: 40px;
            }

            /* Filter Dropdown */
            .filter-dropdown-wrapper {
                position: relative;
                margin-bottom: 20px;
            }
            .filter-dropdown-btn {
                display: flex;
                align-items: center;
                gap: 10px;
                width: 100%;
                padding: 14px 20px;
                background: #fff;
                border: 2px solid #2563eb;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                color: #2563eb;
                cursor: pointer;
                transition: all 0.3s;
            }
            .filter-dropdown-btn:hover {
                background: #eff6ff;
            }
            .filter-dropdown-btn .icon-arrow-down {
                margin-left: auto;
                transition: transform 0.3s;
            }
            [dir="rtl"] .filter-dropdown-btn .icon-arrow-down {
                margin-left: 0;
                margin-right: auto;
            }
            .filter-dropdown-btn .rotate-180 {
                transform: rotate(180deg);
            }
            .filter-dropdown-content {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #fff;
                border: 1px solid #e5e7eb;
                border-radius: 8px;
                margin-top: 8px;
                max-height: 0;
                overflow: hidden;
                opacity: 0;
                transition: all 0.3s ease-in-out;
                z-index: 100;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            }
            .filter-dropdown-content.active {
                max-height: 600px;
                opacity: 1;
                overflow-y: auto;
            }
            .filter-dropdown-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 20px;
                border-bottom: 2px solid #e5e7eb;
            }
            .filter-dropdown-header h3 {
                font-size: 1.1rem;
                font-weight: 600;
                margin: 0;
            }
            .clear-btn {
                background: none;
                border: none;
                color: #ef4444;
                font-size: 0.9rem;
                font-weight: 500;
                cursor: pointer;
                padding: 5px 10px;
            }
            .clear-btn:hover {
                text-decoration: underline;
            }
            .filter-dropdown-footer {
                padding: 15px 20px;
                border-top: 1px solid #e5e7eb;
            }
            .apply-btn {
                width: 100%;
                padding: 12px;
                background: #2563eb;
                color: #fff;
                border: none;
                border-radius: 6px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: background 0.3s;
            }
            .apply-btn:hover {
                background: #1d4ed8;
            }

            /* Mobile */
            @media (max-width: 767px) {
                .search-header { padding: 10px; }
                .search-header__title { font-size: 1.2rem; }
                .search-container { padding: 10px; }
                .search-products__grid { gap: 10px; }
                .search-products__grid--grid {
                    grid-template-columns: 1fr;
                }
                .search-products__grid > div { padding: 10px; }
                .search-products__load-more { width: 100%; }
                .search-layout { display: block; }
                .sidebar-filter { display: none; }
                
                /* Mobile Dropdown */
                .filter-dropdown-content {
                    position: fixed;
                    top: auto;
                    bottom: -100%;
                    left: 0;
                    right: 0;
                    max-height: 70vh;
                    border-radius: 20px 20px 0 0;
                    margin-top: 0;
                    transition: bottom 0.3s ease-in-out;
                }
                .filter-dropdown-content.active {
                    bottom: 0;
                }
            }

            /* Hierarchical Category Filter Styles */
            .category-filter {
                padding: 15px 20px;
            }
            .filter-section-header {
                padding: 10px 0;
                border-bottom: 1px solid #e5e7eb;
                margin-bottom: 12px;
            }
            .back-nav {
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 12px;
                background: #f3f4f6;
                border-radius: 8px;
                cursor: pointer;
                margin-bottom: 12px;
                font-weight: 500;
                transition: background 0.2s;
            }
            .back-nav:hover {
                background: #e5e7eb;
            }
            [dir="rtl"] .back-nav .icon-arrow-right {
                transform: rotate(180deg);
            }
            .categories-list {
                display: flex;
                flex-direction: column;
                gap: 4px;
            }
            .category-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 12px;
                border-radius: 6px;
                cursor: pointer;
                transition: all 0.2s;
                font-size: 0.95rem;
                border: 1px solid transparent;
            }
            .category-item:hover {
                background: #f3f4f6;
                border-color: #e5e7eb;
            }
            [dir="rtl"] .category-item .icon-arrow-left {
                transform: rotate(180deg);
            }
            .no-categories {
                padding: 20px;
                text-align: center;
            }
            .price-filter-section {
                padding: 0 20px 15px;
            }

            /* Mobile Category Styles */
            @media (max-width: 767px) {
                .category-filter {
                    margin-top: 0;
                    padding-bottom: 10px;
                }
                .category-item {
                    padding: 12px 10px;
                    font-size: 0.95rem;
                    min-height: 44px;
                }
                .back-nav {
                    padding: 12px 10px;
                    min-height: 44px;
                    margin-bottom: 8px;
                }
                .filter-section-header {
                    padding: 8px 0;
                    margin-bottom: 8px;
                }
                .filter-section-header p {
                    font-size: 1rem;
                }
                .price-filter-section {
                    margin-top: 10px;
                }
                .no-categories {
                    padding: 15px;
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