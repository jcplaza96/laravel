<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BalancesImport;


use Illuminate\Http\Request;

use App\Balance;
use App\Activo;
use App\Activocorriente;
use App\Activonocorriente;
use App\Pasivocorriente;
use App\Pasivo;
use App\Pasivonocorriente;
use App\Patrimonioneto;

class analisisController extends Controller
{
    public function getDatos(){

        $arrayDatos = $this->importExcel(2018, 2);


        return    view('analisis.prueba')->with('arrayDatos', $arrayDatos);
    }


    public function importExcel($anio, $empresa){

    
        $arrayDatos = Excel::toArray(new BalancesImport, 'prueba.XLS')[0];

        $balance = new Balance();
        $balance->empresa_id = $empresa;
        $balance->anio = $anio;
        $balance->save();

        $activo = new Activo();
        $activo->balance_id = $balance->id;
        $activo->totalActivo = $arrayDatos[27][6];
        $activo->save();

        $activoNoCorriente = new Activonocorriente();
        $activoNoCorriente->activo_id = $activo->id;
        $activoNoCorriente->inmovilizadoIntangible = $arrayDatos[8][6];
        $activoNoCorriente->inmovilizadoMaterial = $arrayDatos[9][6];
        $activoNoCorriente->inversionesInmoviliarias = $arrayDatos[10][6];
        $activoNoCorriente->inversionesEmpresasGrupo = $arrayDatos[11][6];
        $activoNoCorriente->inversionesFinancierasLargoPlazo = $arrayDatos[12][6];
        $activoNoCorriente->activosImpuestoDiferido = $arrayDatos[13][6];
        $activoNoCorriente->deudoresComercialesNoCorriente = $arrayDatos[14][6];
        $activoNoCorriente->totalActivoNoCorriente = $arrayDatos[7][6];
        $activoNoCorriente->save();

        $activoCorriente = new Activocorriente();
        $activoCorriente->activo_id = $activo->id;
        $activoCorriente->existencias = $arrayDatos[16][6];
        $activoCorriente->totalDeudoresComerciales = $arrayDatos[17][6];
        $activoCorriente->totalClientesVentas = $arrayDatos[18][6];
        $activoCorriente->ClientesVentasLargoPlazo = $arrayDatos[19][6];
        $activoCorriente->ClientesVentasCortoPlazo = $arrayDatos[20][6];
        $activoCorriente->accionistasDesembolsosExigidos = $arrayDatos[21][6];
        $activoCorriente->otrosDeudores = $arrayDatos[22][6];
        $activoCorriente->inversionesEmpresasGrupo = $arrayDatos[23][6];
        $activoCorriente->inversionesFinancierasCortoPlazo = $arrayDatos[24][6];
        $activoCorriente->periodificacionesCortoPlazo = $arrayDatos[25][6];
        $activoCorriente->efectivoActivosLiquidos = $arrayDatos[26][6];
        $activoCorriente->totalActivoCorriente = $arrayDatos[15][6];
        $activoCorriente->save();

        $pasivo = new Pasivo();
        $pasivo->balance_id = $balance->id;
        $pasivo->totalPasivo = $arrayDatos[71][6];
        $pasivo->save();

        $pasivoNoCorriente = new Pasivonocorriente();
        $pasivoNoCorriente->pasivo_id = $pasivo->id;
        $pasivoNoCorriente->provisionesLargoPlazo  = $arrayDatos[47][6];
        $pasivoNoCorriente->totalDeudasLargoPlazo = $arrayDatos[48][6];
        $pasivoNoCorriente->deudasEntidadesCredito = $arrayDatos[49][6];
        $pasivoNoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos[50][6];
        $pasivoNoCorriente->otrasDeudasLargoPlazo = $arrayDatos[51][6];
        $pasivoNoCorriente->deudasEmpresasGrupo = $arrayDatos[52][6];
        $pasivoNoCorriente->pasivosImpuestoDiferido = $arrayDatos[53][6];
        $pasivoNoCorriente->periodificacionesLargoPlazo = $arrayDatos[54][6];
        $pasivoNoCorriente->acreedoresComercialesNoCorrientes = $arrayDatos[55][6];
        $pasivoNoCorriente->deudaCaracteristicasEspeciales = $arrayDatos[56][6];
        $pasivoNoCorriente->totalPasivoNoCorriente = $arrayDatos[46][6];
        $pasivoNoCorriente->save();

        $pasivoCorriente = new Pasivocorriente();
        $pasivoCorriente->pasivo_id = $pasivo->id;
        $pasivoCorriente->provisionesCortoPlazo = $arrayDatos[58][6];
        $pasivoCorriente->totalDeudasCortoPlazo = $arrayDatos[59][6];
        $pasivoCorriente->deudaEntidadesCredito = $arrayDatos[60][6];
        $pasivoCorriente->acreedoresArrendamientoFinanciero = $arrayDatos[61][6];
        $pasivoCorriente->otrasDeudasCortoPlazo = $arrayDatos[62][6];
        $pasivoCorriente->deudasEmpresasGrupo = $arrayDatos[63][6];
        $pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas = $arrayDatos[64][6];
        $pasivoCorriente->totalProveedores = $arrayDatos[65][6];
        $pasivoCorriente->proveedoresLargoPlazo = $arrayDatos[66][6];
        $pasivoCorriente->proveedoresCortoPlazo = $arrayDatos[67][6];
        $pasivoCorriente->otrosAcreedores = $arrayDatos[68][6];
        $pasivoCorriente->periodificacionesCortoPlazo = $arrayDatos[69][6];
        $pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo = $arrayDatos[70][6];
        $pasivoCorriente->totalPasivoCorriente = $arrayDatos[57][6];
        $pasivoCorriente->save();

        $patrimonioNeto = new Patrimonioneto();
        $patrimonioNeto->pasivo_id = $pasivo->id;
        $patrimonioNeto->totalFondosPropios = $arrayDatos[31][6];
        $patrimonioNeto->totalCapital = $arrayDatos[32][6];
        $patrimonioNeto->capitalEscriturado = $arrayDatos[33][6];
        $patrimonioNeto->capitalNoExigido = $arrayDatos[34][6];
        $patrimonioNeto->primaEmision = $arrayDatos[35][6];
        $patrimonioNeto->totalReservas = $arrayDatos[36][6];
        $patrimonioNeto->reservaCapitalizacion = $arrayDatos[37][6];
        $patrimonioNeto->otrasReservas = $arrayDatos[38][6];
        $patrimonioNeto->accionesParticipacionesPatrimonioPropias = $arrayDatos[39][6];
        $patrimonioNeto->resultadosEjerciciosAnteriores = $arrayDatos[40][6];
        $patrimonioNeto->otrasAportacionesSocios = $arrayDatos[41][6];
        $patrimonioNeto->resultadoEjercicio = $arrayDatos[42][6];
        $patrimonioNeto->dividentoCuenta = $arrayDatos[43][6];
        $patrimonioNeto->ajustesPatrimonioNeto = $arrayDatos[44][6];
        $patrimonioNeto->subvencionesDonacionesLegados = $arrayDatos[45][6];
        $patrimonioNeto->totalPatrimonioNeto = $arrayDatos[30][6];
        $patrimonioNeto->save();

        return $arrayDatos;
    }
}
