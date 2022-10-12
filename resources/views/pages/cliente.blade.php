@extends('layouts.master')

@section('contenido')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Lista de Clientes</h2><br>

        <div class="col-md-12 p-3 form-inline">

            <input type="text" class="form-control">
            <button class="btn btn-primary ml-2"><i class="fas fa-search mr-1"></i>Buscar</button>
            
            <a href="{{ url('/clientes-create') }}" class="btn btn-primary ml-2">Nuevo Cliente</a> 
        </div>    
        
        <div class="col-md-12 p-20 m-2 border">          

            <table id="example" class="display" style="width:100%">
                <thead>
                    <th>CODIGO</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>correo</th>
                    <th>telefono</th>                   
                </thead>
                <tbody>
                @foreach ($clientes as $item)
                    <tr>                         
                        <td>{{$item->IdCliente}}</td>
                        <td>{{$item->Nombres}}</td>
                        <td>{{$item->Apellidos}}</td>
                        <td>{{$item->DNI}}</td>
                        <td>{{$item->correo}}</td>
                        <td>{{$item->telefono}}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>      
    </div>

</div>
</div>
</div>
@stop