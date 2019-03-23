<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivonocorrienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activonocorriente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('activo_id')->unsigned();
            $table->double('inmovilizadoIntangible');
            $table->double('inmovilizadoMaterial');
            $table->double('inversionesInmoviliarias');
            $table->double('inversionesEmpresasGrupo');
            $table->double('inversionesFinancierasLargoPlazo');
            $table->double('activosImpuestoDiferido');
            $table->double('deudoresComercialesNoCorriente');
            $table->double('totalActivoNoCorriente');
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
        Schema::dropIfExists('activonocorriente');
    }
}
