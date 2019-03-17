<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasivocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasivocorriente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('provisionesCortoPlazo');
            $table->bigInteger('deudascortoplazo_id')->unsigned();
            $table->double('deudasEmpresasGrupo');
            $table->bigInteger('acreedorescomerciales_id')->unsigned();
            $table->double('periodificacionesCortoPlazo');
            $table->double('deudaCaracteristicasEspeciales');
            $table->double('totalPasivoCorriente');
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
        Schema::dropIfExists('pasivocorriente');
    }
}
