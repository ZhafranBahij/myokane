<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'kirakira4141',
            'email' => 'kirakira4141@gmail.com',
            'password' => 'kirakira4141',
        ]);

        $role = Role::create([
            'name' => 'admin',
        ]);

        $user->assignRole($role);

        $role_user = Role::create([
            'name' => 'user',
        ]);

        $user = User::create([
            'name' => 'kapibara',
            'email' => 'kapibara@gmail.com',
            'password' => 'kapibara',
        ]);

        $user->assignRole($role_user);

        $users = User::factory()
                    ->count(100)
                    ->create();

        foreach ($users as $key => $value) {
            $value->assignRole($role_user);
        }

    }
}
