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
        DB::table('frais')->insert([

            // Inscription
            [
                'id' => 1,
                'type_frais' => 'Inscription',
                'montant_frais' => 10000,
                'date_echeance' => Carbon::create(2022, 9, 5),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => null,
            ],

            // Pre-Maternelle & Pre-Nursery
            [
                'id' => 2,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 45000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
            ],

            [
                'id' => 3,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 45000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
            ],

            [
                'id' => 4,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
            ],

            [
                'id' => 5,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
            ],

            [
                'id' => 6,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 1,
                'cycle_id' => null,
            ],

            [
                'id' => 7,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 10,
                'cycle_id' => null,
            ],

            // Cycle Maternelle et Nursery
            [
                'id' => 8,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
            ],

            [
                'id' => 9,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
            ],

            [
                'id' => 10,
                'type_frais' => '2ere Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
            ],
            [
                'id' => 11,
                'type_frais' => '2ere Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
            ],

            [
                'id' => 12,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 1,
            ],
            [
                'id' => 13,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 25000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 3,
            ],

            // Cycle Primaire et Primary
            [
                'id' => 14,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
            ],

            [
                'id' => 15,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 40000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
            ],

            [
                'id' => 16,
                'type_frais' => '2ere Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
            ],
            [
                'id' => 17,
                'type_frais' => '2ere Tranche',
                'montant_frais' => 30000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
            ],

            [
                'id' => 18,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 20000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 2,
            ],
            [
                'id' => 19,
                'type_frais' => '3eme Tranche',
                'montant_frais' => 20000,
                'date_echeance' => Carbon::create(2023, 1, 10),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => null,
                'cycle_id' => 4,
            ],

            // Classe CM2 & Class 6
            [
                'id' => 20,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 60000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 9,
                'cycle_id' => null,
            ],

            [
                'id' => 21,
                'type_frais' => '1ere Tranche',
                'montant_frais' => 60000,
                'date_echeance' => Carbon::create(2022, 9, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 18,
                'cycle_id' => null,
            ],

            [
                'id' => 22,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 35000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 9,
                'cycle_id' => null,
            ],

            [
                'id' => 23,
                'type_frais' => '2eme Tranche',
                'montant_frais' => 35000,
                'date_echeance' => Carbon::create(2022, 11, 15),
                'date_debut' => Carbon::create(2022, 9),
                'date_fin' => Carbon::create(2023, 6),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'classe_id' => 18,
                'cycle_id' => null,
            ],
        ]);
    }
}
