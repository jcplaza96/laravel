<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcreedorescomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acreedorescomerciales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proveedores_id')->unsigned();
            $table->double('otrosAcreedores');
            $table->double('totalAcreedoresComerciales');
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
        Schema::dropIfExists('acreedorescomerciales');
    }
}
