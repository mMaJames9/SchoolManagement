<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FraisSeeder extends Seeder
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

        DB::table('frais')->insert([

            // Inscription
            [
                'id' => 1,
                'type_frais' => 'Inscription',
                'montant_frais' => 10000,
                'date_echeance' => Carbon::create($year, 9, 5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            // Pre-Maternelle & Pre-Nursery
            [
                'id' => 2,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 45000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 3,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 45000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 4,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 5,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 6,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 7,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            // Cycle Maternelle et Nursery
            [
                'id' => 8,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
                'annee_id' => 1,
            ],

            [
                'id' => 9,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
                'annee_id' => 1,
            ],

            [
                'id' => 10,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
                'annee_id' => 1,
            ],
            [
                'id' => 11,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
                'annee_id' => 1,
            ],

            [
                'id' => 12,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
                'annee_id' => 1,
            ],
            [
                'id' => 13,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
                'annee_id' => 1,
            ],

            // Cycle Primaire et Primary
            [
                'id' => 14,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
                'annee_id' => 1,
            ],

            [
                'id' => 15,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
                'annee_id' => 1,
            ],

            [
                'id' => 16,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
                'annee_id' => 1,
            ],
            [
                'id' => 17,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
                'annee_id' => 1,
            ],

            [
                'id' => 18,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 20000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
                'annee_id' => 1,
            ],
            [
                'id' => 19,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 20000,
                'date_echeance' => Carbon::create($next_year, 1, 10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
                'annee_id' => 1,
            ],

            // Classe CM2 & Class 6
            [
                'id' => 20,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 60000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 9,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 21,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 60000,
                'date_echeance' => Carbon::create($year, 9, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 18,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 22,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 35000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 9,
                'cycle_id' => null,
                'annee_id' => 1,
            ],

            [
                'id' => 23,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 35000,
                'date_echeance' => Carbon::create($year, 11, 15),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 18,
                'cycle_id' => null,
                'annee_id' => 1,
            ],
        ]);
    }
}
