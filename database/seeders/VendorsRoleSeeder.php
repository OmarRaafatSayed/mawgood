<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsRoleSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('roles')->where('name', 'Vendors')->exists()) {
            return;
        }

        DB::table('roles')->insert([
            'name' => 'Vendors',
            'description' => 'Role for vendor operators with limited access',
            'permission_type' => 'custom',
            'permissions' => json_encode([
                'catalog.products',
                'sales.orders',
                'dashboard.index'
            ])
        ]);
    }
}
