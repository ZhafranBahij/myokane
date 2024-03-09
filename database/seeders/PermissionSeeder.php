<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $all_permissions = [
            'view user',
            'create user',
            'edit user',
            'delete user',

            'view income',
            'create income',
            'edit income',
            'delete income',

            'view outcome',
            'create outcome',
            'edit outcome',
            'delete outcome',

            'view clockwork',
            'view log',

            'view role',
            'create role',
            'edit role',
            'delete role',
        ];

        foreach ($all_permissions as $value) {
            Permission::create(['name' => $value]);
        }

        $admin = Role::whereName('admin')->first();
        $admin->givePermissionTo(Permission::all());
        $admin->revokePermissionTo('view clockwork');
        $admin->revokePermissionTo('view log');

        $user = Role::whereName('user')->first();
        $user->givePermissionTo([
            'view income',
            'create income',
            'edit income',
            'delete income',

            'view outcome',
            'create outcome',
            'edit outcome',
            'delete outcome',
        ]);

    }
}
