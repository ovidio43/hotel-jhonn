@include('header')
<h1>Bienvenido : 
    <?php
    if (Auth::user()) {
        $objUsuario = Usuario::find(Auth::user()->id);
        if ($objUsuario) {
            echo $objUsuario->trabajador->nombre . ' ' . $objUsuario->trabajador->apellidoP;
        }
    }
    ?>
</h1>
@include('content')
@include('footer')

