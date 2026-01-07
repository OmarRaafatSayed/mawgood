<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webkul\User\Models\Admin;
use Webkul\User\Models\Role;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create';
    protected $description = 'Create admin user';

    public function handle()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@mawgood.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'status' => 1,
        ]);

        $this->info('Admin created: admin@mawgood.com / 123456');
    }
}