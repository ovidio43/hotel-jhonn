@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li <?php echo (Request::is('administracion/trabajador/*') || Request::is('administracion/trabajador')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('administracion/trabajador')}}"><span class="glyphicon glyphicon-user"></span> Trabajador</a>
        </li>               
        <li <?php echo (Request::is('administracion/cliente/*') || Request::is('administracion/cliente')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('administracion/cliente')}}"><span class="glyphicon glyphicon-pushpin"></span> Cliente</a>
        </li>               
        <li <?php echo (Request::is('administracion/habitacion/*') || Request::is('administracion/habitacion')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('administracion/habitacion')}}"><span class="glyphicon glyphicon-bell"></span> Habitación</a>
        </li>
        <li <?php echo (Request::is('administracion/tipo-habitacion/*') || Request::is('administracion/tipo-habitacion')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('administracion/tipo-habitacion')}}"><span class="glyphicon glyphicon-bell"></span> Tipo Habitación</a>
        </li>
    </ul>
</div>
@include('content')
@include('footer')
