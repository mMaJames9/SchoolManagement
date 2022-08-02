<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMatiereNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matiere_note', function (Blueprint $table) {
            $table->foreignId('note_id')
            ->nullable()
            ->constrained('notes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('matiere_id')
            ->nullable()
            ->constrained('matieres')
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
        Schema::table('matiere_note', function (Blueprint $table) {
            $table->dropForeign(['note_id']);
            $table->dropForeign(['matiere_id']);
        });
    }
}
