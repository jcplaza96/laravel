<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToAcreedorescomercialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acreedorescomerciales', function (Blueprint $table) {
            $table->foreign('proveedores_id')->references('id')->on( 'proveedores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acreedorescomerciales', function (Blueprint $table) {
            //
        });
    }
}
