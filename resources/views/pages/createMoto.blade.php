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
                    <label for="inputEmail4">Marca</label>
                    <input type="text" class="form-control" id="Nombres" required name="Nombres" placeholder="Nombres"> 
                    <input type="hidden" class="form-control" id="IdCliente" name="IdCliente" >
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Modelo</label>
                    <input type="text" class="form-control" id="Apellidos" required name="Apellidos" placeholder="Apellidos">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Color</label>
                    <input type="text" class="form-control" id="DNI" required name="DNI" placeholder="DNI">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Combustible</label>
                    <input type="email" class="form-control" id="correo" required name="correo" placeholder="correo">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">Peso</label>
                    <input type="text" class="form-control" id="telefono" required name="telefono" placeholder="telefono">
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