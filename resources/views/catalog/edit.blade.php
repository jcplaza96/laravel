@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar producto
                </div>
                <div class="card-body" style="padding:30px">

                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control " value="{{$producto->name}}" required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Marca</label>
                            <input type="text" name="brand" id="brand" class="form-control" value="{{$producto->brand}}" required>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control">
                                @foreach( $tipos as $tipo )
                                    @if($producto->type == $tipo->id)
                                        <option value="{{$tipo->id}}" selected>{{$tipo->name}}</option>
                                    @else
                                        <option value="{{$tipo->id}}">{{$tipo->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input type="text" name="price" id="price" class="form-control" value="{{$producto->price}}" required>
                        </div>

                        <div class="form-group">
                            <label for="img">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{$producto->description}}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
