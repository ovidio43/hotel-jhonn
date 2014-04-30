@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li <?php echo (Request::is('sistema/usuario/*') || Request::is('sistema/usuario')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('sistema/usuario')}}"><span class="glyphicon glyphicon-user"></span> Usuario</a>
        </li>
        <li <?php echo (Request::is('sistema/tipo-usuario/*') || Request::is('sistema/tipo-usuario')) ? 'class="active"' : ''; ?>>
            <a href="{{URL::to('sistema/tipo-usuario')}}"><span class="glyphicon glyphicon-user"></span> Tipo Usuario</a>
        </li>
        <li>
            <a href="#"><span class="glyphicon glyphicon-wrench"></span> Parametros</a>
        </li>        
    </ul>
</div>
@include('content')
@include('footer')
