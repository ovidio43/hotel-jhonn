@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li <?php echo (Request::is('reservaciones')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('reservaciones')}}"><span class="glyphicon glyphicon-file"></span>Reservadas</a>
        </li>  
        <li <?php echo (Request::is('reservaciones/create')||Request::is('reservaciones/*')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('reservaciones/create')}}"><span class="glyphicon glyphicon-file"></span> Disponibles</a>
        </li>
    </ul>
</div>
@include('content')
@include('footer')
