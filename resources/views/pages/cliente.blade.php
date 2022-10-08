@extends('layouts.master')

@section('contenido')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Registrar Triaje</h4>
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
                <div class="row m-2">
                    <div class="col-md-6 p-5 border">
                        <h4 class="text-center mb-3">Datos de Reactivo</h4>
                        <div class="form-inline text-center">
                            <div class="col-md-4"><label>Marca</label><input type="text" class="form-control"></div>
                            <div class="col-md-4"><label>Lote</label><input type="text" class="form-control"></div>
                            <div class="col-md-4"><label>Fecha Venc.</label><input type="date"
                                    value="<?=date('Y-m-d')?>" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-6 p-5 border">
                        <h4 class="text-center mb-3">Datos de Equipo</h4>
                        <div class="form-inline text-center">
                            <div class="col-md-4"><label>Marca</label><input type="text" class="form-control"></div>
                            <div class="col-md-4"><label>Modelo</label><input type="text" class="form-control">
                            </div>
                            <div class="col-md-4"><label>Serie</label><input type="text" class="form-control"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 p-20">
                    <div class="form-inline pl-3">
                        <label class="mr-1">Solución de reacción (8 uL por muestra) </label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 p-20">
                    <div class="form-inline pl-3">
                        <label class="mr-1">Solución Enzimatica (2 uL por muestra) </label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-12 p-20">
          
                    <form action="store" method="post">
                    @csrf
                    <div class="form-inline pl-3">
                        <label class="mr-1">LDC_Well </label>
                        <input type="text" class="form-control" name="LDC_Well" value="some text" >
                        <button type="submit" class="btn btn-sm btn-primary" >Guardar</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-12 p-20 m-2 border">
                    <h4 class="text-left mb-3">Ordenes</h4>
                    
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <th>CODIGO</th>
                            <th>LAB CODIGO</th>
                            <th>LDC_Well</th>
                            <th>LDC_Fluor</th>
                            <th>LDC_Target</th>
                            <th>LDC_Content</th>
                            <th>LDC_Sample</th>
                            <th>LDC_Cq</th>
                            <th>LDC_CqMean</th>
                            <th>LDC_CqStdDev</th>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        
                    </table>
                    
                </div>
                <div class="p-20 text-right">
                    <button class="btn btn-primary">Recepcionar</button>
                </div>
            </div>
            <div class="tab-pane p-20" id="buscar" role="tabpanel"></div>
        </div>
    </div>
</div>
@stop