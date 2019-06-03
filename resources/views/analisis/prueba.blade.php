@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12 zoom"><div id="chart-div"></div></div>
    </div>
    
    <?= $lava->render('PieChart', 'IMDB', 'chart-div') ?>
    <?= $lava->render('PieChart', 'IMDB', 'chart-div2') ?>

    <!-- Button trigger modal -->
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
    </div>
@stop