<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnels')->insert([
            [
                'id' => 1,
                'nom_personnel' => 'KENMOE',
                'prenom_personnel' => 'Sylvie',
                'birthday_personnel' => '1970-08-09',
                'phone_number' => '+237 699 909 321',
                'experience_personnel' => '2000-01-01',
                'cv_personnel' => null,
                'debut_contrat' => null,
                'fin_contrat' => null,
                'salaire' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'id' => 2,
                'nom_personnel' => 'FOZEU NGUIFFO',
                'prenom_personnel' => 'Armel Brice',
                'birthday_personnel' => '1998-08-06',
                'phone_number' => '+237 693 387 481',
                'experience_personnel' => '2020-01-01',
                'cv_personnel' => null,
                'debut_contrat' => null,
                'fin_contrat' => null,
                'salaire' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
