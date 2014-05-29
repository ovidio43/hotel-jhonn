@extends('reservaciones')
@section('title')
LISTADO DE RESERVAS
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>            
            <tr>
                <th>Habitación</th>                
                <th>Tipo</th>                
                <th>Cliente</th>                
                <th>Ingreso</th>                
                <th>Salida</th>                
                <th>Total Dias</th>                
                <th>Dias Restantes</th>       
                <th>Estado de pago</th>                      
                <th>Total</th> 
                <th>Monto a cuenta</th> 
                <th>Pago Pendiente</th>                                         
                <th>Moneda</th>                                         
                <th></th>                                         
            </tr>
        </thead>
        <tbody>
            <?php
            $objReserva = Reserva::orderBy('fecha', 'desc')->where('activo', '=', '1')->get();
            foreach ($objReserva as $rowR) {
                $Habitacion = Habitacion::find($rowR->habitacionReserva->id_habitacion);
                $ObjPrecio = Precio::find($rowR->habitacionReserva->id_precio);
                $objMoneda = Moneda::find($ObjPrecio->id_moneda);
                $objCliente = Cliente::find($rowR->id_cliente);
                ?>
                <tr id="<?php echo $rowR->id; ?>">
                    <td><?php echo '# ' . $Habitacion->nro; ?></td>
                    <td><?php echo $Habitacion->tipoHabitacion->nombre; ?></td>
                    <td><?php echo $objCliente->nombre . ' ' . $objCliente->apellidoP . ' ' . $objCliente->apellidoM; ?></td>
                    <td><?php echo $rowR->fecha_entrada; ?></td>
                    <td><?php echo $rowR->fecha_salida; ?></td>
                    <td><?php echo $rowR->dias; ?></td>
                    <td>
                        <?php
                        $datetime1 = new DateTime(date('Y-m-d H:i:s'));
                        $datetime2 = new DateTime($rowR->fecha_salida);
                        $interval = $datetime1->diff($datetime2);
                        echo $interval->format('%R%a días');
                        ?>
                    </td>
                    <td><?php echo $rowR->estado_pago; ?></td>
                    <td><?php echo $rowR->total; ?></td>
                    <td>
                        <?php
                        $monto = 0;
                        if (count($rowR->pago) > 0) {
                            foreach ($rowR->pago as $rowP) {
                                $monto+=$rowP->monto;
                                echo $rowP->monto . '<br>';
                            }
                        } else {
                            echo $monto;
                        }
                        ?>           
                    </td>
                    <td><?php echo ($rowR->total - $monto); ?></td>   
                    <td><?php echo $objMoneda->simbolo; ?></td> 
                    <td>
                        <?php
                        if (count($rowR->cuentaPorCobrar) > 0) {
                            ?>
                            <i>Agregado a C/P </i> <br>
                            <a href="{{URL::to('reservaciones/liberar/'.$rowR->id)}}" class="liberar" title="Liberar Habitación" >Liberar</a>
                            <?php
                        } elseif ($monto < $rowR->total) {
                            ?>
                            <a href="{{URL::to('reservaciones/realizar-cobro/'.$rowR->id)}}" class="realizar-cobro" title="Realizar Cobro" >
                                <span class="glyphicon glyphicon-usd"></span>
                            </a><br>
                            <a href="{{URL::to('reservaciones/pasar-cuenta/'.$rowR->id)}}" class="pasar-cuenta" title="Guardar en libro de cuentas" >
                                <span class=" glyphicon glyphicon-paperclip"></span>
                            </a>                            
                            <?php
                        } else {
                            ?>
                            <a href="{{URL::to('reservaciones/liberar/'.$rowR->id)}}" class="liberar" title="Liberar Habitación" >Liberar</a>
                            <?php
                        }
                        ?>

                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>        
    </table>   
</div>
<div id="loginModal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">

</div>
@stop

