<?php

namespace Database\Seeders;

use App\Models\Evaluation;
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
            AnneeSeeder::class,
            PermissionRoleSeeder::class,
            PersonnelSeeder::class,
            UserSeeder::class,
            ModelHasRolesSeeder::class,
            CycleSeeder::class,
            ClasseSeeder::class,
            FraisSeeder::class,
            TrimestreSeeder::class,
            EvaluationSeeder::class,
        ]);
    }
}
