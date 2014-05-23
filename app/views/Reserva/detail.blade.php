@extends('reservaciones')
@section('title')
NUEVA RESERVA
@stop
@section('content')
<div class="modal-dialog" style="width: 100%;">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="detail-close close" type="button">×</button>
            <h5 class="text-center"><strong>Nueva Reservación</strong></h5>
        </div>
        <div class="modal-body">
            {{ Form::open(array('url' => 'reservaciones/detail','class'=>'form-horizontal')) }} 
            <div class="form-group">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Habitacion Nº : </strong>
                        <?php echo $Habitacion->nro; ?>
                        <input type="hidden" name="id_habitacion" value="<?php echo $Habitacion->id; ?>">
                    </li>
                    <li class="list-group-item"><strong>Tipo de Habitación: </strong> <?php ?><?php echo $Habitacion->tipoHabitacion->nombre; ?></li>
                    <li class="list-group-item"><strong>Descripción: </strong><?php echo $Habitacion->tipoHabitacion->descripcion; ?></li>
                    <li class="list-group-item"><strong>Seleccione Precio : </strong>
                        <ul class="list-group">
                            <input type="hidden" id="id_moneda" name="id_moneda" value="">
                            <span class="error">{{ $errors->first('id_precio')}}</span>
                            <?php
                            $c = 0;

                            foreach ($Habitacion->tipoHabitacion->precio as $rowPrecio) {
                                $objMon = Moneda::find($rowPrecio->id_moneda);
                                ?>
                                <li class="list-group-item">                                    
                                    <input type="radio" id="id_precio<?php echo $c; ?>" name="id_precio" value="<?php echo $rowPrecio->id; ?>" title="<?php echo $rowPrecio->monto; ?>" moneda_id="<?php echo $objMon->id; ?>">
                                    <label for="id_precio<?php echo $c; ?>" title="<?php echo $objMon->nombre . ' (' . $objMon->pais . ')'; ?>"> 
                                        <?php
                                        echo 'Personas ' . $rowPrecio->personas . ' : ';
                                        echo $rowPrecio->monto;
                                        echo $objMon->simbolo;
                                        ?>
                                    </label>
                                    <?php
                                    $c++;
                                    ?>
                                </li>
                                <?php
                            }
                            ?> 
                        </ul>
                    </li>      
                </ul>
            </div>             
            <div class="form-group">  
                <div class="col-sm-4">
                    {{Form::label('monto', 'Monto')}}
                    {{ Form::text('monto','0',['class'=>'form-control only-numeric'])}}                    
                </div>  
                <div class="col-sm-4">  
                    {{Form::label('total', 'Total')}}
                    {{ Form::text('total','0',['class'=>'form-control','readonly'=>'readonly'])}}
                    <span class="error">{{ $errors->first('total')}}</span>
                </div>
                <div class="col-sm-4">
                    {{Form::label('saldo', 'Saldo')}}
                    {{ Form::text('saldo','0',['class'=>'form-control','readonly'=>'readonly'])}}    
                </div> 
            </div>
            <div class="form-group">   
                <div class="col-sm-3">
                    {{Form::label('id_cliente', 'Cliente')}} 
                    <a href="{{URL::to('cliente/nuevo')}}" id="nuevo-cliente"><span class="glyphicon glyphicon-plus"></span></a>
                    <select name="id_cliente" id="id_cliente" class="form-control" >
                        <option value="">...........</option>
                        @foreach(Cliente::all() as $row)
                        <option value="{{$row->id}}">{{$row->nombre.' '.$row->apellidoP.' '.$row->apellidoM}}</option>
                        @endforeach            
                    </select>        
                   
                    <!---custom autocompletar   -->
<!--                    <input type="text" value="" name="id_cliente" id="id_cliente" >
                    <div class="list-group">
                        <a href="#" class="list-group-item">jkshdfljadh</a>                        
                        <a href="#" class="list-group-item">jkshdfljadh</a>                        
                        <a href="#" class="list-group-item">jkshdfljadh</a>                                                                      
                    </div>-->
                    <!---------------------------------->
                    <span class="error">{{ $errors->first('id_cliente')}}</span>
                    <div >
                        {{Form::label('descripcion', 'Descripción de Reserva')}}
                        {{ Form::textArea('descripcion','',['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="col-sm-9">   
                    <input type="hidden" name="dias" id="dias" value="0" >
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
                <div class="col-sm-12">
                    {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
                </div>
            </div>
            {{ Form::close() }}
        </div>         
    </div>
</div>
<div id="loginModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">

</div>
@stop