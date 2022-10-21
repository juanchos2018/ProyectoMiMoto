@extends('layouts.master')
@section('contenido')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Horario de Atenciones<h2><br><hr><br>

        <div class="row">
            <div class="col-md-3">
                <h2 class="card-title text-center">Lista de Servicios<h2>
            </div>

            <div class="col-md-9">
                <div class="b-l calender-sidebar" style="font-size: 12px">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- BEGIN MODAL -->
<div class="modal none-border" id="my-event">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Add Event</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@stop