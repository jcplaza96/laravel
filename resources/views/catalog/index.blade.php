@extends('layouts.master')
@section('content')
    <div class="row">
        @foreach( $arrayProductos as $producto )
            <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                <a href="{{ url('/'. $producto->parentType->name."/".$producto->id ) }}">
                    <img src="{{asset('assets/img/'.$producto->img)}}" style="height:200px"/>
                    <h4 style="min-height:45px;margin:5px 0 10px 0">
                        {{$producto->name}}
                    </h4>
                </a>
            </div>
        @endforeach
    </div>
@stop
