<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->foreignId('eleve_id')
            ->nullable()
            ->constrained('eleves')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('matiere_id')
            ->nullable()
            ->constrained('matieres')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('evaluation_id')
            ->nullable()
            ->constrained('evaluations')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('annee_id')
            ->nullable()
            ->constrained('annees')
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
        Schema::table('notes', function (Blueprint $table) {
            $table->dropForeign(['eleve_id']);
            $table->dropForeign(['matiere_id']);
            $table->dropForeign(['evaluation_id']);
            $table->dropForeign(['annee_id']);
        });
    }
}
