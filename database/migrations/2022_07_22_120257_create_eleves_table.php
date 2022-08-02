<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('matricule_eleve')->unique();
            $table->string('nom_eleve')->nullable();
            $table->string('prenom_eleve')->nullable();
            $table->integer('age_eleve')->nullable();
            $table->integer('sexe_eleve')->nullable();
            $table->string('photo_profil_eleve')->nullable();
            $table->string('maladie_hereditaire')->nullable();
            $table->string('acte_naissance')->nullable();
            $table->string('fiche_renseignement')->nullable();
            $table->string('carnet_vaccination')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
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
        Schema::dropIfExists('eleves');
    }
}
