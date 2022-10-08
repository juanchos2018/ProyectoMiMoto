@extends('layouts.master')

@section('contenido')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Registrar Empleado</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Recepcion Amplificación</h2>
        <div class="row p-20">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#recepcion" role="tab"><span
                            class="hidden-sm-up"><i class="ti-home"></i></span> <span
                            class="hidden-xs-down">Recepcion</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#buscar" role="tab"><span
                            class="hidden-sm-up"><i class="ti-search"></i></span> <span
                            class="hidden-xs-down">Buscar</span></a> </li>
            </ul>

        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="recepcion" role="tabpanel">           
                <div class="col-md-12 p-3 form-inline">
                    <label class="mr-3 pl-3">Ficha: </label>
                    <input type="text" class="form-control">
                    <button class="btn btn-primary ml-2"><i class="fas fa-search mr-1"></i>Buscar</button>
                </div>
             
                <div class="col-md-12 p-20 m-2 border">
                    <h4 class="text-left mb-3">Ordenes</h4>
                    <tabla-empleado></tabla-empleado>                  
                    
                </div>
               
            </div>

            <div class="tab-pane p-20" id="buscar" role="tabpanel"></div>
        </div>
    </div>
</div>
@stop