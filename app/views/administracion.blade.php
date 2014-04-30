@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{URL::to('administracion/trabajador')}}">Trabajador</a></li>               
        <li><a href="{{URL::to('administracion/habitacion')}}">Habitación</a></li>
        <li><a href="{{URL::to('administracion/tipo-habitacion')}}">Tipo Habitación</a></li>
        <li><a href="#">Cliente</a></li>               
    </ul>
</div>
@include('content')
@include('footer')
