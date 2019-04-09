@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Crear Empresa
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control " required>
                        </div>

                        <div class="form-group">
                            <label for="brand">Cif</label>
                            <input type="text" name="cif" id="brand" class="form-control" required>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir Empresa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
