@extends('administracion')
@section('title')
NUEVO TIPO USUARIO
@stop
@section('content')

{{ Form::open(array('url' => 'tipo-usuario','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::textArea('descripcion','',['class'=>'form-control'])}}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}

@stop
