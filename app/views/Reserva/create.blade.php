@extends('reservaciones')
@section('title')
NUEVA RESERVA
@stop
@section('content')

{{ Form::open(array('url' => 'reservaciones','class'=>'form-horizontal')) }}   
<div class="form-group">  
    <div class="col-sm-3">    
        {{Form::label('','Seleccione Moneda : ')}}<br>
        @foreach(Moneda::all() as $rowM)
        {{Form::label('moneda'.$rowM->id, $rowM->simbolo,['title'=>$rowM->nombre])}}
        <input type="radio" name="id_moneda" id="moneda{{$rowM->id}}" value="{{$rowM->id}}" title="{{$rowM->nombre}}"> |
        @endforeach
    </div>
    <div class="col-sm-3">
        {{Form::label('monto', 'Monto')}}
        {{ Form::text('monto','0',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('monto')}}</span>
    </div>
    <div class="col-sm-3">  
        {{Form::label('total', 'Total')}}
        {{ Form::text('total','0',['class'=>'form-control','readonly'=>'readonly'])}}
        <span class="error">{{ $errors->first('total')}}</span>
    </div>
    <div class="col-sm-3">
        {{Form::label('saldo', 'Saldo')}}
        {{ Form::text('saldo','0',['class'=>'form-control','readonly'=>'readonly'])}}    
    </div>
</div>
<div class="form-group">   
    <div class="col-sm-3">
        {{Form::label('id_cliente', 'Cliente')}} 
        <a href="javascript:void();"><span class="glyphicon glyphicon-plus"></span></a>
        <select name="id_cliente" id="id_cliente" class="form-control" >
            <option value="">...........</option>
            @foreach(Cliente::all() as $row)
            <option value="{{$row->id}}">{{$row->nombre.' '.$row->apellidoP.' '.$row->apellidoM}}</option>
            @endforeach            
        </select>        
        <span class="error">{{ $errors->first('id_cliente')}}</span>
        <div >
            {{Form::label('descripcion', 'Descripción de Reserva')}}
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
        $c = 1;
        $objhab = Habitacion::where('estado', '=', 'LIBRE')->get();
        foreach ($objhab as $row) {
            $idHab = $row->id;
            $nroHab = $row->nro;
            $descHab = $row->tipoHabitacion->descripcion;
            $nombreTipoH = $row->tipoHabitacion->nombre;
            ?>
            <li class="list-group-item">
                <input type="checkbox" id="id_habitacion<?php echo $c; ?>" name="id_habitacion[]" value="<?php echo $idHab; ?>" class="rb-hab" />
                <label for="id_habitacion<?php echo $c; ?>">
                    <p><?php echo 'Nº : ' . $nroHab; ?></p>
                    <p><?php echo ' ' . $descHab . ', Tipo : ' . $nombreTipoH; ?></p>   
                    <?php
                    foreach ($row->tipoHabitacion->precio as $pre) {
                        $objMon = Moneda::find($pre->id_moneda);
                        ?>
                        <p class="p-precio">
                            <input type="hidden" value="<?php echo $pre->monto; ?>" id="moneda-<?php echo $objMon->id; ?>" >
                            <?php echo $pre->monto . ' ' . $objMon->simbolo . ' ' . $objMon->nombre . '(' . $objMon->pais . ')'; ?>
                        </p>
                        <?php
                    }
                    ?>
                </label>
            </li>
            <?php
            $c++;
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
