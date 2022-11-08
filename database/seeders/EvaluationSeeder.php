<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluations')->insert([
            [
                'id' => 1,
                'num_evaluation' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 1
            ],
            [
                'id' => 2,
                'num_evaluation' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 1
            ],
            [
                'id' => 3,
                'num_evaluation' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 1
            ],
            [
                'id' => 4,
                'num_evaluation' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 2
            ],
            [
                'id' => 5,
                'num_evaluation' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 2
            ],
            [
                'id' => 6,
                'num_evaluation' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 2
            ],
            [
                'id' => 7,
                'num_evaluation' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 3
            ],
            [
                'id' => 8,
                'num_evaluation' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'trimestre_id' => 3
            ],
        ]);
    }
}

