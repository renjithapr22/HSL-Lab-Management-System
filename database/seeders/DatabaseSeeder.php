<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ManufacturerSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create default admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@hsl.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        
        // Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $providerRole = Role::firstOrCreate(['name' => 'provider']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);

        $admin->assignRole('admin');

        // Permissions
        Permission::firstOrCreate(['name' => 'dashboard']);
        Permission::firstOrCreate(['name' => 'manufacturers']);
        Permission::firstOrCreate(['name' => 'providers']);
        Permission::firstOrCreate(['name' => 'product']);
        Permission::firstOrCreate(['name' => 'provider-staff']);
        Permission::firstOrCreate(['name' => 'orders']);
        Permission::firstOrCreate(['name' => 'orderitem']);
        Permission::firstOrCreate(['name' => 'inventory']);
        Permission::firstOrCreate(['name' => 'inventory-usage']);
        Permission::firstOrCreate(['name' => 'patients']);
        Permission::firstOrCreate(['name' => 'subscriptions']);


        // 2. Define the Order permissions
        Permission::firstOrCreate(['name' => 'dashboard']);
        Permission::firstOrCreate(['name' => 'orders.index']);
        Permission::firstOrCreate(['name' => 'orders.create']);
        Permission::firstOrCreate(['name' => 'orders.store']);
        Permission::firstOrCreate(['name' => 'orders.confirmation']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(Permission::all());
        $providerRole->givePermissionTo(['dashboard','provider-staff', 'orders', 'orderitem','inventory','inventory-usage','patients','subscriptions']);
        $staffRole->givePermissionTo([ 'dashboard', 'orderitem','inventory','inventory-usage','patients','subscriptions']);
        //Grant all 'orders.*' permissions to the Staff Role
        $staffRole->givePermissionTo(
            Permission::where('name', 'like', 'orders.%')->pluck('name')->toArray()
        );

    }
}
