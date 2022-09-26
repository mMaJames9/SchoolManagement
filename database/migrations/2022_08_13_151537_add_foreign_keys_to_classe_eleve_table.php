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
        Schema::table('classe_eleve', function (Blueprint $table) {
            $table->foreignId('classe_id')
            ->nullable()
            ->constrained('classes')
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
        Schema::table('classe_eleve', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropForeign(['eleve_id']);
        });
    }
};
