<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudascortoplazoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudascortoplazo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('deudasEntidadesCredito');
            $table->double('acreedoresArrendamientoFinanciero');
            $table->double('otrasDeudasCortoPlazo');
            $table->double('totalDeudasCortoPlazo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deudascortoplazo');
    }
}
