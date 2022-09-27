<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_personnel');
            $table->string('prenom_personnel');
            $table->date('birthday_personnel');
            $table->string('phone_number')->unique();
            $table->date('experience_personnel');
            $table->string('cv_personnel')->nullable();
            $table->string('photo_profil_personnel', 2048)->default('default-avatar.png');
            $table->date('debut_contrat')->nullable();
            $table->date('fin_contrat')->nullable();
            $table->integer('salaire')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
};
