<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = date('Y');
        $next_year = date('Y', strtotime('+1 Years'));

        for($i = $year; $i < $next_year + 10; $i++)
        {
            DB::table('annees')->insert([
                [
                    'year_from' => $i,
                    'year_to' => ($i+1),
                    'annee_academique' => $i.'-'.($i+1),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}
