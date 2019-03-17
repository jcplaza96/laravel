<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToPasivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasivo', function (Blueprint $table) {
            $table->foreign('patrimonioneto_id')->references('id')->on('patrimonioneto')->onDelete('cascade');
            $table->foreign('pasivonocorriente_id')->references('id')->on('pasivonocorriente')->onDelete('cascade');
            $table->foreign('pasivocorriente_id')->references('id')->on('pasivocorriente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasivo', function (Blueprint $table) {
            //
        });
    }
}
