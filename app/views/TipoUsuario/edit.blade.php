@extends('layout')
@section('title')
EDITAR TIPO USUARIO
@stop
@section('content')

{{ Form::open(array('url' => 'tipo-usuario/'.$TipoUsuario->id,'method'=>'put','class'=>'form-horizontal')) }}
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre',$TipoUsuario->nombre,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::textArea('descripcion',$TipoUsuario->descripcion,['class'=>'form-control'])}}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}

@stop