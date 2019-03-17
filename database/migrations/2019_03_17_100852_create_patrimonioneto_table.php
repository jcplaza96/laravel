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
            $table-> bigInteger('fondospropios_id')->unsigned();
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
