<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::updateOrCreate(['id' => 1], ['name' => 'user', 'caption' => 'User role', 'is_admin' => 0, 'created_at' => time()]);
        \App\Models\Role::updateOrCreate(['id' => 2], ['name' => 'admin', 'caption' => 'Admin role', 'is_admin' => 1, 'created_at' => time()]);
    }
}