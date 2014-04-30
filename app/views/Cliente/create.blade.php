@extends('administracion')
@section('title')
NUEVO CLIENTE
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/cliente','class'=>'form-horizontal')) }}
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('apellidoP', 'Ap. Paterno',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('apellidoP','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('apellidoP')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('apellidoM', 'Ap. Materno',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('apellidoM','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('apellidoM')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('ci', 'CI',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('ci','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('ci')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('telefono', 'Teléfono',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('telefono','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('telefono')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('direccion', 'Dirección',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('direccion','',['class'=>'form-control'])}}
    </div>
</div>
<div class="form-group">
    {{Form::label('email', 'Email',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('email','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('email')}}</span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop
