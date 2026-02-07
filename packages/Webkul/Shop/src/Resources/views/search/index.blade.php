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
                    <!-- Products Section -->
                    <main class="search-main">
                        <!-- Toolbar -->
                        <div class="search-toolbar">
                            <div class="search-toolbar__actions">
                                @include('shop::categories.toolbar')
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
                        this.$axios.get("{{ route('shop.api.products.index') }}", { params: this.queryParams })
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

            /* Mobile */
            @media (max-width: 767px) {
                .search-header { padding: 10px; }
                .search-header__title { font-size: 1.2rem; }
                .search-container { padding: 10px; }
                .search-toolbar { padding: 10px; margin-bottom: 10px; }
                .search-products__grid { gap: 10px; }
                .search-products__grid--grid {
                    grid-template-columns: 1fr;
                }
                .search-products__grid > div { padding: 10px; }
                .search-products__load-more { width: 100%; }
            }
        </style>
    @endPushOnce
</x-shop::layouts>
