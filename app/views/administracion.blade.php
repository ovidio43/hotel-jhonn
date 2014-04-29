
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
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">
                        <span class="glyphicon glyphicon-home"></span>
                        <span class="glyphicon-class">HOTEL</span>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">Administración</a></li>                        
                    </ul>                    
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="nav nav-pills nav-stacked">
                        <li <?php
                        if (Request::is('usuario')) {
                            echo 'class="active"';
                        }
                        ?> ><a href="{{URL::to('usuario')}}">Usuario</a></li>
                        <li <?php
                        if (Request::is('tipo-usuario')) {
                            echo 'class="active"';
                        }
                        ?>><a href="{{URL::to('tipo-usuario')}}">Tipo Usuario</a></li>
                        <li <?php
                        if (Request::is('trabajador')) {
                            echo 'class="active"';
                        }
                        ?>><a href="{{URL::to('trabajador')}}">Trabajador</a></li>
                    </ul>
                </div>
                <div class="col-sm-10">                    
                    <h3 class="sub-header">@yield('title')</h3>
                    <div class="table-responsive">
                        @yield('content')  
                    </div>
                </div>
            </div>
        </div>      
    </body>
</html>
