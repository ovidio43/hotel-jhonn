@extends('administracion')
@section('title')
REPORTES 
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/reporte/reservas','class'=>'form-horizontal')) }}  
<h3>Reservas</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="form-group">
            {{Form::label('estado_pago', 'Estado de Pago',['class'=>'col-sm-1 control-label'])}}
            <div class="col-sm-2">
                {{Form::select('estado_pago', ['TODOS'=>'TODOS','PENDIENTE' => 'PENDIENTE', 'CANCELADO' => 'CANCELADO'],null,['class'=>'form-control','id'=>'estado_pago'])}}
            </div>
            {{Form::label('desde', 'Desde',['class'=>'col-sm-1 control-label'])}}
            <div class="col-sm-2">
                {{ Form::text('desde',date('Y-m-d'),['class'=>'form-control default-date'])}}        
            </div>
            {{Form::label('hasta', 'Hasta',['class'=>'col-sm-1 control-label '])}}
            <div class="col-sm-2">
                {{ Form::text('hasta',date('Y-m-d'),['class'=>'form-control default-date'])}}        
            </div>  
            <div class="col-sm-2">        
                {{ Form::submit('Consultar',['class'=>'btn btn-default'])}}
            </div>
        </div>
    </li>   
</ul>
{{ Form::close() }}
{{ Form::open(array('url' => 'administracion/reporte/reservas','class'=>'form-horizontal')) }}  
<h3>Clientes Deudores</h3>
<ul class="list-group">
    <li class="list-group-item">
        <div class="form-group">
            {{Form::label('estado_pago', 'Estado de Pago',['class'=>'col-sm-1 control-label'])}}
            <div class="col-sm-2">
                {{Form::select('estado_pago', ['TODOS'=>'TODOS','PENDIENTE' => 'PENDIENTE', 'CANCELADO' => 'CANCELADO'],null,['class'=>'form-control','id'=>'estado_pago'])}}
            </div>
            {{Form::label('desde', 'Desde',['class'=>'col-sm-1 control-label'])}}
            <div class="col-sm-2">
                {{ Form::text('desde',date('Y-m-d'),['class'=>'form-control default-date'])}}        
            </div>
            {{Form::label('hasta', 'Hasta',['class'=>'col-sm-1 control-label '])}}
            <div class="col-sm-2">
                {{ Form::text('hasta',date('Y-m-d'),['class'=>'form-control default-date'])}}        
            </div>  
            <div class="col-sm-2">        
                {{ Form::submit('Consultar',['class'=>'btn btn-default'])}}
            </div>
        </div>
    </li>   
</ul>
{{ Form::close() }}
@stop


