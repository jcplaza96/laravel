<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToPasivocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasivocorriente', function (Blueprint $table) {
            $table->foreign('deudascortoplazo_id')->references('id')->on('deudascortoplazo')->onDelete('cascade');
            $table->foreign('acreedorescomerciales_id')->references('id')->on('acreedorescomerciales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasivocorriente', function (Blueprint $table) {
            //
        });
    }
}
