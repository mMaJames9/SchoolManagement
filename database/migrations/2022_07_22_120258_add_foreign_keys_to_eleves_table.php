<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eleves', function (Blueprint $table) {
            $table->foreignId('famille_id')
            ->nullable()
            ->constrained('familles')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('classe_id')
            ->nullable()
            ->constrained('classes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('parcours_id')
            ->nullable()
            ->constrained('parcourss')
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
        Schema::table('eleves', function (Blueprint $table) {
            $table->dropForeign(['famille_id']);
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['parcours_id']);
        });
    }
}
