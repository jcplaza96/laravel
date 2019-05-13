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
        $arrayPerdidasGanancias = $empresa->perdidasGanancias;

        return view('empresa.detalles', ['empresa'=>$empresa, 'arrayBalances'=> $arrayBalances, 'arrayPerdidasGanancias' => $arrayPerdidasGanancias]);
    }

    public function getCreate(){
        return view('empresa.create');
    }

    public function getEdit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresa.edit',['empresa'=>$empresa]);
    }

    public function putEdit($id, Request $empresa)
    {
        $e = Empresa::findOrFail($id);

        $e->nombre = $empresa['name'];
        $e->cif = $empresa['cif'];
        $e->direccion = $empresa[ 'direccion'];
        $e->telefono = $empresa[ 'telefono'];
        $e->save();


        return $this->getDetails($id);
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
