@extends('administracion')
@section('title')
Reporte de Reservas 
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/reporte/reservas','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('estado_pago', 'Estado de Pago',['class'=>'col-sm-2 control-label'])}}
    <div class="col-sm-3">
        {{Form::select('estado_pago', ['TODOS'=>'TODOS','PENDIENTE' => 'PENDIENTE', 'CANCELADO' => 'CANCELADO'],null,['class'=>'form-control','id'=>'estado_pago'])}}
    </div>
</div>
<div class="form-group">
    {{Form::label('desde', 'Desde',['class'=>'col-sm-2 control-label'])}}
    <div class="col-sm-3">
        {{ Form::text('desde',date('Y-m-d'),['class'=>'form-control default-date'])}}        
    </div>
</div>
<div class="form-group">
    {{Form::label('hasta', 'Hasta',['class'=>'col-sm-2 control-label '])}}
    <div class="col-sm-3">
        {{ Form::text('hasta',date('Y-m-d'),['class'=>'form-control default-date'])}}        
    </div>
</div>
<div class="form-group">
    <div class="col-sm-3">        
        {{ Form::submit('Consultar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop


