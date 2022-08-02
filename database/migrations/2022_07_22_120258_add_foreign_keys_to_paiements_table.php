<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->foreignId('eleve_id')
            ->nullable()
            ->constrained('eleves')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('frais_id')
            ->nullable()
            ->constrained('fraiss')
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
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign(['eleve_id']);
            $table->dropForeign(['frais_id']);
        });
    }
}
