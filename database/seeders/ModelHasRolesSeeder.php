<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 4,
                'model_type' => null,
                'model_id' => 1,
            ],
            [
                'role_id' => 4,
                'model_type' => null,
                'model_id' => 2,
            ],
        ]);
    }
}
