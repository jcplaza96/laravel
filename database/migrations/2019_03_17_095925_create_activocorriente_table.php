<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activocorriente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('existencias');
            $table-> bigInteger('deudorescomerciales_id')->unsigned();
            $table->double('inversionesEmpresasGrupo');
            $table->double('inversionesFinancierasCortoPlazo');
            $table->double('periodificacionesCortoPlazo');
            $table->double('efectivoActivosLiquidos');
            $table->double('totalActivoCorriente');
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
        Schema::dropIfExists('activocorriente');
    }
}
