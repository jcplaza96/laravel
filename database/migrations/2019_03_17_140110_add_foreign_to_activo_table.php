<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToActivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activo', function (Blueprint $table) {
            $table->foreign('activocorriente_id')->references('id')->on('activocorriente')->onDelete('cascade');
            $table->foreign( 'activonocorriente_id')->references('id')->on( 'activonocorriente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activo', function (Blueprint $table) {
            //
        });
    }
}
