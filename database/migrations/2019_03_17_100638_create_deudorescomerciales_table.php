<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudorescomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudorescomerciales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('clientesventasyprestacionesservicios_id')->unsigned();
            $table->double('accionistasDesembolsosExigidos');
            $table->double('otrosDeudores');
            $table->double('totalDeudoresComerciales');
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
        Schema::dropIfExists('deudorescomerciales');
    }
}
