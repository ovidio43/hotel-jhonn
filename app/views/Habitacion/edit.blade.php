@extends('administracion')
@section('title')
EDITAR HABITACION
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/habitacion/'.$Habitacion->id,'method'=>'put','class'=>'form-horizontal')) }}
<div class="form-group">
    {{Form::label('nro', 'Nro. Habitación',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        <h4>{{$Habitacion->nro}}</h4>
         <span class="error">{{ $errors->first('nro')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('estado', 'Tipo Habitación',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        <select name="id_tipo_habitacion" class="form-control" > 
            <option value="">..................</option>
            @foreach(TipoHabitacion::orderBy('nombre','asc')->get() as $row)             
            <option value="{{$row->id}}" {{ $row->id==$Habitacion->id_tipo_habitacion ? 'selected' : '' }}>{{$row->nombre}}</option>                
            @endforeach
        </select>          
        <span class="error">{{ $errors->first('id_tipo_habitacion')}}</span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop
