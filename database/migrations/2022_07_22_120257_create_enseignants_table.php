<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_enseignant')->unique();
            $table->string('nom_enseignant');
            $table->string('prenom_enseignant');
            $table->string('num_tel_enseignant')->unique();;
            $table->date('birthday_enseignant');
            $table->integer('experience_enseignant');
            $table->string('cv_enseignant');
            $table->string('photo_profil_enseignant', 2048);
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
        Schema::dropIfExists('enseignants');
    }
}
