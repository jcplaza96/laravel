<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BalancesImport;
use App\Empresa;
use App\perdidasGanancias;

class perdidasGananciasController extends Controller
{
    //

    public function getDetails($empresa_id, $perdidasGanancias_id)
    {

        $perdidasGanancias = perdidasGanancias::findOrFail($perdidasGanancias_id);

        $e = Empresa::findOrFail($empresa_id);
        $perdidasGananciasAnterior = $e-> perdidasGanancias()->where('anio', $perdidasGanancias->anio - 1)->firstOrFail();

        return view( 'perdidasGanancias.detalles', [ 'perdidasGanancias' => $perdidasGanancias, 'perdidasGananciasAnterior' => $perdidasGananciasAnterior, 'empresa_id' => $empresa_id]);
    }

    public function getImport($empresa_id)
    {
        return view('perdidasGanancias.import', ['empresa' => $empresa_id]);
    }


    public function postImport($empresa_id, Request $request)
    {

        /*$this->validate($request, [
            'excel' => 'required|mimes:XLS|max:2048',
        ]);*/

        if ($request->hasFile('excel')) {
            $excel = $request->file('excel');
            $arrayDatos = Excel::toArray(new BalancesImport, $request->file('excel'));

            /*echo "<pre>";
            print_r($arrayDatos[0]);
            echo "</pre>";
            exit();*/
            $this->importExcel($request->anio, $empresa_id, $arrayDatos[0]);
        }
    }

    public function importExcel($anio, $empresa, $arrayDatos)
    {
        //$arrayDatos = Excel::toArray(new BalancesImport,'prueba.XLS')[0];
        $e = Empresa::findOrFail($empresa);

        if ($e->perdidasGanancias()->where('anio', $anio)->first() === null) {
            for ($i = 6; $i <= 7; $i++) {

                $perdidasGanancias = new perdidasGanancias();
                $perdidasGanancias->empresa_id = $empresa;
                $perdidasGanancias->anio = $anio;
                $perdidasGanancias->importeNetoCifraNegocios = $arrayDatos[7][$i];
                $perdidasGanancias->variacionExistenciasProductos = $arrayDatos[8][$i];
                $perdidasGanancias->trabajosEmpresaActivo = $arrayDatos[9][$i];
                $perdidasGanancias->aprovisionamientos = $arrayDatos[10][$i];
                $perdidasGanancias->otrosIngresosExplotacion = $arrayDatos[11][$i];
                $perdidasGanancias->gastosPersonal = $arrayDatos[12][$i];
                $perdidasGanancias->otrosGastosExplotacion = $arrayDatos[13][$i];
                $perdidasGanancias->amortizaciónInmovilizado = $arrayDatos[14][$i];
                $perdidasGanancias->imputacionSubvencionesInmovilizado = $arrayDatos[15][$i];
                $perdidasGanancias->excesosProvisiones = $arrayDatos[16][$i];
                $perdidasGanancias->deterioroResultadoEnajenaciones = $arrayDatos[17][$i];
                $perdidasGanancias->otrosResultados = $arrayDatos[18][$i];
                $perdidasGanancias->resultadoExplotacion = $arrayDatos[19][$i];
                $perdidasGanancias->totalIngresosFinancieros = $arrayDatos[20][$i];
                $perdidasGanancias->inputacionSubvencionesFinanciero = $arrayDatos[21][$i];
                $perdidasGanancias->otrosIngresosFinancieros = $arrayDatos[22][$i];
                $perdidasGanancias->gastosFinancieros = $arrayDatos[23][$i];
                $perdidasGanancias->variacionValorRazonable = $arrayDatos[24][$i];
                $perdidasGanancias->diferenciasCambio = $arrayDatos[25][$i];
                $perdidasGanancias->deterioroInstrumentosFinancieros = $arrayDatos[26][$i];
                $perdidasGanancias->totalIngresosGastosFinancieros = $arrayDatos[27][$i];
                $perdidasGanancias->incorporacionActivoFinanciero = $arrayDatos[28][$i];
                $perdidasGanancias->ingresosConvenioAcreedores = $arrayDatos[29][$i];
                $perdidasGanancias->restoIngresosGastos = $arrayDatos[30][$i];
                $perdidasGanancias->resultadoFInanciero = $arrayDatos[31][$i];
                $perdidasGanancias->resultadoAntesImpuestos = $arrayDatos[32][$i];
                $perdidasGanancias->impuestosBeneficios = $arrayDatos[33][$i];
                $perdidasGanancias->resultadoEjercicio = $arrayDatos[34][$i];
                $perdidasGanancias->save();

                if ($e->perdidasGanancias()->where('anio', $anio - 1)->first() != null) {
                    $i = 8;
                } else {
                    $anio -= 1;
                }
            }
        }
    }
}
