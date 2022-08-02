<?php

namespace Database\Seeders;

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
            PermissionRoleSeeder::class,
            UserSeeder::class,
            ModelHasRolesSeeder::class,
            CycleSeeder::class,
            ClasseSeeder::class,
            FraisSeeder::class,
            MatiereSeeder::class,
        ]);
    }
}
