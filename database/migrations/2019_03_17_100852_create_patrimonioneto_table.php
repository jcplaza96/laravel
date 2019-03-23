<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatrimonionetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrimonioneto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> bigInteger('pasivo_id')->unsigned();
            $table->double('totalFondosPropios');
            $table->double('totalCapital');
            $table->double('capitalEscriturado');
            $table->double('capitalNoExigido');
            $table->double('primaEmision');
            $table->double('totalReservas');
            $table->double('reservaCapitalizacion');
            $table->double('otrasReservas');
            $table->double('accionesParticipacionesPatrimonioPropias');
            $table->double('resultadosEjerciciosAnteriores');
            $table->double('otrasAportacionesSocios');
            $table->double('resultadoEjercicio');
            $table->double('dividentoCuenta');
            $table->double('ajustesPatrimonioNeto');
            $table->double('subvencionesDonacionesLegados');
            $table->double('totalPatrimonioNeto');
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
        Schema::dropIfExists('patrimonioneto');
    }
}
