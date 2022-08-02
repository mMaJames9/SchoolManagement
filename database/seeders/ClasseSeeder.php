<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'id' => 1,
                'nom_section' => 'Francophone',
                'nom_classe' => 'Pre-Maternelle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => null,
                'enseignant_id' => null,
            ],
            [
                'id' => 2,
                'nom_section' => 'Francophone',
                'nom_classe' => 'Petite ou Moyenne Section',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 1,
                'enseignant_id' => null,
            ],
            [
                'id' => 3,
                'nom_section' => 'Francophone',
                'nom_classe' => 'Grande Section',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 1,
                'enseignant_id' => null,
            ],
            [
                'id' => 4,
                'nom_section' => 'Francophone',
                'nom_classe' => 'SIL',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 2,
                'enseignant_id' => null,
            ],
            [
                'id' => 5,
                'nom_section' => 'Francophone',
                'nom_classe' => 'CP - CPS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 2,
                'enseignant_id' => null,
            ],
            [
                'id' => 6,
                'nom_section' => 'Francophone',
                'nom_classe' => 'CE1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 2,
                'enseignant_id' => null,
            ],
            [
                'id' => 7,
                'nom_section' => 'Francophone',
                'nom_classe' => 'CE2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 2,
                'enseignant_id' => null,
            ],
            [
                'id' => 8,
                'nom_section' => 'Francophone',
                'nom_classe' => 'CM1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 2,
                'enseignant_id' => null,
            ],
            [
                'id' => 9,
                'nom_section' => 'Francophone',
                'nom_classe' => 'CM2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => null,
                'enseignant_id' => null,
            ],
            [
                'id' => 10,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Pre-Nursery',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => null,
                'enseignant_id' => null,
            ],
            [
                'id' => 11,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Nursery 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 3,
                'enseignant_id' => null,
            ],
            [
                'id' => 12,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Nursery 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 3,
                'enseignant_id' => null,
            ],
            [
                'id' => 13,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 4,
                'enseignant_id' => null,
            ],
            [
                'id' => 14,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 4,
                'enseignant_id' => null,
            ],
            [
                'id' => 15,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 4,
                'enseignant_id' => null,
            ],
            [
                'id' => 16,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 4,
                'enseignant_id' => null,
            ],
            [
                'id' => 17,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => 4,
                'enseignant_id' => null,
            ],
            [
                'id' => 18,
                'nom_section' => 'Anglophone',
                'nom_classe' => 'Class 6',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'cycle_id' => null,
                'enseignant_id' => null,
            ],
        ]);
    }
}
