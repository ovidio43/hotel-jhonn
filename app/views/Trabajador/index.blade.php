@extends('layout')
@section('title')
LISTADO DE TRABAJADOR
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a href="trabajador/create" title="Nuevo">
                        <span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</span>
                        <span class="label label-default"></span>            
                    </a>
                </th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Ap. Paterno</th>
                <th>Ap. Materno</th>
                <th>CI</th> 
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Email</th>
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
            @foreach($Trabajador as $row)
            <tr>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->apellidoP }}</td>
                <td>{{ $row->apellidoM }}</td>
                <td>{{ $row->ci }}</td>
                <td>{{ $row->telefono }}</td>
                <td>{{ $row->direccion }}</td>
                <td>{{ $row->email }}</td>
                <td><a href="trabajador/{{$row->id}}/edit" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'trabajador/'.$row->id,'method'=>'delete'))}}                    
                    {{ Form::close()}}
                </td>
            </tr>  
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
@stop

