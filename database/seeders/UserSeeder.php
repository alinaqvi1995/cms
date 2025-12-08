<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Reset cached roles and permissions
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            // Generate permissions from routes
            $this->call(RoutePermissionsSeeder::class);

            // Create Roles
            $adminRole = Role::firstOrCreate(['name' => 'Admin']);
            $subUserRole = Role::firstOrCreate(['name' => 'Subuser']);

            // Grant all permissions to Admin
            $adminRole->syncPermissions(Permission::all());

            // Create Admin User
            $adminEmail = 'admin@crm.com.pk';

            $admin = User::where('email', $adminEmail)->first();
            if (!$admin) {
                $admin = User::create([
                    'name' => 'Admin User',
                    'email' => $adminEmail,
                    'password' => Hash::make('12345678'),
                    'role' => 1,
                    'status' => 1,
                ]);
                $this->command->info("Admin user created: $adminEmail");
            } else {
                $this->command->info("Admin user already exists: $adminEmail");
            }
            $admin->assignRole($adminRole);

            // Create Subusers
            $numberOfSubusers = 3;
            for ($i = 1; $i <= $numberOfSubusers; $i++) {
                $email = "user{$i}@crm.com.pk";
                $subuser = User::where('email', $email)->first();

                if (!$subuser) {
                    $subuser = User::create([
                        'name' => "Sub User {$i}",
                        'email' => $email,
                        'password' => Hash::make('12345678'),
                        'role' => 2,
                        'status' => 1,
                    ]);
                    $this->command->info("Subuser created: $email");
                } else {
                    $this->command->info("Subuser already exists: $email");
                }

                $subuser->assignRole($subUserRole);
            }

        } catch (\Throwable $e) {
            $logMessage = "Error: " . $e->getMessage() . PHP_EOL .
                          "File: " . $e->getFile() . " Line: " . $e->getLine() . PHP_EOL .
                          "Trace: " . $e->getTraceAsString();

            file_put_contents(base_path('seeder_error.txt'), $logMessage);
            $this->command->error("Error logged to seeder_error.txt");
        }
    }
}
