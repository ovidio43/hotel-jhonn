@extends('administracion')
@section('title')
NUEVO TIPO HABITACION
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/tipo-habitacion/'.$TipoHabitacion->id,'method'=>'put','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre',$TipoHabitacion->nombre,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('monto', 'Costo',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('monto',$TipoHabitacion->monto,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('monto')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::textArea('descripcion',$TipoHabitacion->descripcion,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('descripcion')}}</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}

@stop
