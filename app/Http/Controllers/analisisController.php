<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BalancesImport;


use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;


class AnalisisController extends Controller
{

    public function prueba()
    {
        $lava = new Lavacharts; // See note below for Laravel

        $reasons = $lava->DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('hola')
            ->addRow(['Activo corriente', 24002])
            ->addRow(['Pasivo corriente', 2323])
            ->addRow(['See Actors Other Work', 44232])
            ->addRow(['Settle Argument', 8229]);

        $lava->PieChart('IMDB', $reasons, [
            'title'  => 'Masas Patrimoniales',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.2],
                ['offset' => 0.2]
            ]
        ]);

        return view('analisis.prueba', ['lava' => $lava]);


    }


}
