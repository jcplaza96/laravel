@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('assets/img/logoGenerico.png')}}" style="width: 100%; max-width: 250px">
        </div>
        <div class="col-sm-8 card">
            <div class="text-center">
                <h1>{{$empresa->nombre}}</h1>
            </div>
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
        <div class="row">
            <div class="col-md-12 mt-4">
                @if(true)
                    <a class="btn btn-warning" href="{{ url('/empresas/'.$empresa->id.'/edit')}}">Editar empresa</a>
                @endif
                <a class="btn btn-outline-dark" href="{{ url('/empresas')}}">Volver al listado</a>
            </div>
        </div>
    </div>
    <h3 class="mt-5">Balances</h3>
    <table class="table mt-2 table-hover">
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
  <h3 class="mt-5">Perdidas y Ganancias</h3>
    <table class="table mt-2 table-hover">
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
@stop
