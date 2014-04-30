@include('header')
<div class="col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{URL::to('sistema/usuario')}}">Usuario</a></li>
        <li><a href="{{URL::to('sistema/tipo-usuario')}}">Tipo Usuario</a></li>
        <li><a href="#">Parametros</a></li>        
    </ul>
</div>
@include('content')
@include('footer')
