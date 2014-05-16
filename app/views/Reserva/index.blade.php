@extends('reservaciones')
@section('title')
LISTADO DE RESERVAS
@stop
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>            
            <tr>
                <th># Habitación</th>                
                <th>Cliente</th>                
                <th>Ingreso</th>                
                <th>Salida</th>                
                <th>Total Dias</th>                
                <th>Dias Restantes</th>       
                <th>Estado de pago</th>                      
                <th>Total</th> 
                <th>Monto a cuenta</th> 
                <th>Pago Pendiente</th>                                         
            </tr>
        </thead>
        <tbody>
            <?php
            $objReserva = Reserva::where('estado_pago', '=', 'PENDIENTE')->orderBy('fecha','desc')->get();
            foreach ($objReserva as $rowR) {
                ?>
                <tr>
                    <td>
                        <?php
                        foreach ($rowR->habitacionReserva as $rowHR) {
                            echo Habitacion::find($rowHR->id_habitacion)->nro;
                            echo '<br>';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $objCliente = Cliente::find($rowR->id_cliente);
                        echo $objCliente->nombre . ' ' . $objCliente->apellidoP . ' ' . $objCliente->apellidoM;
                        ?>
                    </td>
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
                        foreach ($rowR->pago as $rowP) {
                            echo $rowP->monto . '<br>';
                            $monto+=$rowP->monto;
                        }
                        ?>
                    </td>
                    <td><?php echo ($rowR->total - $monto); ?></td>                  
                </tr>
                <?php
            }
            ?>
        </tbody>        
    </table>   
</div>
@stop

