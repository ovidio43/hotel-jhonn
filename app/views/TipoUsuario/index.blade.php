@extends('sistema')
@section('title')
TIPO USUARIO
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a href="tipo-usuario/create" title="Nuevo">
                        <span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</span>
                        <span class="label label-default"></span>            
                    </a>
                </th>
            </tr>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
           
            @foreach($TipoUsuario as $row)
            <tr>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->descripcion }}</td>    
                <td><a href="tipo-usuario/{{$row->id}}/edit" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'sistema/tipo-usuario/'.$row->id,'method'=>'delete'))}}                         
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

