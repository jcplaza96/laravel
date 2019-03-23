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
            $table-> bigInteger('activo_id')->unsigned();
            $table->double('existencias');
            $table->double('totalDeudoresComerciales');
            $table->double('totalClientesVentas');
            $table->double('ClientesVentasLargoPlazo');
            $table->double('ClientesVentasCortoPlazo');
            $table->double('accionistasDesembolsosExigidos');
            $table->double('otrosDeudores');
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
