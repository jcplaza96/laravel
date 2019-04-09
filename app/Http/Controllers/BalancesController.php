<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Balance;

class BalancesController extends Controller
{
    public function getCreate($empresa_id){
        return view('balance.create', ['empresa'=>$empresa_id]);
    }

    public function getDetails($empresa_id, $balance_id){

    
        $balance = Balance::findOrFail($balance_id);

        return view('balance.detalles', ['balance'=>$balance]);
    }

    public function postCreate(Request $request){

        $e = new Empresa();
        $e->nombre = $empresa['name'];
        $e->cif = $empresa['cif'];
        $e->save();

        $e_u = new User_empresa();
        $e_u->empresa_id = $e->id;
        $e_u->user_id = Auth::user()->id;
        $e_u->save();

        return redirect('/');

    }

    public function importExcel($anio, $empresa){

    
        $arrayDatos = Excel::toArray(new BalancesImport,'prueba.XLS')[0];

        for ($i = 6; $i <= 7; $i++) {
            
            $balance = new Balance();
            $balance->empresa_id = $empresa;
            $balance->anio = $anio;
            $balance->save();
    
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
            $patrimonioNeto->dividentoCuenta = $arrayDatos[43][$i];
            $patrimonioNeto->ajustesPatrimonioNeto = $arrayDatos[44][$i];
            $patrimonioNeto->subvencionesDonacionesLegados = $arrayDatos[45][$i];
            $patrimonioNeto->totalPatrimonioNeto = $arrayDatos[30][$i];
            $patrimonioNeto->save();

            $e = Empresa::findOrFail($empresa);
            if(!$e->balances()->where('anio', $anio-1)->first()){
                $i=8;
            }
        }
    }
}