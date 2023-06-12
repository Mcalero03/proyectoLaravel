@extends('layouts.plantillabase')

@section('contenido')
<div class="col-12">
    <a href="proyectos/create" class="display-6 btn btn-success">CREAR</a> 
    <br>
    <div class="table-responsive pt-4">
    <table class="table table-dark  table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Proyecto</th>
        <th scope="col">Fuente Fondos</th>
        <th scope="col">Monto Planificado</th>
        <th scope="col">Monto Patrocinado</th>
        <th scope="col">Monto Fondos Propios</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody> 
        @foreach ($proyectos as $proyecto)
    <tr>
        <td>{{$proyecto->id}}</td>
        <td>{{$proyecto->nombre_proyecto}}</td>
        <td>{{$proyecto->fuente_fondos}}</td>
        <td>{{$proyecto->monto_planificado}}</td>
        <td>{{$proyecto->monto_patrocinado}}</td>
        <td>{{$proyecto->monto_fondos_propios}}</td>
        <td> 
            <form action="{{route('proyectos.destroy', $proyecto->id)}}" method="post">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="/proyectos/{{$proyecto->id}}/edit" class="btn btn-warning btn-group">Editar</a> 
                @csrf 
                @method('DELETE')
                <button class="btn btn-danger btn-group">Borrar</button>
            </div>
            </form>
        </td>

    </tr>
        @endforeach
    </tbody>
</table> 
                <a href="/pdf" class="btn btn-secondary btn-group">Generar reporte</a> 

    </div>
</div>
@endsection
