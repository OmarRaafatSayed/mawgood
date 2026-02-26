<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Modern Checkout Theme Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration file allows you to enable/disable the modern checkout
    | design based on the stitch_splash_screen pattern.
    |
    */

    'enabled' => env('MODERN_CHECKOUT_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Design System Colors
    |--------------------------------------------------------------------------
    |
    | Define the color palette for the modern checkout design.
    | These colors are used throughout the checkout process.
    |
    */

    'colors' => [
        'primary' => env('CHECKOUT_PRIMARY_COLOR', '#003366'),
        'accent' => env('CHECKOUT_ACCENT_COLOR', '#FF6D00'),
        'background' => env('CHECKOUT_BACKGROUND_COLOR', '#f8f9fa'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Typography Settings
    |--------------------------------------------------------------------------
    |
    | Configure the fonts used in the modern checkout design.
    |
    */

    'typography' => [
        'primary_font' => env('CHECKOUT_PRIMARY_FONT', 'Manrope'),
        'arabic_font' => env('CHECKOUT_ARABIC_FONT', 'Tajawal'),
        'fallback_font' => env('CHECKOUT_FALLBACK_FONT', 'Cairo'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Animation Settings
    |--------------------------------------------------------------------------
    |
    | Control animation behavior in the checkout process.
    |
    */

    'animations' => [
        'enabled' => env('CHECKOUT_ANIMATIONS_ENABLED', true),
        'confetti_on_success' => env('CHECKOUT_CONFETTI_ENABLED', true),
        'transition_duration' => env('CHECKOUT_TRANSITION_DURATION', '300ms'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Layout Settings
    |--------------------------------------------------------------------------
    |
    | Configure layout behavior for the checkout pages.
    |
    */

    'layout' => [
        'sticky_summary' => env('CHECKOUT_STICKY_SUMMARY', true),
        'show_progress_bar' => env('CHECKOUT_SHOW_PROGRESS', true),
        'collapsible_steps' => env('CHECKOUT_COLLAPSIBLE_STEPS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    |
    | Enable or disable specific features in the modern checkout.
    |
    */

    'features' => [
        'product_images_in_summary' => true,
        'edit_step_buttons' => true,
        'security_badge' => true,
        'support_section' => true,
        'quantity_changer_buttons' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Mobile Settings
    |--------------------------------------------------------------------------
    |
    | Configure mobile-specific behavior.
    |
    */

    'mobile' => [
        'bottom_navigation' => env('CHECKOUT_MOBILE_BOTTOM_NAV', false),
        'simplified_forms' => env('CHECKOUT_MOBILE_SIMPLIFIED_FORMS', true),
        'larger_touch_targets' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Settings
    |--------------------------------------------------------------------------
    |
    | Optimize performance for the checkout process.
    |
    */

    'performance' => [
        'lazy_load_images' => true,
        'preload_fonts' => true,
        'minimize_animations_on_slow_devices' => true,
    ],
];
