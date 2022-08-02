<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEleveMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleve_matiere', function (Blueprint $table) {
            $table->foreignId('matiere_id')
            ->nullable()
            ->constrained('matieres')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('eleve_id')
            ->nullable()
            ->constrained('eleves')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eleve_matiere', function (Blueprint $table) {
            $table->dropForeign(['matiere_id']);
            $table->dropForeign(['eleve_id']);

        });
    }
}
