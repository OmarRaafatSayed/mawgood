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
    @endPushOnce
</x-shop::layouts>
