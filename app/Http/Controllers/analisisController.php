<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BalancesImport;


use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\Empresa;
use App\Balance;

class AnalisisController extends Controller
{
    var $lava;

    public function getMasasPatrimoniales($empresa_id, $balance_id){

        $e = Empresa::findOrFail( $empresa_id);
        $balance = Balance::findOrFail($balance_id);

        $activo = $balance->activo;
        $pasivo = $balance->pasivo;

        $this->lava = new Lavacharts;

        $this->activoNoCorriente($activo->activoNoCorriente);
        $this->activoCorriente($activo->activoCorriente);
        $this->pasivoNoCorriente( $pasivo->pasivoNoCorriente);
        $this->pasivoCorriente( $pasivo->pasivoCorriente);
        $this->fondosPropios( $pasivo->patrimonioNeto);


        return view('analisis.masasPatrimoniales', [ 'lava' => $this->lava, 'empresa_id'=>$empresa_id]);

    }

    public function activoNoCorriente($activoNoCorriente){

        $reasons = $this->lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('datos')
            ->addRow(['I. Inmovilizado Intangible', $activoNoCorriente->inmovilizadoIntangible])
            ->addRow(['II. Inmovilizado Material',  $activoNoCorriente->inmovilizadoMaterial])
            ->addRow(['III. Inversiones Inmobiliarias',  $activoNoCorriente->inversionesMobiliarias])
            ->addRow(['IV. Inversiones empresas del grupo o asociadas l/p',  $activoNoCorriente->inversionesEmpresasGrupo])
            ->addRow(['V. Inversiones Financieras L/P',  $activoNoCorriente->inversionesFinancierasLargoPlazo])
            ->addRow(['VI. Activos por impuestos diferidos',  $activoNoCorriente->activosImpuestoDiferido]);

        $this->lava->PieChart( 'activoNoCorriente', $reasons, [
            'title'  => 'Activos no corrientes',
            'titleTextStyle' => [
                'fontSize' => '20'
            ],
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1]
            ]
        ]);
    }

    public function activoCorriente($activoCorriente){

        $reasons = $this->lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('datos')
            ->addRow(['I. Existencias.', $activoCorriente->existencias])
            ->addRow([ 'II. Deudores comerciales y otras cuentas a cobrar.',  $activoCorriente->totalDeudoresComerciales])
            ->addRow([ 'III. Inversiones en empresas del grupo y asociadas a corto plazo.',  $activoCorriente->inversionesEmpresasGrupo])
            ->addRow([ 'IV. Inversiones financieras a corto plazo.',  $activoCorriente->inversionesFinancierasCortoPlazo])
            ->addRow([ 'V. Periodificaciones a corto plazo.',  $activoCorriente->periodificacionesCortoPlazo])
            ->addRow([ 'VI. Efectivo y otros activos líquidos equivalentes.',  $activoCorriente->efectivoActivosLiquidos]);

        $this->lava->PieChart( 'activoCorriente', $reasons, [
            'title'  => 'Activos Corrientes',
            'titleTextStyle' => [
                'fontSize' => '20'
            ],
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1]
            ]
        ]);
    }

    public function pasivoNoCorriente($pasivoNoCorriente){

        $reasons = $this->lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('datos')
            ->addRow([ 'I. Provisiones a largo plazo.', $pasivoNoCorriente->totalCapital])
            ->addRow([ 'II. Deudas a largo plazo.',  $pasivoNoCorriente->primaEmision])
            ->addRow([ 'III. Deudas con empresas del grupo y asociadas a largo plazo.',  $pasivoNoCorriente->totalReservas])
            ->addRow([ 'IV. Pasivos por impuesto diferido.',  $pasivoNoCorriente->accionesParticipacionesPatrimonioPropias])
            ->addRow([ 'V. Periodificaciones a largo plazo.',  $pasivoNoCorriente->otrasAportacionesSocios])
            ->addRow([ 'VI. Acreedores comerciales no corrientes',  $pasivoNoCorriente->resultadoEjercicio])
            ->addRow([ 'VII. Deuda con características especiales a largo plazo.',  $pasivoNoCorriente->dividendoCuenta]);


        $this->lava->PieChart( 'pasivoNoCorriente', $reasons, [
            'title'  => 'Pasivo No Corriente',
            'titleTextStyle' => [
                'fontSize' => '20'
            ],
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1]
            ]
        ]);
    }

    public function fondosPropios($patrimonioNeto){
        $reasons = $this->lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('datos')
            ->addRow(['I. Capital.', $patrimonioNeto->totalCapital])
            ->addRow(['II. Prima de emisión.',  $patrimonioNeto->primaEmision])
            ->addRow(['III. Reservas.',  $patrimonioNeto->totalReservas])
            ->addRow(['IV. (Acciones y participaciones en patrimonio propias).',  $patrimonioNeto->accionesParticipacionesPatrimonioPropias])
            ->addRow(['VI. Otras aportaciones de socios.',  $patrimonioNeto->otrasAportacionesSocios])
            ->addRow(['VII. Resultado del ejercicio.',  $patrimonioNeto->resultadoEjercicio])
            ->addRow(['VIII. (Dividendo a cuenta).',  $patrimonioNeto->dividendoCuenta]);

        $this->lava->PieChart( 'fondosPropios', $reasons, [
            'title'  => 'Fondos propios',
            'titleTextStyle' => [
                'fontSize' => '20'
            ],
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1]
            ]
        ]);
    }


    public function pasivoCorriente($pasivoCorriente){

        $reasons = $this->lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('datos')
            ->addRow([ 'I. Provisiones a corto plazo.', $pasivoCorriente->provisionesCortoPlazo])
            ->addRow([ 'II. Deudas a corto plazo.',  $pasivoCorriente->totalDeudoresCortoPlazo])
            ->addRow([ 'III. Deudas con empresas del grupo y asociadas a corto plazo.',  $pasivoCorriente->deudoresEmpresasGrupo])
            ->addRow([ 'IV. Acreedores comerciales y otras cuentas a pagar.',  $pasivoCorriente->totalAcreedoresComerciales_OtrasCuentas])
            ->addRow([ 'V. Periodificaciones a corto plazo',  $pasivoCorriente->resultadoEjercicio])
            ->addRow([ 'VI. Deuda con características especiales a corto plazo',  $pasivoCorriente->deudaCaracteristicasEspecialesCortoPlazo]);

        $this->lava->PieChart( 'pasivoCorriente', $reasons, [
            'title'  => 'Pasivo Corriente',
            'titleTextStyle' => [
                'fontSize' => '20'
            ],
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1],
                ['offset' => 0.1]
            ]
        ]);
    }


}
