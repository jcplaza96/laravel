<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BalancesImport;
use App\Empresa;
use App\Balance;
use App\Activo;
use App\Activocorriente;
use App\Activonocorriente;
use App\Pasivocorriente;
use App\Pasivo;
use App\Pasivonocorriente;
use App\Patrimonioneto;

class BalancesController extends Controller
{
    public function getCreate($empresa_id)
    {
        $i=0;
        return view('balance.create',[ 'empresa_id' => $empresa_id, 'i' => $i]);
    }

    public function deleteBalance($empresa_id, $balance_id)
    {
        $balance = Balance::findOrFail($balance_id);
        $balance->delete();

        return app('App\Http\Controllers\EmpresasController')->getDetails($empresa_id);
    }

    public function getDetails($empresa_id, $balance_id){
        $balance = Balance::findOrFail($balance_id);

        $e = Empresa::findOrFail($empresa_id);
        $balanceAnterior = $e->balances()->where('anio', $balance->anio-1)->first();
        if($balanceAnterior==null) $balanceAnterior=$balance;

        return view('balance.detalles', ['balance'=>$balance, 'balanceAnterior'=>$balanceAnterior, 'empresa_id'=>$empresa_id]);
    }

    public function getImport($empresa_id){
        return view('balance.import', ['empresa_id'=>$empresa_id]);
    }

    public function getEdit($empresa_id, $balance_id)
    {
        $balance = Balance::findOrFail($balance_id);

        $i=0;

        $e = Empresa::findOrFail($empresa_id);
        $balanceAnterior = $e->balances()->where('anio', $balance->anio - 1)->firstOrFail();

        return view('balance.edit', ['balance' => $balance, 'balanceAnterior' => $balanceAnterior, 'empresa_id' => $empresa_id, 'i' => $i]);
    }

    public function postImport($empresa_id, Request $request){


        $request->validate([
            'excel' => 'required|mimes:xls|max:2048',
        ]);

        if ($request->hasFile('excel')) {
            $excel = $request->file('excel');
            $arrayDatos = Excel::toArray(new BalancesImport, $request->file('excel'));
            return $this->importExcel($request->anio, $empresa_id, $arrayDatos[0]);
        } 
    }

