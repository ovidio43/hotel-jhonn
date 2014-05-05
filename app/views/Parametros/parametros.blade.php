@extends('sistema')
@section('title')
PARAMETROS DE SISTEMA
@stop
@section('content')

<ul class="nav nav-tabs">
    <li class="active"><a href="#">Parametros de negocio</a></li>
    <li ><a href="{{URL::to('sistema/parametros/moneda')}}" class="get-list">Moneda</a></li>
    <li><a href="#">TC</a></li>
    <!--    <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                Dropdown <span class="caret"></span>
            </a>
            <ul role="menu" class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </li>-->
</ul>
<div id="content-parmas">


</div>
@stop

