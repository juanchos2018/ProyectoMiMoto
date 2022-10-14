@extends('layouts.master')

@section('contenido')


<div class="card">
    <div class="card-header">
        Nuevo categoria
    </div>
    <div class="card-body">

        <form  method="POST" action="{{ route('categoria-store') }}">
             @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Descripcion Categoria</label>
                    <input type="text" class="form-control" id="descripcion" required name="descripcion" placeholder="Nombres"> 
                    <input type="hidden" class="form-control" id="IdCategoria" name="IdCategoria" >
                </div>
               
            </div>
            
            <!--   <input type="email" class="form-control" id="inputEmail4" placeholder="Email"> -->
            <button type="submit" class="btn btn-primary">Registrar Categoria</button>
        </form>

        
    </div>

</div>
</div>
</div>
@stop