    public function postCreate(Request $arrayDatos, $empresa_id)
    {
        $e = Empresa::findOrFail($empresa_id);

        $anio = $arrayDatos['balance'][1][0];
        if ($e->balances()->where('anio', $anio)->first() === null) {
            for ($i = 0; $i <= 1; $i++) {

                $balance = new Balance();
                $balance->empresa_id = $empresa_id;
                $balance->anio = $anio;
                $balance->save();

                if ($i == 0) {
                    $balance_id = $balance->id;
                }

                $activo = new Activo();
                $activo->balance_id = $balance->id;
                $activo->totalActivo = $arrayDatos['balance'][2][$i];
                $activo->save();

                $activoNoCorriente = new Activonocorriente();
                $activoNoCorriente->activo_id = $activo->id;
                $activoNoCorriente->inmovilizadoIntangible = $arrayDatos['balance'][4][$i];
                $activoNoCorriente->inmovilizadoMaterial = $arrayDatos['balance'][5][$i];
                $activoNoCorriente->inversionesInmoviliarias = $arrayDatos['balance'][6][$i];
                $activoNoCorriente->inversionesEmpresasGrupo = $arrayDatos['balance'][7][$i];
                $activoNoCorriente->inversionesFinancierasLargoPlazo = $arrayDatos['balance'][8][$i];
                $activoNoCorriente->activosImpuestoDiferido = $arrayDatos['balance'][9][$i];
                $activoNoCorriente->deudoresComercialesNoCorriente = $arrayDatos['balance'][10][$i];
                $activoNoCorriente->totalActivoNoCorriente = $arrayDatos['balance'][3][$i];
                $activoNoCorriente->save();

                $activoCorriente = new Activocorriente();
                $activoCorriente->activo_id = $activo->id;
                $activoCorriente->existencias = $arrayDatos['balance'][12][$i];
                $activoCorriente->totalDeudoresComerciales = $arrayDatos['balance'][13][$i];
                $activoCorriente->totalClientesVentas = $arrayDatos['balance'][14][$i];
                $activoCorriente->ClientesVentasLargoPlazo = $arrayDatos['balance'][15][$i];
                $activoCorriente->ClientesVentasCortoPlazo = $arrayDatos['balance'][16][$i];
                $activoCorriente->accionistasDesembolsosExigidos = $arrayDatos['balance'][17][$i];
                $activoCorriente->otrosDeudores = $arrayDatos['balance'][18][$i];
                $activoCorriente->inversionesEmpresasGrupo = $arrayDatos['balance'][19][$i];
                $activoCorriente->inversionesFinancierasCortoPlazo = $arrayDatos['balance'][20][$i];
                $activoCorriente->periodificacionesCortoPlazo = $arrayDatos['balance'][21][$i];
                $activoCorriente->efectivoActivosLiquidos = $arrayDatos['balance'][22][$i];
                $activoCorriente->totalActivoCorriente = $arrayDatos['balance'][11][$i];
                $activoCorriente->save();

                $pasivo = new Pasivo();
                $pasivo->balance_id = $balance->id;
                $pasivo->totalPasivo = $arrayDatos['balance'][23][$i];
                $pasivo->save();

                $pasivoNoCorriente = new Pasivonocorriente();
                $pasivoNoCorriente->pasivo_id = $pasivo->id;
                $pasivoNoCorriente->provisionesLargoPlazo  = $arrayDatos['balance'][41][$i];
                $pasivoNoCorriente->totalDeudasLargoPlazo = $arrayDatos['balance'][42][$i];
                $pasivoNoCorriente->deudasEntidadesCredito = $arrayDatos['balance'][43][$i];
                $pasivoNoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos['balance'][44][$i];
                $pasivoNoCorriente->otrasDeudasLargoPlazo = $arrayDatos['balance'][45][$i];
                $pasivoNoCorriente->deudasEmpresasGrupo = $arrayDatos['balance'][46][$i];
                $pasivoNoCorriente->pasivosImpuestoDiferido = $arrayDatos['balance'][47][$i];
                $pasivoNoCorriente->periodificacionesLargoPlazo = $arrayDatos['balance'][48][$i];
                $pasivoNoCorriente->acreedoresComercialesNoCorrientes = $arrayDatos['balance'][49][$i];
                $pasivoNoCorriente->deudaCaracteristicasEspeciales = $arrayDatos['balance'][50][$i];
                $pasivoNoCorriente->totalPasivoNoCorriente = $arrayDatos['balance'][40][$i];
                $pasivoNoCorriente->save();

                $pasivoCorriente = new Pasivocorriente();
                $pasivoCorriente->pasivo_id = $pasivo->id;
                $pasivoCorriente->provisionesCortoPlazo = $arrayDatos['balance'][52][$i];
                $pasivoCorriente->totalDeudasCortoPlazo = $arrayDatos['balance'][53][$i];
                $pasivoCorriente->deudaEntidadesCredito = $arrayDatos['balance'][54][$i];
                $pasivoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos['balance'][55][$i];
                $pasivoCorriente->otrasDeudasCortoPlazo = $arrayDatos['balance'][56][$i];
                $pasivoCorriente->deudasEmpresasGrupo = $arrayDatos['balance'][57][$i];
                $pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas = $arrayDatos['balance'][58][$i];
                $pasivoCorriente->totalProveedores = $arrayDatos['balance'][59][$i];
                $pasivoCorriente->proveedoresLargoPlazo = $arrayDatos['balance'][60][$i];
                $pasivoCorriente->proveedoresCortoPlazo = $arrayDatos['balance'][61][$i];
                $pasivoCorriente->otrosAcreedores = $arrayDatos['balance'][62][$i];
                $pasivoCorriente->periodificacionesCortoPlazo = $arrayDatos['balance'][63][$i];
                $pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo = $arrayDatos['balance'][64][$i];
                $pasivoCorriente->totalPasivoCorriente = $arrayDatos['balance'][51][$i];
                $pasivoCorriente->save();

                $patrimonioNeto = new Patrimonioneto();
                $patrimonioNeto->pasivo_id = $pasivo->id;
                $patrimonioNeto->totalFondosPropios = $arrayDatos['balance'][25][$i];
                $patrimonioNeto->totalCapital = $arrayDatos['balance'][26][$i];
                $patrimonioNeto->capitalEscriturado = $arrayDatos['balance'][27][$i];
                $patrimonioNeto->capitalNoExigido = $arrayDatos['balance'][28][$i];
                $patrimonioNeto->primaEmision = $arrayDatos['balance'][29][$i];
                $patrimonioNeto->totalReservas = $arrayDatos['balance'][30][$i];
                $patrimonioNeto->reservaCapitalizacion = $arrayDatos['balance'][31][$i];
                $patrimonioNeto->otrasReservas = $arrayDatos['balance'][32][$i];
                $patrimonioNeto->accionesParticipacionesPatrimonioPropias = $arrayDatos['balance'][33][$i];
                $patrimonioNeto->resultadosEjerciciosAnteriores = $arrayDatos['balance'][34][$i];
                $patrimonioNeto->otrasAportacionesSocios = $arrayDatos['balance'][35][$i];
                $patrimonioNeto->resultadoEjercicio = $arrayDatos['balance'][36][$i];
                $patrimonioNeto->dividendoCuenta = $arrayDatos['balance'][37][$i];
                $patrimonioNeto->ajustesPatrimonioNeto = $arrayDatos['balance'][38][$i];
                $patrimonioNeto->subvencionesDonacionesLegados = $arrayDatos['balance'][39][$i];
                $patrimonioNeto->totalPatrimonioNeto = $arrayDatos['balance'][24][$i];
                $patrimonioNeto->save();

                if ($e->balances()->where('anio', $anio - 1)->first() != null) {
                    $i = 2;
                } else {
                    $anio -= 1;
                }
            }
            return $this->getDetails($empresa_id, $balance_id);
        }
        
    }

