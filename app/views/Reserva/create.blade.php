@extends('reservaciones')
@section('title')
NUEVA RESERVA
@stop
@section('content')
<div class="list-group ">    
    <?php
    $c = 1;
    $objhab = Habitacion::where('estado', '=', 'LIBRE')->get();
    foreach ($objhab as $row) {
        $idHab = $row->id;
        $nroHab = $row->nro;
        $descHab = $row->tipoHabitacion->descripcion;
        $nombreTipoH = $row->tipoHabitacion->nombre;
        ?>
        <a href="<?php echo URL::to('reservaciones/detail/' . $idHab); ?>" class="list-group-item obj-hab">
            <strong># <?php echo $nroHab; ?></strong>
            <p><?php echo $descHab . ' ' . $nombreTipoH; ?></p>
        </a>
        <?php
        $c++;
    }
    ?>
</div>
@stop
