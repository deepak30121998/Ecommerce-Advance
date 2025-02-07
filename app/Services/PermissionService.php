<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{
    public static function createDefaultPermissions()
    {
        // User Management
        $userPermissions = [
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
        ];

        // Role Management
        $rolePermissions = [
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
        ];

        // Permission Management
        $permissionPermissions = [
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',
        ];

        // Content Management
        $contentPermissions = [
            'content.view',
            'content.create',
            'content.edit',
            'content.delete',
        ];

        $allPermissions = array_merge(
            $userPermissions,
            $rolePermissions,
            $permissionPermissions,
            $contentPermissions
        );

        foreach ($allPermissions as $permission) {
            Permission::findOrCreate($permission);
        }

        return $allPermissions;
    }

    public static function createDefaultRoles()
    {
        // Create Super Admin
        $superAdmin = Role::findOrCreate('super-admin');
        $superAdmin->givePermissionTo(Permission::all());

        // Create Admin
        $admin = Role::findOrCreate('admin');
        $admin->givePermissionTo([
            'user.view',
            'user.create',
            'user.edit',
            'content.view',
            'content.create',
            'content.edit',
            'content.delete',
        ]);

        // Create Editor
        $editor = Role::findOrCreate('editor');
        $editor->givePermissionTo([
            'content.view',
            'content.create',
            'content.edit',
        ]);

        // Create Viewer
        $viewer = Role::findOrCreate('viewer');
        $viewer->givePermissionTo([
            'content.view',
        ]);

        return ['super-admin', 'admin', 'editor', 'viewer'];
    }
}
