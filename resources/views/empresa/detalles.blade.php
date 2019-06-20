@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('assets/img/logoGenerico.png')}}" style="width: 100%; max-width: 250px">
        </div>
        <div class="col-sm-8 card text-white bg-dark mt-3">
            <div class="text-center mt-2">
                <h1>{{$empresa->nombre}}</h1>
            </div>
            <hr style="border-top: 1px solid white;">
            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Cif: {{$empresa->cif}}</h4>
                </div>
                <div class="col-md-6">
                    <h4>Tlf: {{$empresa->telefono}}</h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Dir: {{$empresa->direccion}}</h4>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="mt-4 mb-5">
        @if(true)
            <a class="btn btn-warning" href="{{ url('/empresas/'.$empresa->id.'/edit')}}">Editar empresa</a>
        @endif
        <a class="btn btn-outline-dark" href="{{ url('/empresas')}}">Volver al listado</a>
    </div>

    <h2 class="mt-5 d-inline">Balances</h2>
    <div class="text-right">
        <a class="btn btn-success alig" href="{{ url('/empresas/'.$empresa->id.'/balances/add')}}">Crear Balance</a>
        <a class="btn btn-success" href="{{ url('/empresas/'.$empresa->id.'/balances/import')}}">Importar Balance</a>
    </div>
    
    <div class="table-responsive">
        <table class="table mt-2 mb-5 table-hover ">
            <thead class="thead-dark">
                <tr>
                    <th>Año</th>
                    <th>Total Activo</th>
                    <th>Total Pasivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arrayBalances as $balance)
                        <tr class='clickable-row' data-href="{{ url('/empresas/'.$empresa->id.'/balances/'.$balance->id)}}">
                            <td>{{$balance->anio}}</td>
                            <td>{{$balance->activo->totalActivo}}</td>
                            <td>{{$balance->pasivo->totalPasivo}}</td>
                        </tr>   
                @endforeach
            </tbody>
        </table>
    </div>

    <br class="mt-5 mb-5">
    <h2 class="mt-5 d-inline">Informes de perdidas y ganancias</h2>
    <div class="text-right">
        <a class="btn btn-success alig" href="{{ url('/empresas/'.$empresa->id.'/perdidasGanancias/add')}}">Crear Cuenta</a>
        <a class="btn btn-success" href="{{ url('/empresas/'.$empresa->id.'/perdidasGanancias/import')}}">Importar Cuenta</a>
    </div>
    <div class="table-responsive">
        <table class="table mt-2 mb-5 table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Año</th>
                    <th>Resultado de Explotación</th>
                    <th>Resultado Financiero</th>
                    <th>Resultado antes de impuestos</th>
                    <th>Resultado del ejercicio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arrayPerdidasGanancias as $perdidasGanancias)
                        <tr class='clickable-row' data-href="{{ url('/empresas/'.$empresa->id.'/perdidasGanancias/'.$perdidasGanancias->id)}}">
                            <td>{{$perdidasGanancias->anio}}</td>
                            <td>{{$perdidasGanancias->resultadoExplotacion}}</td>
                            <td>{{$perdidasGanancias->resultadoFinanciero}}</td>
                            <td>{{$perdidasGanancias->resultadoAntesImpuestos}}</td>
                            <td>{{$perdidasGanancias->resultadoEjercicio}}</td>
                        </tr>     
                @endforeach
            </tbody>
        </table>
    </div>
@stop
