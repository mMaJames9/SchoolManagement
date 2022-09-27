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
                'phone_number' => '+237693387481',
                'experience_personnel' => 20,
                'cv_personnel' => 'Qq5k7YtGozbt27Vga6wfJJTsjCTgHJg355fkHhzF.pdf',
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
