@extends('layouts.master')
@section('content')

    <h2 class="mt-3"><a href="{{ url('/empresas/'.$empresa_id)}}"><i class="fas fa-arrow-circle-left mr-2"></a></i>Informe de masas patrimoniales</h2>
    <div class="row mt-2">
        <div class="col-md-12 mb-3">
            <div style="height: 40vh" id="chart-activoNoCorriente"></div>
        </div>
        <div class="col-md-12 mb-3">
            <div style="height: 40vh" id="chart-activoCorriente"></div>
        </div>
        <div class="col-md-12 mb-3">
            <div style="height: 40vh" id="chart-pasivoNoCorriente"></div>
        </div>
        <div class="col-md-12 mb-3">
            <div style="height: 40vh" id="chart-pasivoCorriente"></div>
        </div>
        <div class="col-md-12 mb-3">
            <div style="height: 40vh" id="chart-fondosPropios"></div>
        </div>
    </div>

    {!! $lava->render('PieChart', 'activoNoCorriente', 'chart-activoNoCorriente') !!}
    {!! $lava->render('PieChart', 'activoCorriente', 'chart-activoCorriente') !!}
    {!! $lava->render('PieChart', 'pasivoNoCorriente', 'chart-pasivoNoCorriente') !!}
    {!! $lava->render('PieChart', 'pasivoCorriente', 'chart-pasivoCorriente') !!}
    {!! $lava->render('PieChart', 'fondosPropios', 'chart-fondosPropios') !!}   
      





    {{-- <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="chart-div2"></div>
        </div>
        </div>
    </div>
    </div> --}}
@stop