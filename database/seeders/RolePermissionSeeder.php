<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin role and give it all permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $permissions = Permission::all();
        $adminRole->syncPermissions($permissions);

        // Assign admin role to first user
        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
