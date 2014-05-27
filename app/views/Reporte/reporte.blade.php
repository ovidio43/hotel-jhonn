<?php
ob_start();
echo HTML::style('css/layout.css');
getHeader($Input);
getContent($Input);

function getDateFormting($date) {
    $Ymd = explode('-', $date);
    $meses = [
        '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio', '07' => 'Julio',
        '08' => 'Agosto', '09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
    ];
    return $Ymd[2] . ' ' . $meses[$Ymd[1]] . ' de ' . $Ymd[0];
}

function getHeader($Input) {
    ?>
    <table class="reporte">
        <thead>
            <tr>
                <th><h4>Reporte Reservas</h4></th>          
    </tr>
    <tr>
        <th>Desde <?php echo getDateFormting($Input['desde']); ?> hasta <?php echo getDateFormting($Input['hasta']); ?></th>                          
    </tr>
    <tr>
        <th>Expresado en (<?php echo 'Bs.-' ?>)</th>                          
    </tr>
    </thead>        
    </table>

    <?php
}

function getContent($Input) {
    ?>
    <table class="reporte" border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Estado</th>
                <th>Monto</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $Reserva = Reserva::where('activo', '=', '1')->whereBetween('fecha_entrada', array($Input['desde'], $Input['hasta']))->get();
            foreach ($Reserva as $rowR) {
                ?>
                <tr>
                    <td></td>
                    <td>{{ $rowR->fecha_entrada}}</td>                    
                    <td>{{ $rowR->fecha_salida}}</td>                    
                    <td>{{ $rowR->estado_pago}}</td>                    
                    <td>0</td>
                    <td>{{ $rowR->total}}</td>                    
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}

$content = ob_get_clean();
$mpdf = new mPDF('c', 'Letter', '', '', 10, 10, 25, 25, 16, 13);
$mpdf->SetTitle('my title');
$mpdf->SetHeader('{DATE j-m-Y}|{PAGENO}/{nb}|HOTEL');
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
