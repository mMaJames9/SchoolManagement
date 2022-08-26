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
            $table->string('nom_eleve');
            $table->string('prenom_eleve');
            $table->date('birthday_eleve');
            $table->string('lieu_naissance');
            $table->integer('sexe_eleve');
            $table->string('acte_naissance');
            $table->string('carnet_vaccination')->nullable();
            $table->string('photo_profil_eleve', 2048);
            $table->string('maladie_hereditaire')->nullable();
            $table->string('maladie_chronique')->nullable();
            $table->string('alergie_aliment')->nullable();
            $table->string('alergie_medicament')->nullable();
            $table->string('alergie_substance')->nullable();
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
