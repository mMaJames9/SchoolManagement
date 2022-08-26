<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frais', function (Blueprint $table) {
            $table->foreignId('classe_id')
            ->nullable()
            ->constrained('classes')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('cycle_id')
            ->nullable()
            ->constrained('cycles')
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
        Schema::table('frais', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['cycle_id']);
            $table->dropForeign(['annee_id']);
        });
    }
}
