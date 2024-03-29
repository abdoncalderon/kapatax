<?php

use App\Models\MaterialType;
use App\Models\RolePermit;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StakeholderTypesSeeder::class,
            GenderSeeder::class,
            GroupSeeder::class,
            StatusSeeder::class,
            DefaultSeeder::class,
            MenuSeeder::class,
            RoleMenuSeeder::class,
            PermitSeeder::class,
            RolePermitSeeder::class,
            
        ]);

        
    }
}
