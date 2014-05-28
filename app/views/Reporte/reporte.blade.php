<?php
ob_start();
echo HTML::style('css/layout.css');
getHeader($Input);
getContent($Input);

function getHeader($Input) {
    ?>
    <table class="header-reporte">
        <thead>
            <tr><th><h4>Reporte Reservas</h4></th></tr>
    <tr><th>Desde <?php echo getDateFormting($Input['desde']); ?> Hasta <?php echo getDateFormting($Input['hasta']); ?></th></tr>
    </thead>   
    </table>
    <?php
}

function getContent($Input) {
    ?>
    <table class="content-reporte" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Habitación</th>
                <th>Cliente</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Empleado</th>
                <th>Estado</th>
                <th>Precio</th>
                <th>Días</th>
                <th>Monto Pagado</th>
                <th>Total</th>
                <th>Moneda</th>                
            </tr>
        </thead>
        <tbody>
            <?php
            if ($Input['estado_pago'] === 'TODOS') {
                $Reserva = Reserva::whereBetween('fecha', array($Input['desde'] . ' 00:00:00', $Input['hasta'] . ' 23:59:59'))->get();
            } else {
                $Reserva = Reserva::where('estado_pago', '=', $Input['estado_pago'])->whereBetween('fecha', array($Input['desde'] . ' 00:00:00', $Input['hasta'] . ' 23:59:59'))->get();
            }

            foreach ($Reserva as $rowR) {
                $Habitacion = Habitacion::find($rowR->habitacionReserva->id_habitacion);
                $ObjPrecio = Precio::find($rowR->habitacionReserva->id_precio);
                $objMoneda = Moneda::find($ObjPrecio->id_moneda);
                $objCliente = Cliente::find($rowR->id_cliente);
                $objTrabajador = Trabajador::find($rowR->id_trabajador);
                ?>
                <tr>
                    <td><?php echo $rowR->id; ?></td>
                    <td><?php echo $Habitacion->nro; ?></td>
                    <td><?php echo $objCliente->nombre . ' ' . $objCliente->apellidoP . ' ' . $objCliente->apellidoM; ?></td>
                    <td><?php echo $rowR->fecha_entrada; ?></td>
                    <td><?php echo $rowR->fecha_salida; ?></td>                  
                    <td><?php echo $objTrabajador->nombre . ' ' . $objTrabajador->apellidoP . ' ' . $objTrabajador->apellidoM; ?></td>
                    <td><?php echo $rowR->estado_pago; ?></td>
                    <td><?php echo $ObjPrecio->monto; ?></td>
                    <td><?php echo $rowR->dias; ?></td>
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
                    <td><?php echo $rowR->total; ?></td>
                    <td><?php echo $objMoneda->simbolo; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}

function getDateFormting($date) {
    $Ymd = explode('-', $date);
    $meses = [
        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio',
        '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
    ];
    return $Ymd[2] . ' de ' . $meses[$Ymd[1]] . ' ' . $Ymd[0];
}

$content = ob_get_clean();
$mpdf = new mPDF('c', 'Letter', '', '', 10, 10, 25, 25, 16, 13);
$mpdf->SetTitle('my title');
$mpdf->SetHeader('{DATE j-m-Y}|{PAGENO}/{nb}|Hotel Jhonn-Zen');
$mpdf->SetFooter('{PAGENO}');
$mpdf->SetFooter(array(
    'L' => array(
        'content' => 'Text to go on the left',
        'font-family' => 'sans-serif',
        'font-style' => 'B', /* blank, B, I, or BI */
        'font-size' => '10', /* in pts */
    ),
    'C' => array(
        'content' => '- {PAGENO} -',
        'font-family' => 'serif',
        'font-style' => 'BI',
        'font-size' => '18', /* gives default */
    ),
    'R' => array(
        'content' => 'Printed @ {DATE j-m-Y H:m}',
        'font-family' => 'monospace',
        'font-style' => '',
        'font-size' => '10',
    ),
    'line' => 1, /* 1 to include line below header/above footer */
        ), 'E' /* defines footer for Even Pages */
);

$mpdf->WriteHTML($content);
$mpdf->Output();

exit;
