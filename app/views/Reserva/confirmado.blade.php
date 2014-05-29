<?php
$Habitacion = Habitacion::find($Reserva->habitacionReserva->id_habitacion);
$ObjPrecio = Precio::find($Reserva->habitacionReserva->id_precio);
$objMoneda = Moneda::find($ObjPrecio->id_moneda);
$objCliente = Cliente::find($Reserva->id_cliente);
?>
<td><?php echo '# ' . $Habitacion->nro; ?></td>
<td><?php echo $Habitacion->tipoHabitacion->nombre; ?></td>
<td><?php echo $objCliente->nombre . ' ' . $objCliente->apellidoP . ' ' . $objCliente->apellidoM; ?></td>
<td><?php echo $Reserva->fecha_entrada; ?></td>
<td><?php echo $Reserva->fecha_salida; ?></td>
<td><?php echo $Reserva->dias; ?></td>
<td>
    <?php
    $datetime1 = new DateTime(date('Y-m-d H:i:s'));
    $datetime2 = new DateTime($Reserva->fecha_salida);
    $interval = $datetime1->diff($datetime2);
    echo $interval->format('%R%a días');
    ?>
</td>
<td><?php echo $Reserva->estado_pago; ?></td>
<td><?php echo $Reserva->total; ?></td>
<td>
    <?php
    $monto = 0;
    if (count($Reserva->pago) > 0) {
        foreach ($Reserva->pago as $rowP) {
            $monto+=$rowP->monto;
            echo $rowP->monto . '<br>';
        }
    } else {
        echo $monto;
    }
    ?>           
</td>
<td><?php echo ($Reserva->total - $monto); ?></td>   
<td><?php echo $objMoneda->simbolo; ?></td> 
<td>
    <?php
    if (count($Reserva->cuentaPorCobrar) > 0) {
        ?>
        <i>Agregado a C/P </i> <br>
        <a href="{{URL::to('reservaciones/liberar/'.$Reserva->id)}}" class="liberar" title="Liberar Habitación" >Liberar</a>
        <?php
    } elseif ($monto < $Reserva->total) {
        ?>
        <a href="{{URL::to('reservaciones/realizar-cobro/'.$Reserva->id)}}" class="realizar-cobro" title="Realizar Cobro" >
            <span class="glyphicon glyphicon-usd"></span>
        </a><br>
        <a href="{{URL::to('reservaciones/pasar-cuenta/'.$Reserva->id)}}" class="pasar-cuenta" title="Guardar en libro de cuentas" >
            <span class=" glyphicon glyphicon-paperclip"></span>
        </a>                            
        <?php
    } else {
        ?>
        <a href="{{URL::to('reservaciones/liberar/'.$Reserva->id)}}" class="liberar" title="Liberar Habitación" >Liberar</a>
        <?php
    }
    ?>
</td>
