<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToPasivonocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasivonocorriente', function (Blueprint $table) {
            $table->foreign('deudaslargoplazo_id')->references('id')->on('deudaslargoplazo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasivonocorriente', function (Blueprint $table) {
            //
        });
    }
}
