@extends('administracion')
@section('title')
NUEVO TIPO HABITACION
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/tipo-habitacion','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>

<div class="form-group" >
    {{Form::label('descripcion', 'Descripción',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::textArea('descripcion','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('descripcion')}}</span>
    </div>
</div>
<!--  link para adicionar precios -->
<div class="form-group">
    <div class="col-sm-4">   
        <input type="hidden" value="0" name="prices" id="prices">
        <a href="{{URL::to('administracion')}}/moneda" id="add-price" rel="0">
            <span class="glyphicon glyphicon-plus"></span> Adicionar precio
        </a>
        <span style="display: none;">Porcesando..</span>
    </div>
</div>
<!-------------------------------------------->

<div class="form-group" id="content-button">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}

@stop
