@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li <?php
        
        if (Route::currentRouteName() === ('administracion.usuario.index' || 'administracion.usuario.create' || 'administracion.usuario.edit')) {
            echo 'class="active"';
        }
        ?> ><a href="{{URL::to('administracion/usuario')}}">Usuario</a></li>
        <li <?php
        if (Route::currentRouteName() === ('administracion.tipo-usuario.index' || 'administracion.tipo-usuario.create' || 'administracion.tipo-usuario.edit')) {
            echo 'class="active"';
        }
        ?>><a href="{{URL::to('administracion/tipo-usuario')}}">Tipo Usuario</a></li>
        <li <?php
        if (Route::currentRouteName() === 'administracion.trabajador.index' || 'administracion.trabajador.create' || 'administracion.trabajador.edit') {
            echo 'class="active"';
        }
        ?>><a href="{{URL::to('administracion/trabajador')}}">Trabajador</a></li>
        <li <?php
        if (Route::currentRouteName() === 'administracion.habitacion.index' || 'administracion.habitacion.create' || 'administracion.habitacion.edit') {
            echo 'class="active"';
        }
        ?>><a href="{{URL::to('administracion/habitacion')}}">Habitación</a></li>
        <li <?php
        if (Route::currentRouteName() === 'administracion.tipo-habitacion.index' || 'administracion.tipo-habitacion.create' || 'administracion.tipo-habitacion.edit') {
            echo 'class="active"';
        }
        ?>><a href="{{URL::to('administracion/tipo-habitacion')}}">Tipo Habitación</a></li>
    </ul>
</div>
@include('content')
@include('footer')
