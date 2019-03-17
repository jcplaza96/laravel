<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondospropiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondospropios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('capital_id')->unsigned();
            $table->double('primaEmision');
            $table->bigInteger('reservas_id')->unsigned();
            $table->double('accionesParticipaciones');
            $table->double('resultadosEjerciciosAnteriores');
            $table->double('otrasAportacionesSocios');
            $table->double('resultadoEjercicio');
            $table->double('dividendoCuenta');
            $table->double('totalFondosPropios');
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
        Schema::dropIfExists('fondospropios');
    }
}
