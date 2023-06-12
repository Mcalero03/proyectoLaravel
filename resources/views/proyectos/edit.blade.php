@extends('layouts.plantillabase')

@section('contenido')
<div class="col-12">
    <h1 class="display-5" align="center">EDITAR REGISTRO</h1>
    <br>
    <form action="/proyectos/{{$proyecto->id}}" method="post"> 
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Proyecto</label>
                    <input type="text" class="form-control" name="nombre_proyecto" value="{{$proyecto->nombre_proyecto}}">
                </div>
            </div>
            <div class="col-6"> 
                <div class="mb-3">
            <label class="form-label">Fuente de Fondos</label>
            <input type="text" class="form-control" name="fuente_fondos" value="{{$proyecto->fuente_fondos}}">
                </div>
            </div>
            <div class="col-6"> 
                <div class="mb-3">
                    <label class="form-label">Monto Planificado</label>
                    <input type="number" min="0" class="form-control" name="monto_planificado" value="{{$proyecto->monto_planificado}}">
                </div>
            </div>
            <div class="col-6"> 
                <div class="mb-3">
                    <label class="form-label">Monto Patrocinado</label>
                    <input type="number" min="0" class="form-control" name="monto_patrocinado" value="{{$proyecto->monto_patrocinado}}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Monto Fondos Propios</label>
                    <input type="number" min="0" class="form-control" name="monto_fondos_propios" value="{{$proyecto->monto_fondos_propios}}">
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="/proyectos" class="display-6 btn btn-secondary">Cancelar</a> 
</form>
</div>
@endsection
