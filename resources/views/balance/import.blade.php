@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Importar Balance
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="anio">Año</label>
                            <input type="number" name="anio" id="anio" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="excel">Balance</label>
                            <input type="file" name="excel" id="excel" class="form-control" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Balance
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
