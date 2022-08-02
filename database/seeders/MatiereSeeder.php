<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            // Niveau 1
            [
                'id' => 1,
                'intitule_matiere' => 'Dictée',
                'niveau_matiere' => 1,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'intitule_matiere' => 'Ecriture',
                'niveau_matiere' => 1,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 3,
                'intitule_matiere' => 'Conjugaison',
                'niveau_matiere' => 1,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 4,
                'intitule_matiere' => 'Copie',
                'niveau_matiere' => 1,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 5,
                'intitule_matiere' => 'Ecriture',
                'niveau_matiere' => 1,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 6,
                'intitule_matiere' => 'Mathématiques',
                'niveau_matiere' => 1,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 7,
                'intitule_matiere' => 'T.I.C.',
                'niveau_matiere' => 1,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 8,
                'intitule_matiere' => 'Sciences',
                'niveau_matiere' => 1,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            // Niveau 2
            [
                'id' => 9,
                'intitule_matiere' => 'Dictée',
                'niveau_matiere' => 2,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 10,
                'intitule_matiere' => 'Grammaire',
                'niveau_matiere' => 2,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 11,
                'intitule_matiere' => 'Conjugaison',
                'niveau_matiere' => 2,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 12,
                'intitule_matiere' => 'Vocabulaire',
                'niveau_matiere' => 2,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 13,
                'intitule_matiere' => 'Orthographe',
                'niveau_matiere' => 2,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 14,
                'intitule_matiere' => 'Exercices Mathématiques',
                'niveau_matiere' => 2,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 15,
                'intitule_matiere' => 'Résolution Problèmes',
                'niveau_matiere' => 2,
                'coef_matiere' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 16,
                'intitule_matiere' => 'Ecriture',
                'niveau_matiere' => 2,
                'coef_matiere' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 17,
                'intitule_matiere' => 'T.I.C.',
                'niveau_matiere' => 2,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 18,
                'intitule_matiere' => 'Sciences',
                'niveau_matiere' => 2,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],

            // Niveau 3
            [
                'id' => 19,
                'intitule_matiere' => 'Dictée',
                'niveau_matiere' => 3,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 20,
                'intitule_matiere' => 'Ecriture',
                'niveau_matiere' => 3,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 21,
                'intitule_matiere' => 'Etude de texte',
                'niveau_matiere' => 3,
                'coef_matiere' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 22,
                'intitule_matiere' => 'Exercices Mathématiques',
                'niveau_matiere' => 3,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 23,
                'intitule_matiere' => 'Calcul rapide',
                'niveau_matiere' => 3,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 24,
                'intitule_matiere' => 'Résolution des problèmes',
                'niveau_matiere' => 3,
                'coef_matiere' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 25,
                'intitule_matiere' => 'T.I.C.',
                'niveau_matiere' => 3,
                'coef_matiere' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 26,
                'intitule_matiere' => 'Sciences et Culture Générale',
                'niveau_matiere' => 3,
                'coef_matiere' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
