@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{asset('assets/img/'.$producto->img)}}" style="width: 100%">
        </div>
        <div class="col-sm-8">
            <h1>{{$producto->name}}</h1>
            <h4>{{$producto->brand}}</h4>
            <h4>{{$producto->parentType->name}}</h4>
            <br>
            <p><b>Descripción: </b>{{$producto->description}}</p>
            <p><b>Precio: </b>{{$producto->price}}</p>
            <br>
            <p><b>Estado: </b>
                @if($producto->rent)
                Producto no disponible
                @else
                Producto disponible
                @endif
            </p>
            <div class="row">
                <div class="col-md-12">
                    @if($producto->rent)
                        @if(\App\Rent::where(['product_id'=>$producto->id, 'user_id'=>Auth::user()->id, 'fecha_dev'=>null])->first()!=null)
                            <a class="btn btn-danger " href="{{action('CatalogController@returnProduct', [$producto->parentType->name, $producto->id])}}">Devolver producto</a>
                        @endif
                    @else
                        <a class="btn btn-success "  href="{{action('CatalogController@rentProduct', [$producto->parentType->name, $producto->id])}}">Alquilar producto</a>
                    @endif
                    @if(Auth::check() && strcmp ( "admin" , Auth::user()->rol)==0)
                        <a class="btn btn-warning" href="{{action('CatalogController@getEdit', $producto->id)}}">Editar producto</a>
                    @endif
                    <a class="btn btn-outline-dark" href="{{action('CatalogController@getCatalog', $producto->parentType->name)}}">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
@stop
