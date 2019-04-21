@extends('layouts.master')
@section('content')
    @foreach( $arrayEmpresas as $empresa )
        <div class="card mb-4 p-2">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <a href="{{ url('/empresas/'.$empresa->id ) }}">
                        <img src="{{asset('assets/img/logoGenerico.png')}}" style="height:200px"/>
                    </a>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>
                                {{$empresa->nombre}}
                            </h2>
                        </div>
                        <div class="col-lg-12">
                            <p><b>Cif:</b> {{$empresa->cif}}</p>
                            <p><b>Telefono:</b> {{$empresa->telefono}}</p>
                            <p><b>Dirección:</b> {{$empresa->direccion}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop