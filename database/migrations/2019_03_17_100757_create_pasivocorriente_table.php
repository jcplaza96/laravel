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
            $table->bigInteger('pasivo_id')->unsigned();
            $table->double('provisionesCortoPlazo');
            $table->double('totalDeudasCortoPlazo');
            $table->double('deudaEntidadesCredito');
            $table->double('acreedoresArrendamientoFinanciero');
            $table->double('otrasDeudasCortoPlazo');
            $table->double('deudasEmpresasGrupo');
            $table->double('totalAcreedoresComerciales_OtrasCuentas');
            $table->double('totalProveedores');
            $table->double('proveedoresLargoPlazo');
            $table->double('proveedoresCortoPlazo');
            $table->double('otrosAcreedores');
            $table->double('periodificacionesCortoPlazo');
            $table->double('deudaCaracteristicasEspecialesCortoPlazo');
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
