@extends('reservaciones')
@section('title')
NUEVA RESERVASION
@stop
@section('content')
{{ Form::open(array('url' => 'reservaciones/create','class'=>'form-horizontal')) }}   
<div class="form-group">
    <div class="col-sm-3">
        {{Form::label('id_cliente', 'Cliente')}}
        <select name="id_cliente" id="id_cliente" class="form-control" >
            <option value="">...........</option>
            <option value="">...........</option>
            <option value="">...........</option>
            <option value="">...........</option>
            <option value="">...........</option>
        </select>        
        <span class="error">{{ $errors->first('id_cliente')}}</span>
        <div >
            {{Form::label('descripcion', 'Descripción')}}
            {{ Form::textArea('descripcion','',['class'=>'form-control'])}}
        </div>
    </div>
    <div class="col-sm-9">
        <div class="col-sm-6" id="caledar-visible1">
            {{Form::label('fecha_entrada', 'Ingreso')}}
            {{ Form::hidden('fecha_entrada','',['class'=>'form-control','id'=>'date-start'])}}
            <span class="error">{{ $errors->first('fecha_entrada')}}</span>
        </div>

        <div class="col-sm-6" id="caledar-visible2">
            {{Form::label('fecha_salida', 'Salida')}}
            {{ Form::hidden('fecha_salida','',['class'=>'form-control','id'=>'date-end'])}}
            <span class="error">{{ $errors->first('fecha_salida')}}</span>
        </div>
    </div>
</div> 
<div class="form-group">
    {{Form::label('', 'Habitación',['class'=>'col-sm-1 control-label'])}}
</div>
<div class="form-group">       

    <ul class="list-group  over-flow-y">
        <?php
        for ($i = 0; $i < 50; $i++) {
            ?>
            <li class="list-group-item">
                <input type="checkbox" id="id_habitacion<?php echo $i; ?>" name="id_habitacion[]" value="" />
                {{Form::label('id_habitacion'.$i, 'Habitación'.$i)}}
            </li>           
            <?php
        }
        ?>
    </ul>        
    <span class="error">{{ $errors->first('id_habitacion')}}</span>
</div>  
<div class="form-group">
    <div class="col-sm-12">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop
