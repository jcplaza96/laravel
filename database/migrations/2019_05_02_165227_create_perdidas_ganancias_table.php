<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerdidasGananciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('perdidasGanancias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('empresa_id')->unsigned();
            $table->integer('anio');
            $table->double('importeNetoCifraNegocios');
            $table->double('variacionExistenciasProductos');
            $table->double('trabajosEmpresaActivo');
            $table->double('aprovisionamientos');
            $table->double('otrosIngresosExplotacion');
            $table->double('gastosPersonal');
            $table->double('otrosGastosExplotacion');
            $table->double('amortizaciónInmovilizado');
            $table->double('imputacionSubvencionesInmovilizado');
            $table->double('excesosProvisiones');
            $table->double('deterioroResultadoEnajenaciones');
            $table->double('otrosResultados');
            $table->double('resultadoExplotacion');
            $table->double('totalIngresosFinancieros');
            $table->double('inputacionSubvencionesFinanciero');
            $table->double('otrosIngresosFinancieros');
            $table->double('gastosFinancieros');
            $table->double('variacionValorRazonable');
            $table->double('diferenciasCambio');
            $table->double('deterioroInstrumentosFinancieros');
            $table->double('totalIngresosGastosFinancieros');
            $table->double('incorporacionActivoFinanciero');
            $table->double('ingresosConvenioAcreedores');
            $table->double('restoIngresosGastos');
            $table->double('resultadoFInanciero');
            $table->double('resultadoAntesImpuestos');
            $table->double('impuestosBeneficios');
            $table->double('resultadoEjercicio');
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
        Schema::dropIfExists('perdidasGanancias');
    }
}
