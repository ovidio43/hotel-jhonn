@extends('reservaciones')
@section('title')
HABITACIONES DISPONIBLES
@stop
@section('content')
<div class="list-group ">    
    <?php
    $c = 1;
    $objhab = Habitacion::where('estado', '=', 'LIBRE')->orderby('id_tipo_habitacion', 'asc')->get();
    foreach ($objhab as $row) {
        $idHab = $row->id;
        $nroHab = $row->nro;
        $descHab = $row->tipoHabitacion->descripcion;
        $nombreTipoH = $row->tipoHabitacion->nombre;
        ?>
        <a href="<?php echo URL::to('reservaciones/' . $idHab); ?>" class="list-group-item obj-hab">
            <strong># <?php echo $nroHab; ?></strong>
            <p><?php echo $descHab . ' ' . $nombreTipoH; ?></p>
        </a>
        <?php
        $c++;
    }
    ?>
</div>
<div id="content-detail" class="modal" tabindex="-1" role="dialog" aria-hidden="true">

</div>
@stop
