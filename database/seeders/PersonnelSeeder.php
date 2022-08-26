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
                'nom_personnel' => 'MISSE MISSE',
                'prenom_personnel' => 'Anthony James',
                'birthday_personnel' => '1999-02-03',
                'phone_number' => '+237 696 638 725',
                'experience_personnel' => 3,
                'cv_personnel' => 'Qq5k7YtGozbt27Vga6wfJJTsjCTgHJg355fkHhzF.pdf',
                'debut_contrat' => null,
                'fin_contrat' => null,
                'salaire' => 120000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
