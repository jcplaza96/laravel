<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToFondospropiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fondospropios', function (Blueprint $table) {
            $table->foreign('capital_id')->references('id')->on('capital')->onDelete('cascade');
            $table->foreign('reservas_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fondospropios', function (Blueprint $table) {
            //
        });
    }
}
