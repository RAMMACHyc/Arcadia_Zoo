<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles if not already created
        $this->call(RolesTableSeeder::class);

        // Get roles
        $adminRole = Role::where('name', 'admin')->first();

        // Create admin user
        $admin = User::create([
            'name' => 'jose',
            'email' => 'jose@gmail.com',
            'password' => bcrypt('jose1234'), 
            'role_id' => $adminRole->id,
        ]);
    }
}
