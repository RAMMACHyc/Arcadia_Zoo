<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
    {
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->save();

        $veterinaireRole = new Role();
        $veterinaireRole->name = 'veterinaire';
        $veterinaireRole->save();

        $employeRole = new Role();
        $employeRole->name = 'employe';
        $employeRole->save();
    
    }
}
