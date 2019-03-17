<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToDeudorescomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deudorescomerciales', function (Blueprint $table) {
            $table->foreign('clientesventasyprestacionesservicios_id', 'fk23')->references('id')->on('clientesventasyprestacionesservicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deudorescomerciales', function (Blueprint $table) {
            //
        });
    }
}
