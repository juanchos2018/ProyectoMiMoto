@extends('layouts.master')
@section('contenido')

<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">Hoario<h2><br>

        <div class="col-md-12 p-3 form-inline">
            <input type="text" class="form-control">
            <button class="btn btn-primary ml-2"><i class="fas fa-search mr-1"></i>Buscar</button>           
   
        </div>    
        
        <div class="col-md-12 p-20 m-2 border">          

            <table id="example" class="display" style="width:100%">
                <thead>
                    <th>CODIGO</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                             
                </thead>
                <tbody>
                   
                </tbody>            

            </table>

        </div>      
    </div>

</div>
</div>
</div>
@stop