<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobkii</title>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('css/plugins/morris.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="white-bg">

        <div id="wrapper" class="margen">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top bg-color" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Mobkii Encuesta</a>
                </div>
                <ul class="nav navbar-right top-nav">
                    @if (Auth::guest())
                    <li>
                    <a href="{{ url('/validacion/registro') }}"><i class="fa fa-fw fa-user"></i> Registrarse</a>
                    </li>
                    <li>
                        <a href="{{ url('/validacion/inicio') }}"><i class="fa fa-fw fa-envelope"></i> Iniciar sesión</a>
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->nombre }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Mensajes</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Ajustes</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/validacion/salida') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                @if(Auth::guest())
                @else
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li {{{ (Request::segment(1) === 'validado' ? 'class=active' : '') }}}>
                            <a href="{{ url('/validado') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li {{{ (Request::segment(2) === 'encuesta' ? 'class=active' : '') }}}>
                            <a href="{{ url('/auth/encuesta') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Encuesta</a>
                        </li>
                        <li {{{ (Request::segment(2) === 'modelo' ? 'class=active' : '') }}}>
                            <a href="{{ url('/auth/modelo') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Modelos</a>
                        </li>
                    </ul>
                </div>
                @endif
                <!-- /.navbar-collapse -->
            </nav>
            @if(Session::has('succes'))
            <div class="alert alert-success col-sm-offset-4 col-sm-3 fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Muy bien!</strong> {{Session::get('succes')}}
            </div>
            @endif
            @yield('content')
        </div>
        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </body>
    </html>
