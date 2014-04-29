@extends('layout')
@section('title')
INICIO
@stop
@section('content')
<h1>Bienvenido : 
    <?php
    $objUsuario = Usuario::find(Auth::user()->id);
    echo $objUsuario->trabajador->nombre.' '.$objUsuario->trabajador->apellidoP;
    ?>
</h1>
@stop

