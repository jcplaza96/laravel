<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudaslargoplazoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudaslargoplazo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('deudaEntidadesCredito');
            $table->double('acreedoresArrendamientoFinanciero');
            $table->double('otrasDeudasLargoPlazo');
            $table->double('totalDeudasLargoPlazo');
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
        Schema::dropIfExists('deudaslargoplazo');
    }
}
