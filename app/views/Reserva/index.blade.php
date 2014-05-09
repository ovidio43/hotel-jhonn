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
                <th>Pago Pendiente</th>                
                <th>Total</th>                                
                <th colspan="2"></th>            
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>56</td> 
                <td>jorge luis quispe</td> 
                <td>2014-05-01</td> 
                <td>2014-05-06</td> 
                <td>5</td> 
                <td>2</td> 
                <td>Pendiente</td> 
                <td>100</td> 
                <td>500</td> 
            </tr>
        </tbody>        
    </table>
</div>
@stop