    public function putEdit(Request $arrayDatos, $empresa_id)
    {

        $e = Empresa::findOrFail($empresa_id);

        $anio = $arrayDatos['balance'][1][0];

        $balance = $e->balances()->where('anio', $anio)->firstOrFail();
        if ($balance != null) {
            for ($i = 0; $i <= 1; $i++) {

                $balance->empresa_id = $empresa_id;
                $balance->save();

                if ($i == 0) {
                    $balance_id = $balance->id;
                }

                $activo = $balance->activo;
                $activo->totalActivo = $arrayDatos['balance'][2][$i];
                $activo->save();
                $activoNoCorriente = $activo->activoNoCorriente;
                $activoNoCorriente->inmovilizadoIntangible = $arrayDatos['balance'][4][$i];
                $activoNoCorriente->inmovilizadoMaterial = $arrayDatos['balance'][5][$i];
                $activoNoCorriente->inversionesInmoviliarias = $arrayDatos['balance'][6][$i];
                $activoNoCorriente->inversionesEmpresasGrupo = $arrayDatos['balance'][7][$i];
                $activoNoCorriente->inversionesFinancierasLargoPlazo = $arrayDatos['balance'][8][$i];
                $activoNoCorriente->activosImpuestoDiferido = $arrayDatos['balance'][9][$i];
                $activoNoCorriente->deudoresComercialesNoCorriente = $arrayDatos['balance'][10][$i];
                $activoNoCorriente->totalActivoNoCorriente = $arrayDatos['balance'][3][$i];
                $activoNoCorriente->save();

                $activoCorriente = $activo->activoCorriente;
                $activoCorriente->existencias = $arrayDatos['balance'][12][$i];
                $activoCorriente->totalDeudoresComerciales = $arrayDatos['balance'][13][$i];
                $activoCorriente->totalClientesVentas = $arrayDatos['balance'][14][$i];
                $activoCorriente->ClientesVentasLargoPlazo = $arrayDatos['balance'][15][$i];
                $activoCorriente->ClientesVentasCortoPlazo = $arrayDatos['balance'][16][$i];
                $activoCorriente->accionistasDesembolsosExigidos = $arrayDatos['balance'][17][$i];
                $activoCorriente->otrosDeudores = $arrayDatos['balance'][18][$i];
                $activoCorriente->inversionesEmpresasGrupo = $arrayDatos['balance'][19][$i];
                $activoCorriente->inversionesFinancierasCortoPlazo = $arrayDatos['balance'][20][$i];
                $activoCorriente->periodificacionesCortoPlazo = $arrayDatos['balance'][21][$i];
                $activoCorriente->efectivoActivosLiquidos = $arrayDatos['balance'][22][$i];
                $activoCorriente->totalActivoCorriente = $arrayDatos['balance'][11][$i];
                $activoCorriente->save();

                $pasivo = $balance->pasivo;
                $pasivo->totalPasivo = $arrayDatos['balance'][23][$i];
                $pasivo->save();

                $pasivoNoCorriente = $pasivo->pasivoNoCorriente;
                $pasivoNoCorriente->provisionesLargoPlazo  = $arrayDatos['balance'][41][$i];
                $pasivoNoCorriente->totalDeudasLargoPlazo = $arrayDatos['balance'][42][$i];
                $pasivoNoCorriente->deudasEntidadesCredito = $arrayDatos['balance'][43][$i];
                $pasivoNoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos['balance'][44][$i];
                $pasivoNoCorriente->otrasDeudasLargoPlazo = $arrayDatos['balance'][45][$i];
                $pasivoNoCorriente->deudasEmpresasGrupo = $arrayDatos['balance'][46][$i];
                $pasivoNoCorriente->pasivosImpuestoDiferido = $arrayDatos['balance'][47][$i];
                $pasivoNoCorriente->periodificacionesLargoPlazo = $arrayDatos['balance'][48][$i];
                $pasivoNoCorriente->acreedoresComercialesNoCorrientes = $arrayDatos['balance'][49][$i];
                $pasivoNoCorriente->deudaCaracteristicasEspeciales = $arrayDatos['balance'][50][$i];
                $pasivoNoCorriente->totalPasivoNoCorriente = $arrayDatos['balance'][40][$i];
                $pasivoNoCorriente->save();

                $pasivoCorriente = $pasivo->pasivoCorriente;
                $pasivoCorriente->provisionesCortoPlazo = $arrayDatos['balance'][52][$i];
                $pasivoCorriente->totalDeudasCortoPlazo = $arrayDatos['balance'][53][$i];
                $pasivoCorriente->deudaEntidadesCredito = $arrayDatos['balance'][54][$i];
                $pasivoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos['balance'][55][$i];
                $pasivoCorriente->otrasDeudasCortoPlazo = $arrayDatos['balance'][56][$i];
                $pasivoCorriente->deudasEmpresasGrupo = $arrayDatos['balance'][57][$i];
                $pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas = $arrayDatos['balance'][58][$i];
                $pasivoCorriente->totalProveedores = $arrayDatos['balance'][59][$i];
                $pasivoCorriente->proveedoresLargoPlazo = $arrayDatos['balance'][60][$i];
                $pasivoCorriente->proveedoresCortoPlazo = $arrayDatos['balance'][61][$i];
                $pasivoCorriente->otrosAcreedores = $arrayDatos['balance'][62][$i];
                $pasivoCorriente->periodificacionesCortoPlazo = $arrayDatos['balance'][63][$i];
                $pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo = $arrayDatos['balance'][64][$i];
                $pasivoCorriente->totalPasivoCorriente = $arrayDatos['balance'][51][$i];
                $pasivoCorriente->save();

                $patrimonioNeto = $pasivo->patrimonioNeto;
                $patrimonioNeto->totalFondosPropios = $arrayDatos['balance'][25][$i];
                $patrimonioNeto->totalCapital = $arrayDatos['balance'][26][$i];
                $patrimonioNeto->capitalEscriturado = $arrayDatos['balance'][27][$i];
                $patrimonioNeto->capitalNoExigido = $arrayDatos['balance'][28][$i];
                $patrimonioNeto->primaEmision = $arrayDatos['balance'][29][$i];
                $patrimonioNeto->totalReservas = $arrayDatos['balance'][30][$i];
                $patrimonioNeto->reservaCapitalizacion = $arrayDatos['balance'][31][$i];
                $patrimonioNeto->otrasReservas = $arrayDatos['balance'][32][$i];
                $patrimonioNeto->accionesParticipacionesPatrimonioPropias = $arrayDatos['balance'][33][$i];
                $patrimonioNeto->resultadosEjerciciosAnteriores = $arrayDatos['balance'][34][$i];
                $patrimonioNeto->otrasAportacionesSocios = $arrayDatos['balance'][35][$i];
                $patrimonioNeto->resultadoEjercicio = $arrayDatos['balance'][36][$i];
                $patrimonioNeto->dividendoCuenta = $arrayDatos['balance'][37][$i];
                $patrimonioNeto->ajustesPatrimonioNeto = $arrayDatos['balance'][38][$i];
                $patrimonioNeto->subvencionesDonacionesLegados = $arrayDatos['balance'][39][$i];
                $patrimonioNeto->totalPatrimonioNeto = $arrayDatos['balance'][24][$i];
                $patrimonioNeto->save();

                $balance = $e->balances()->where('anio', $anio-1)->first();
            }
            return $this->getDetails($empresa_id, $balance_id);
        }
    }

