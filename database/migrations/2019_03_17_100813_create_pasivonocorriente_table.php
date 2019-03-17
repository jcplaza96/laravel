<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasivonocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasivonocorriente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('provisionesLargoPlazo');
            $table-> bigInteger('deudaslargoplazo_id')->unsigned();
            $table->double('deudasEmpresasGrupo');
            $table->double('pasivosImpuestoDiferido');
            $table->double('periodificacionesLargoPlazo');
            $table->double('acreedoresComercialesNoCorrientes');
            $table->double('deudaCaracteristicasEspeciales');
            $table->double('totalPasivoNoCorriente');
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
        Schema::dropIfExists('pasivonocorriente');
    }
}
