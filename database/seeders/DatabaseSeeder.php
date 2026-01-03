<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear permission cache
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $manageUsers = Permission::firstOrCreate(['name' => 'manage users']);
        $deleteUsers = Permission::firstOrCreate(['name' => 'delete']);

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign permissions to admin role
        $adminRole->givePermissionTo([$manageUsers, $deleteUsers]);

        // Assign admin to user
        $admin = User::where('email', 'john@example.com')->first();

        // Assign role to admin
        $admin->assignRole($adminRole);

        // Create 20 dummy users
        User::factory(20)->create();

        // Call additional seeders
        $this->call([
            ClientSeeder::class,
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