    public function importExcel($anio, $empresa, $arrayDatos){

    
        //$arrayDatos = Excel::toArray(new BalancesImport,'prueba.XLS')[0];
        $e = Empresa::findOrFail($empresa);

        if($e->balances()->where('anio', $anio)->first()===null){      
            for ($i = 6; $i <= 7; $i++) {
                
                $balance = new Balance();
                $balance->empresa_id = $empresa;
                $balance->anio = $anio;
                $balance->save();

                if ($i == 6) {
                    $balance_id = $balance->id;
                }
        
                $activo = new Activo();
                $activo->balance_id = $balance->id;
                $activo->totalActivo = $arrayDatos[27][$i];
                $activo->save();
        
                $activoNoCorriente = new Activonocorriente();
                $activoNoCorriente->activo_id = $activo->id;
                $activoNoCorriente->inmovilizadoIntangible = $arrayDatos[8][$i];
                $activoNoCorriente->inmovilizadoMaterial = $arrayDatos[9][$i];
                $activoNoCorriente->inversionesInmoviliarias = $arrayDatos[10][$i];
                $activoNoCorriente->inversionesEmpresasGrupo = $arrayDatos[11][$i];
                $activoNoCorriente->inversionesFinancierasLargoPlazo = $arrayDatos[12][$i];
                $activoNoCorriente->activosImpuestoDiferido = $arrayDatos[13][$i];
                $activoNoCorriente->deudoresComercialesNoCorriente = $arrayDatos[14][$i];
                $activoNoCorriente->totalActivoNoCorriente = $arrayDatos[7][$i];
                $activoNoCorriente->save();
        
                $activoCorriente = new Activocorriente();
                $activoCorriente->activo_id = $activo->id;
                $activoCorriente->existencias = $arrayDatos[16][$i];
                $activoCorriente->totalDeudoresComerciales = $arrayDatos[17][$i];
                $activoCorriente->totalClientesVentas = $arrayDatos[18][$i];
                $activoCorriente->ClientesVentasLargoPlazo = $arrayDatos[19][$i];
                $activoCorriente->ClientesVentasCortoPlazo = $arrayDatos[20][$i];
                $activoCorriente->accionistasDesembolsosExigidos = $arrayDatos[21][$i];
                $activoCorriente->otrosDeudores = $arrayDatos[22][$i];
                $activoCorriente->inversionesEmpresasGrupo = $arrayDatos[23][$i];
                $activoCorriente->inversionesFinancierasCortoPlazo = $arrayDatos[24][$i];
                $activoCorriente->periodificacionesCortoPlazo = $arrayDatos[25][$i];
                $activoCorriente->efectivoActivosLiquidos = $arrayDatos[26][$i];
                $activoCorriente->totalActivoCorriente = $arrayDatos[15][$i];
                $activoCorriente->save();
        
                $pasivo = new Pasivo();
                $pasivo->balance_id = $balance->id;
                $pasivo->totalPasivo = $arrayDatos[71][$i];
                $pasivo->save();
        
                $pasivoNoCorriente = new Pasivonocorriente();
                $pasivoNoCorriente->pasivo_id = $pasivo->id;
                $pasivoNoCorriente->provisionesLargoPlazo  = $arrayDatos[47][$i];
                $pasivoNoCorriente->totalDeudasLargoPlazo = $arrayDatos[48][$i];
                $pasivoNoCorriente->deudasEntidadesCredito = $arrayDatos[49][$i];
                $pasivoNoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos[50][$i];
                $pasivoNoCorriente->otrasDeudasLargoPlazo = $arrayDatos[51][$i];
                $pasivoNoCorriente->deudasEmpresasGrupo = $arrayDatos[52][$i];
                $pasivoNoCorriente->pasivosImpuestoDiferido = $arrayDatos[53][$i];
                $pasivoNoCorriente->periodificacionesLargoPlazo = $arrayDatos[54][$i];
                $pasivoNoCorriente->acreedoresComercialesNoCorrientes = $arrayDatos[55][$i];
                $pasivoNoCorriente->deudaCaracteristicasEspeciales = $arrayDatos[56][$i];
                $pasivoNoCorriente->totalPasivoNoCorriente = $arrayDatos[46][$i];
                $pasivoNoCorriente->save();
        
                $pasivoCorriente = new Pasivocorriente();
                $pasivoCorriente->pasivo_id = $pasivo->id;
                $pasivoCorriente->provisionesCortoPlazo = $arrayDatos[58][$i];
                $pasivoCorriente->totalDeudasCortoPlazo = $arrayDatos[59][$i];
                $pasivoCorriente->deudaEntidadesCredito = $arrayDatos[60][$i];
                $pasivoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos[61][$i];
                $pasivoCorriente->otrasDeudasCortoPlazo = $arrayDatos[62][$i];
                $pasivoCorriente->deudasEmpresasGrupo = $arrayDatos[63][$i];
                $pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas = $arrayDatos[64][$i];
                $pasivoCorriente->totalProveedores = $arrayDatos[65][$i];
                $pasivoCorriente->proveedoresLargoPlazo = $arrayDatos[66][$i];
                $pasivoCorriente->proveedoresCortoPlazo = $arrayDatos[67][$i];
                $pasivoCorriente->otrosAcreedores = $arrayDatos[68][$i];
                $pasivoCorriente->periodificacionesCortoPlazo = $arrayDatos[69][$i];
                $pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo = $arrayDatos[70][$i];
                $pasivoCorriente->totalPasivoCorriente = $arrayDatos[57][$i];
                $pasivoCorriente->save();
        
                $patrimonioNeto = new Patrimonioneto();
                $patrimonioNeto->pasivo_id = $pasivo->id;
                $patrimonioNeto->totalFondosPropios = $arrayDatos[31][$i];
                $patrimonioNeto->totalCapital = $arrayDatos[32][$i];
                $patrimonioNeto->capitalEscriturado = $arrayDatos[33][$i];
                $patrimonioNeto->capitalNoExigido = $arrayDatos[34][$i];
                $patrimonioNeto->primaEmision = $arrayDatos[35][$i];
                $patrimonioNeto->totalReservas = $arrayDatos[36][$i];
                $patrimonioNeto->reservaCapitalizacion = $arrayDatos[37][$i];
                $patrimonioNeto->otrasReservas = $arrayDatos[38][$i];
                $patrimonioNeto->accionesParticipacionesPatrimonioPropias = $arrayDatos[39][$i];
                $patrimonioNeto->resultadosEjerciciosAnteriores = $arrayDatos[40][$i];
                $patrimonioNeto->otrasAportacionesSocios = $arrayDatos[41][$i];
                $patrimonioNeto->resultadoEjercicio = $arrayDatos[42][$i];
                $patrimonioNeto->dividendoCuenta = $arrayDatos[43][$i];
                $patrimonioNeto->ajustesPatrimonioNeto = $arrayDatos[44][$i];
                $patrimonioNeto->subvencionesDonacionesLegados = $arrayDatos[45][$i];
                $patrimonioNeto->totalPatrimonioNeto = $arrayDatos[30][$i];
                $patrimonioNeto->save();
    
                
                if($e->balances()->where('anio', $anio-1)->first()!=null){
                    $i=8;
                }else{
                    $anio-=1;
                }
            }
            return $this->getDetails($empresa, $balance_id);
        }
    }
}