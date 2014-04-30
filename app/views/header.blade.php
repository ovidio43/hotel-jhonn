
<!DOCTYPE html>
<html>
    <head>
        <title>SISTEMA HOTEL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{ HTML::style('css/bootstrap-3.1.1/css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-3.1.1/css/bootstrap-theme.min.css') }}                
        {{ HTML::style('css/layout.css') }}                
        {{ HTML::script('js/jquery-2.0.2.min.js') }}
        {{ HTML::script('css/bootstrap-3.1.1/js/bootstrap.min.js') }}
        {{ HTML::script('js/main.min.js') }}        
    </head>
    <body>

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
                        <li ><a href="{{URL::to('sistema')}}">Sistema</a></li>  
                        <li ><a href="{{URL::to('administracion')}}">Administración</a></li>  
                        <li ><a href="{{URL::to('reservasiones')}}">Reservasiones</a></li>                          
                    </ul>                                        
                    {{ Form::open(array('url'=>'login/0','method'=>'delete','class'=>'navbar-form navbar-right'))}}

                    <a href="#" id="link-closeSession" title="Cerrar Sesion">
                        <span class="glyphicon glyphicon-user"></span> jorge luiz 
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a>                   
                    {{ Form::close()}}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <h1>
                    <?php
                    Route::currentRouteAction();
                    echo Route::currentRouteName();
                    ?>
                </h1>

