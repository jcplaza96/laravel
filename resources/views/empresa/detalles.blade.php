@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('assets/img/logoGenerico.png')}}" style="width: 100%; max-width: 250px">
        </div>
        <div class="col-sm-8">
            <h1>{{$empresa->nombre}}</h1>
            <h4>{{$empresa->cif}}</h4>
            <br>
            <div class="row">
                <div class="col-md-12">
                    @if(true)
                        <a class="btn btn-success" href="">Ver Balances</a>
                    @endif
                    @if(true)
                        <a class="btn btn-warning" href="">Editar empresa</a>
                    @endif
                    <a class="btn btn-outline-dark" href="">Volver al listado</a>
                </div>
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
@stop
