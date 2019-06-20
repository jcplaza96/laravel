@extends('layouts.master')
@section('content')
    @if(count($arrayEmpresas)<1)
    <div class="text-center mt-5">
        <h4>No hay empresas disponibles. <a class="" href="{{url('/empresas/create')}}" >Crear Empresa</a></h4>
    </div>
    @endif
    @foreach( $arrayEmpresas as $empresa )
        <div class="card mb-4 p-2">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <a href="{{ url('/empresas/'.$empresa->id ) }}">
                        <img src="{{asset('assets/img/logoGenerico.png')}}" style="height:200px"/>
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>
                                {{$empresa->nombre}}
                            </h2>
                        </div>
                        <div class="col-lg-12">
                            <p><b>Cif:</b> {{$empresa->cif}}</p>
                            <p><b>Teléfono:</b> {{$empresa->telefono}}</p>
                            <p><b>Dirección:</b> {{$empresa->direccion}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 text-right">
                    <form action="" method="post" class="">
                        {{ csrf_field() }}
                    <input type="hidden" name="empresa_id" value="{{$empresa->id}}">

                    <button id="" class="btn btn-seccondary deleteButton" type="submit"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@stop