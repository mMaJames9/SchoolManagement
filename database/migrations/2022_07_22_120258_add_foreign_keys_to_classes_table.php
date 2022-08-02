<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->foreignId('cycle_id')
            ->nullable()
            ->constrained('cycles')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('enseignant_id')
            ->nullable()
            ->constrained('enseignants')
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
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign(['cycle_id']);
            $table->dropForeign(['enseignant_id']);
        });
    }
}
