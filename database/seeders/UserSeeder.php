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


        $users = User::factory()
                    ->count(1000)
                    ->create();
    }
}
