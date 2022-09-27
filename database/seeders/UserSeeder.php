<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'email' => 'nguiffo@un.org',
                'email_verified_at' => null,
                'password' => Hash::make('ffm@Sy!vie2022'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'personnel_id' => 1,
            ],
            [
                'id' => 2,
                'email' => 'woalash@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('ffm@Sy!vie2022'),
                'remember_token' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
                'personnel_id' => 2,
            ],
        ]);
    }
}
