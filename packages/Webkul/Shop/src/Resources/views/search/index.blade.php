<?php
    $searchTitle = $suggestion ?? $query;
    $title = $searchTitle ? trans('shop::app.search.title', ['query' => $searchTitle]) : trans('shop::app.search.results');
    $searchInstead = $suggestion ? $query : null;
?>

@push('meta')
    <meta name="description" content="{{ $title }}"/>
    <meta name="keywords" content="{{ $title }}"/>
@endpush

<x-shop::layouts :has-feature="false">
    <x-slot:title>{{ $title }}</x-slot>

    <div class="search-page">
        <!-- Header Section -->
        <div class="search-header">
            <div class="search-header__content">
                <h1 class="search-header__title">{{ $title }}</h1>
                
                @if ($searchInstead)
                    <form action="{{ route('shop.search.index', ['suggest' => false]) }}" class="search-header__suggest">
                        <input type="hidden" name="query" value="{{ $searchInstead }}">
                        <input type="hidden" name="suggest" value="0">
                        <p>
                            {{ trans('shop::app.search.suggest') }}
                            <button type="submit" class="search-header__suggest-link">{{ $searchInstead }}</button>
                        </p>
                    </form>
                @endif
            </div>
        </div>

        <!-- Main Content -->
        <v-search>
            <x-shop::shimmer.categories.view />
        </v-search>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-search-template">
            <div class="search-container">
                <div class="search-layout">
                    <!-- Filters Sidebar (Desktop) -->
                    <aside class="search-filters sidebar-filter">
                        <v-filters
                            @filter-applied="setFilters('filter', $event)"
                            @filter-clear="clearFilters('filter', $event)"
                        >
                            <x-shop::shimmer.categories.filters />
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
                                    <x-shop::shimmer.categories.filters />
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
                                    <x-shop::shimmer.products.cards.grid count="12" />
                                </div>
                            </template>

                            <!-- Products List -->
                            <template v-else-if="products.length">
                                <div class="search-products__grid" :class="gridClass">
                                    <x-shop::products.card
                                        ::mode="currentMode"
                                        v-for="product in products"
                                        :navigation-link="route('shop.search.index')"
                                    />
                                </div>

                                <!-- Load More -->
                                <button v-if="links.next" @click="loadMoreProducts" class="search-products__load-more">
                                    @lang('shop::app.categories.view.load-more')
                                </button>
                            </template>

                            <!-- Empty State -->
                            <template v-else>
                                <div class="search-empty">
                                    <img src="{{ bagisto_asset('images/thank-you.png') }}" alt="No results" class="search-empty__image" loading="lazy">
                                    <p class="search-empty__text">@lang('shop::app.categories.view.empty')</p>
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
                <x-shop::shimmer.categories.filters />
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
                                <span>@{{ category.name }}</span>
                                <span class="icon-arrow-left text-lg" v-if="category.children_count > 0"></span>
                            </div>
                            <div v-if="displayCategories.length === 0" class="no-categories">
                                <p class="text-sm text-gray-500">لا توجد فئات فرعية</p>
                            </div>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="price-filter-section">
                        <x-shop::accordion class="last:border-b-0">
                            <x-slot:header class="px-0 py-2.5 max-sm:!pb-1.5">
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-semibold max-sm:text-base max-sm:font-medium">نطاق السعر</p>
                                </div>
                            </x-slot>
                            <x-slot:content class="!p-0">
                                <v-price-filter
                                    :key="priceRefreshKey"
                                    :default-price-range="appliedPrice"
                                    @set-price-range="applyPrice($event)"
                                >
                                </v-price-filter>
                            </x-slot>
                        </x-shop::accordion>
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
                    <x-shop::shimmer.range-slider />
                </template>
                <template v-else>
                    <x-shop::range-slider
                        ::key="refreshKey"
                        default-type="price"
                        ::default-allowed-max-range="allowedMaxPrice"
                        ::default-min-range="minRange"
                        ::default-max-range="maxRange"
                        @change-range="setPriceRange($event)"
                    />
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
                        this.$axios.get('{{ route("shop.api.categories.index") }}')
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
                        this.$axios.get('{{ route("shop.api.categories.max_price", "") }}')
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
                        
                        this.$axios.get("{{ route('shop.api.products.index') }}", { params })
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
    @endPushOnce

    @pushOnce('styles')
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
    @endPushOnce
</x-shop::layouts>
