@extends('administracion')
@section('title')
HABITACIONES
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="4">
                    <a href="habitacion/create" title="Nuevo">
                        <span class="label label-primary"><span class="glyphicon glyphicon-plus"></span> Nuevo</span>
                        <span class="label label-default"></span>            
                    </a>
                </th>
            </tr>
            <tr>
                <th>Nro. Habitación</th>                
                <th>Tipo de Habitación</th>                
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
            @foreach($Habitacion as $row)
            <tr>
                <td>{{ $row->nro }}</td>                
                <td>{{ Habitacion::find( $row->id)->tipoHabitacion->nombre }}</td>                
                <td><a href="habitacion/{{$row->id}}/edit" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                    <a href="#" class="a-delete" title="Eliminar"><span class="glyphicon glyphicon-trash"></span></a>
                    {{ Form::open(array('url'=>'administracion/habitacion/'.$row->id,'method'=>'delete'))}}                    
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

