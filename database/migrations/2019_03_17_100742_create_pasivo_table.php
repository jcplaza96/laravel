<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patrimonioneto_id')->unsigned();
            $table->bigInteger('pasivonocorriente_id')->unsigned();
            $table->bigInteger('pasivocorriente_id')->unsigned();
            $table->double('totalPasivo');
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
        Schema::dropIfExists('pasivo');
    }
}
