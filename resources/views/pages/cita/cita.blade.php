@extends('layouts.master')
@section('contenido')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Lista de Categtorias</h2><br>

        <div class="col-md-12 p-3 form-inline">

            <input type="text" class="form-control">
            <button class="btn btn-primary ml-2"><i class="fas fa-search mr-1"></i>Buscar</button>

            <a href="{{ url('/cita-create') }}" class="btn btn-primary ml-2">Nueva Cita</a>

        </div>

        <div class="col-md-12 p-20 m-2 border">

            <table id="example" class="display" style="width:100%">
                <thead>
                    <th>Cod.</th>
                    <th>Fecha de Registro</th>
                    <th>Horario</th>
                    <th>Cliente</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                @foreach ($cita as $item)
                    <tr>
                        <td>{{$item->IdCita}}</td>
                        <td>{{$item->fec_registro}}</td>
                        <td>{{$item->IdHorario}}</td>
                        <td>{{$item->IdCliente}}</td>
                        <td>{{$item->IdUsuario}}</td>
                        <td>{{$item->estado}}</td>
                        <td><a href="/cita-edit?IdCita={{$item->IdCita}}" class="btn btn-sm btn-warning"><i class="fas fa-edit mr-1"></i>Editar</a></td>
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
