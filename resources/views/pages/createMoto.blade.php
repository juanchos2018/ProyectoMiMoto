@extends('layouts.master')
@section('contenido')
<div class="card">
    <div class="card-header">
        Nuevo Moto
    </div>
    <div class="card-body">
        <form  method="POST" action="{{ route('moto-store') }}">
             @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" id="marca" required name="marca" placeholder="marca"> 
                    <input type="hidden" class="form-control" id="IdMoto" name="IdMoto" >
                </div>
                <div class="form-group col-md-4">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" required name="modelo" placeholder="modelo">
                </div>
                <div class="form-group col-md-4">
                    <label for="color">Color</label>
                    <input type="text" class="form-control" id="color" required name="color" placeholder="color">
                </div>
                <div class="form-group col-md-4">
                    <label for="Combustible">Combustible</label>
                    <input type="text" class="form-control" id="Combustible" required name="Combustible" placeholder="Combustible">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Peso</label>
                    <input type="text" class="form-control" id="Peso" required name="Peso" placeholder="Peso">
                </div>
            </div>            
            <!--   <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
            <button type="submit" class="btn btn-primary">Registrar Moto</button>
        </form>        
    </div>
</div>
</div>
</div>
@stop