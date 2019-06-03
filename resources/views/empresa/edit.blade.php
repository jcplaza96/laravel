@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2><a href="{{ url('/empresas/'.$empresa->id)}}"><i class="fas fa-arrow-circle-left mr-2"></a></i>Editar Empresa</h2>
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control " value="{{$empresa->nombre}}" required>
                        </div>

                        <div class="form-group">
                            <label for="Cif">Cif</label>
                            <input type="text" name="cif" id="brand" class="form-control" value="{{$empresa->cif}}" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="telefono" id="telefono" class="form-control" value="{{$empresa->telefono}}" required>
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" value="{{$empresa->direccion}}" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Editar Empresa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
