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

    public function getCreate($empresa_id)
    {
        $i = 0;
        return view('perdidasGanancias.create', ['empresa_id' => $empresa_id, 'i' => $i]);
    }

    public function getDetails($empresa_id, $perdidasGanancias_id)
    {

        $perdidasGanancias = perdidasGanancias::findOrFail($perdidasGanancias_id);

        $e = Empresa::findOrFail($empresa_id);
        $perdidasGananciasAnterior = $e-> perdidasGanancias()->where('anio', $perdidasGanancias->anio - 1)->firstOrFail();

        return view( 'perdidasGanancias.detalles', [ 'perdidasGanancias' => $perdidasGanancias, 'perdidasGananciasAnterior' => $perdidasGananciasAnterior, 'empresa_id' => $empresa_id]);
    }

    public function getEdit($empresa_id, $perdidasGanancias_id)
    {

        $perdidasGanancias = perdidasGanancias::findOrFail($perdidasGanancias_id);

        $e = Empresa::findOrFail($empresa_id);
        $perdidasGananciasAnterior = $e->perdidasGanancias()->where('anio', $perdidasGanancias->anio - 1)->firstOrFail();

        $i=0;

        return view('perdidasGanancias.edit', ['perdidasGanancias' => $perdidasGanancias, 'perdidasGananciasAnterior' => $perdidasGananciasAnterior, 'empresa_id' => $empresa_id, 'i' => $i]);
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
            return $this->importExcel($request->anio, $empresa_id, $arrayDatos[0]);
        }
    }

    public function putEdit(Request $request, $empresa_id)
    {
        //$arrayDatos = Excel::toArray(new BalancesImport,'prueba.XLS')[0];
        $e = Empresa::findOrFail($empresa_id);

        $arrayDatos = $request['informe'];
        $anio = $arrayDatos[1][0];

        $perdidasGanancias = $e->perdidasGanancias()->where('anio', $anio)->firstOrFail();
        if ( $perdidasGanancias != null) {
            for ($i = 0; $i <= 1; $i++) {

                $perdidasGanancias->importeNetoCifraNegocios = $arrayDatos[2][$i];
                $perdidasGanancias->variacionExistenciasProductos = $arrayDatos[3][$i];
                $perdidasGanancias->trabajosEmpresaActivo = $arrayDatos[4][$i];
                $perdidasGanancias->aprovisionamientos = $arrayDatos[5][$i];
                $perdidasGanancias->otrosIngresosExplotacion = $arrayDatos[6][$i];
                $perdidasGanancias->gastosPersonal = $arrayDatos[7][$i];
                $perdidasGanancias->otrosGastosExplotacion = $arrayDatos[8][$i];
                $perdidasGanancias->amortizaciónInmovilizado = $arrayDatos[9][$i];
                $perdidasGanancias->imputacionSubvencionesInmovilizado = $arrayDatos[10][$i];
                $perdidasGanancias->excesosProvisiones = $arrayDatos[11][$i];
                $perdidasGanancias->deterioroResultadoEnajenaciones = $arrayDatos[12][$i];
                $perdidasGanancias->otrosResultados = $arrayDatos[13][$i];
                $perdidasGanancias->resultadoExplotacion = $arrayDatos[14][$i];
                $perdidasGanancias->totalIngresosFinancieros = $arrayDatos[15][$i];
                $perdidasGanancias->inputacionSubvencionesFinanciero = $arrayDatos[16][$i];
                $perdidasGanancias->otrosIngresosFinancieros = $arrayDatos[17][$i];
                $perdidasGanancias->gastosFinancieros = $arrayDatos[18][$i];
                $perdidasGanancias->variacionValorRazonable = $arrayDatos[19][$i];
                $perdidasGanancias->diferenciasCambio = $arrayDatos[20][$i];
                $perdidasGanancias->deterioroInstrumentosFinancieros = $arrayDatos[21][$i];
                $perdidasGanancias->totalIngresosGastosFinancieros = $arrayDatos[22][$i];
                $perdidasGanancias->incorporacionActivoFinanciero = $arrayDatos[23][$i];
                $perdidasGanancias->ingresosConvenioAcreedores = $arrayDatos[24][$i];
                $perdidasGanancias->restoIngresosGastos = $arrayDatos[25][$i];
                $perdidasGanancias->resultadoFinanciero = $arrayDatos[26][$i];
                $perdidasGanancias->resultadoAntesImpuestos = $arrayDatos[27][$i];
                $perdidasGanancias->impuestosBeneficios = $arrayDatos[28][$i];
                $perdidasGanancias->resultadoEjercicio = $arrayDatos[29][$i];
                $perdidasGanancias->save();
                if ($i == 0) {
                    $informe_id = $perdidasGanancias->id;
                }

                $perdidasGanancias = $e->perdidasGanancias()->where('anio', $anio - 1)->first();
            }
            return $this->getDetails($empresa_id, $informe_id);
        }
    }

    public function postCreate(Request $request, $empresa_id)
    {
        //$arrayDatos = Excel::toArray(new BalancesImport,'prueba.XLS')[0];
        $e = Empresa::findOrFail($empresa_id);

        $arrayDatos = $request['informe'];
        $anio = $arrayDatos[1][0];
        if ($e->perdidasGanancias()->where('anio', $anio)->first() === null) {
            for ($i = 0; $i <= 1; $i++) {

                $perdidasGanancias = new perdidasGanancias();
                $perdidasGanancias->empresa_id = $empresa_id;
                $perdidasGanancias->anio = $anio;
                $perdidasGanancias->importeNetoCifraNegocios = $arrayDatos[2][$i];
                $perdidasGanancias->variacionExistenciasProductos = $arrayDatos[3][$i];
                $perdidasGanancias->trabajosEmpresaActivo = $arrayDatos[4][$i];
                $perdidasGanancias->aprovisionamientos = $arrayDatos[5][$i];
                $perdidasGanancias->otrosIngresosExplotacion = $arrayDatos[6][$i];
                $perdidasGanancias->gastosPersonal = $arrayDatos[7][$i];
                $perdidasGanancias->otrosGastosExplotacion = $arrayDatos[8][$i];
                $perdidasGanancias->amortizaciónInmovilizado = $arrayDatos[9][$i];
                $perdidasGanancias->imputacionSubvencionesInmovilizado = $arrayDatos[10][$i];
                $perdidasGanancias->excesosProvisiones = $arrayDatos[11][$i];
                $perdidasGanancias->deterioroResultadoEnajenaciones = $arrayDatos[12][$i];
                $perdidasGanancias->otrosResultados = $arrayDatos[13][$i];
                $perdidasGanancias->resultadoExplotacion = $arrayDatos[14][$i];
                $perdidasGanancias->totalIngresosFinancieros = $arrayDatos[15][$i];
                $perdidasGanancias->inputacionSubvencionesFinanciero = $arrayDatos[16][$i];
                $perdidasGanancias->otrosIngresosFinancieros = $arrayDatos[17][$i];
                $perdidasGanancias->gastosFinancieros = $arrayDatos[18][$i];
                $perdidasGanancias->variacionValorRazonable = $arrayDatos[19][$i];
                $perdidasGanancias->diferenciasCambio = $arrayDatos[20][$i];
                $perdidasGanancias->deterioroInstrumentosFinancieros = $arrayDatos[21][$i];
                $perdidasGanancias->totalIngresosGastosFinancieros = $arrayDatos[22][$i];
                $perdidasGanancias->incorporacionActivoFinanciero = $arrayDatos[23][$i];
                $perdidasGanancias->ingresosConvenioAcreedores = $arrayDatos[24][$i];
                $perdidasGanancias->restoIngresosGastos = $arrayDatos[25][$i];
                $perdidasGanancias->resultadoFinanciero = $arrayDatos[26][$i];
                $perdidasGanancias->resultadoAntesImpuestos = $arrayDatos[27][$i];
                $perdidasGanancias->impuestosBeneficios = $arrayDatos[28][$i];
                $perdidasGanancias->resultadoEjercicio = $arrayDatos[29][$i];
                $perdidasGanancias->save();
                if ($i == 0) {
                    $informe_id = $perdidasGanancias->id;
                }

                if ($e->perdidasGanancias()->where('anio', $anio - 1)->first() != null) {
                    $i = 2;
                } else {
                    $anio -= 1;
                }
            }
            return $this->getDetails($empresa_id, $informe_id);
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
                $perdidasGanancias->resultadoFinanciero = $arrayDatos[31][$i];
                $perdidasGanancias->resultadoAntesImpuestos = $arrayDatos[32][$i];
                $perdidasGanancias->impuestosBeneficios = $arrayDatos[33][$i];
                $perdidasGanancias->resultadoEjercicio = $arrayDatos[34][$i];
                $perdidasGanancias->save();

                if ($i == 6) {
                    $informe_id = $perdidasGanancias->id;
                }

                if ($e->perdidasGanancias()->where('anio', $anio - 1)->first() != null) {
                    $i = 8;
                } else {
                    $anio -= 1;
                }
            }
            return $this->getDetails($empresa, $informe_id);
        }
    }
}
