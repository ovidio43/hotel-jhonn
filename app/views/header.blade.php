<!DOCTYPE html>
<html>
    <head>
        <title>SISTEMA HOTEL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://hoteljhonnzen.com/wp-content/themes/themeJhonnZen/jhonnzen.ico" type="image/x-icon" rel="shortcut icon">
        {{ HTML::style('css/bootstrap-3.1.1/css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-3.1.1/css/bootstrap-theme.min.css') }}                
        {{ HTML::style('css/layout.css') }}                
        {{ HTML::style('js/Zebra_Datepicker-master/css/bootstrap.css') }}                
        {{ HTML::style('js/jquery-ui-1.10.4/css/ui-lightness/jquery-ui-1.10.4.custom.min.css') }}                
        {{ HTML::script('js/jquery-2.0.2.min.js') }}
        {{ HTML::script('css/bootstrap-3.1.1/js/bootstrap.min.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4/development-bundle/ui/minified/jquery.ui.core.min.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4/development-bundle/ui/minified/jquery.ui.widget.min.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4/development-bundle/ui/minified/jquery.ui.position.min.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4/development-bundle/ui/minified/jquery.ui.menu.min.js') }}
        {{ HTML::script('js/jquery-ui-1.10.4/development-bundle/ui/minified/jquery.ui.autocomplete.min.js') }}  
        {{ HTML::script('js/Zebra_Datepicker-master/javascript/zebra_datepicker.js') }}        
        {{ HTML::script('js/main.min.js') }}         
    </head>
    <body>
        <div class="alert alert-info custom-loading">
            <strong>Cargando...</strong> 
        </div>
        <div role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button data-target="navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="{{URL::to('login')}}" class="navbar-brand">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="glyphicon-class">HOTEL</span>
                    </a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <?php
                        $currentUser = Auth::user();
                        $usuario = Usuario::find($currentUser->id);
                        if ($usuario->tipoUsuario->nombre === 'Super Administrador') {
                            ?>
                            <li <?php echo (Request::is('sistema/*') || Request::is('sistema')) ? 'class="active"' : ''; ?>>
                                <a href="{{URL::to('sistema')}}"><span class="glyphicon glyphicon-cog"></span> Sistema</a>
                            </li>  

                            <li  <?php echo (Request::is('administracion/*') || Request::is('administracion')) == true ? 'class="active"' : ''; ?>>
                                <a href="{{URL::to('administracion')}}"><span class="glyphicon glyphicon-hdd"></span> Administración</a>
                            </li>  
                            <?php
                        }
                        ?>
                        <li  <?php echo (Request::is('reservaciones/*') || Request::is('reservaciones')) == true ? 'class="active"' : ''; ?>>
                            <a href="{{URL::to('reservaciones')}}"><span class="glyphicon glyphicon-asterisk "></span> Reservaciones</a>
                        </li>                          
                    </ul>                                        
                    {{ Form::open(array('url'=>'login/0','method'=>'delete','class'=>'navbar-form navbar-right'))}}

                    <a href="#" id="link-closeSession" title="Cerrar Sesion">
                        <span class="glyphicon glyphicon-user"></span> 
                        <?php
                        echo $currentUser->trabajador->nombre . ' ' . $currentUser->trabajador->apellidoP . ' ' . $currentUser->trabajador->apellidoM;
                        ?>
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>                   
                    {{ Form::close()}}
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">

