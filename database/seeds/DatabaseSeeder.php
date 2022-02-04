<?php

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
            DefaultSeeder::class,
            MenuSeeder::class,
            RoleMenuSeeder::class,
            ProjectUserSeeder::class,
            PermitSeeder::class,
            RolePermitSeeder::class,
            
        ]);

        
    }
}
