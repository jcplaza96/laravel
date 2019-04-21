<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\User_empresa;
use Illuminate\Support\Facades\Auth;

class EmpresasController extends Controller
{

    public function getList(){
        $user = Auth::user();
        $arrayEmpresas = $user->Empresas;

        return view('empresa.list', ['arrayEmpresas'=>$arrayEmpresas]);
    }

    public function getDetails($id){
    
        $empresa = Empresa::findOrFail($id);
        $arrayBalances = $empresa->balances;

        return view('empresa.detalles', ['empresa'=>$empresa, 'arrayBalances'=>$arrayBalances]);
    }

    public function getCreate(){
        return view('empresa.create');
    }

    public function postCreate(Request $empresa){

        $e = new Empresa();
        $e->nombre = $empresa['name'];
        $e->cif = $empresa['cif'];
        $e->telefono = $empresa['telefono'];
        $e->direccion = $empresa['direccion'];
        $e->save();

        $e_u = new User_empresa();
        $e_u->empresa_id = $e->id;
        $e_u->user_id = Auth::user()->id;
        $e_u->save();

        return redirect('/');

    }
}
