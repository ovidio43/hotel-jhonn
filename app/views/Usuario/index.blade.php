@extends('layout')
@section('title')
LISTADO DE USUARIOS
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a href="usuario/create" title="Nuevo">
                        <span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</span>
                        <span class="label label-default"></span>            
                    </a>
                </th>
            </tr>
            <tr>
                <th>Login</th>
                <th>Fecha Creación</th>                
                <th>Trabajador</th>                
                <th>Tipo Usuario</th>                
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
            @foreach($Usuario as $row)
            <tr>
                <td>{{ $row->login }}</td>
                <td>{{ $row->fecha_creacion }}</td>                
                <td>{{ $row->id_trabajador }}</td>                
                <td>{{ $row->id_tipo_usuario }}</td>                
                <td><a href="usuario/{{$row->id}}/edit" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'usuario/'.$row->id,'method'=>'delete'))}}                    
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

