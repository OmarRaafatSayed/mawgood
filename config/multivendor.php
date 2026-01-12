<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Multi-Vendor Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration options for the multi-vendor marketplace system
    |
    */

    'enabled' => env('MULTI_VENDOR_ENABLED', true),

    'default_commission_rate' => env('DEFAULT_COMMISSION_RATE', 10.00),

    'auto_approve_vendors' => env('AUTO_APPROVE_VENDORS', false),

    'vendor_can_manage_orders' => env('VENDOR_CAN_MANAGE_ORDERS', true),

    'vendor_can_manage_inventory' => env('VENDOR_CAN_MANAGE_INVENTORY', true),

    'vendor_dashboard_route' => env('VENDOR_DASHBOARD_ROUTE', 'vendor'),

    'commission_calculation' => [
        'type' => env('COMMISSION_TYPE', 'percentage'), // percentage or fixed
        'include_shipping' => env('COMMISSION_INCLUDE_SHIPPING', false),
        'include_tax' => env('COMMISSION_INCLUDE_TAX', false),
    ],

    'vendor_permissions' => [
        'manage_products' => true,
        'manage_orders' => true,
        'manage_inventory' => true,
        'view_reports' => true,
        'manage_profile' => true,
    ],
];