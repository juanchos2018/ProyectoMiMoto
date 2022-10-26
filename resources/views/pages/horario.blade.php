@extends('layouts.master')
@section('contenido')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Horario de Atenciones<h2><br><hr><br>

        <div class="row">
            <div class="col-md-3">
                <h2 class="card-title text-center">Lista de Servicios<h2><br>
                @foreach ($categoria as $item)
                <h5><i class="fa fa-circle text-{{$item->color}}"></i> {{$item->descripcion}}</h5>
                @endforeach
            </div>

            <div class="col-md-9" style="font-size: 14px">
                <div id="agenda"></div>
            </div>
        </div>

    </div>
</div>

<!-- BEGIN MODAL -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="POST" action="{{ route('horario-store') }}">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="empleado">Empleado</label>
                        <input id="empleado" class="form-control" type="text" name="empleado">
                    </div>

                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input id="categoria" class="form-control" type="text" name="categoria">
                    </div>

                    <div class="form-group">
                        <label for="start">Start</label>
                        <input id="start" class="form-control" type="text" name="start">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@stop

