@extends('administracion')
@section('title')
Reporte de Reservas 
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/reporte/reservas','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('desde', 'Desde',['class'=>'col-sm-1 control-label'])}}
    <div class="col-sm-3">
        {{ Form::text('desde',date('Y-m-d'),['class'=>'form-control default-date'])}}        
    </div>
    {{Form::label('hasta', 'Hasta',['class'=>'col-sm-1 control-label '])}}
    <div class="col-sm-3">
        {{ Form::text('hasta',date('Y-m-d'),['class'=>'form-control default-date'])}}        
    </div>
    <div class="col-sm-2">        
         {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop


