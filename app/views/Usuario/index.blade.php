@extends('sistema')
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
                <th>Email</th>
                <th>Fecha Creación</th>                
                <th>Trabajador</th>                
                <th>Tipo Usuario</th>                
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
            @foreach($Usuario as $row)
            <tr>
                <td>{{ $row->email }}</td>
                <td>{{ $row->fecha_creacion }}</td>                
                <td>{{ Usuario::find($row->id)->trabajador->nombre.' '.Usuario::find($row->id)->trabajador->apellidoP.' '.Usuario::find($row->id)->trabajador->apellidoM }}</td>                
                <td>{{ Usuario::find($row->id)->tipoUsuario->nombre }}</td>                
                <td><a href="usuario/{{$row->id}}/edit" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'administracion/usuario/'.$row->id,'method'=>'delete'))}}                    
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

