@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left mr-2"></a></i>Importar cuenta</h2>
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="anio">Año</label>
                            <input type="number" min="2" name="anio" id="anio" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="excel">Perdidas y Ganancias</label>
                            <input type="file" name="excel" id="excel" class="form-control" required>

                            @if($errors->has('excel'))                    
                                <span class="invalid-feedback" role="alert" style="display:block">
                                    <strong>{{$errors->first('excel')}}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-100">
                                Añadir Cuenta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
