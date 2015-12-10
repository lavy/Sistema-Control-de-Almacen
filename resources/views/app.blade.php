<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistema de Control Almacén</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <script src="{{asset ('jquery/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('moments/moment.js')}}"></script>
    <script src="{{asset('bootstrap/js/transition.js')}}"></script>
    <script src="{{asset ('bootstrap/js/collapse.js')}}"></script>
    <script src="{{asset ('datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('images/estrella-trans.ico')}}">
    <script src="{{asset('highcharts/highcharts.js')}}"></script>
    <script src="{{asset('highcharts/exporting.js')}}"></script>

    {{--<script src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
    <link href="{{ asset('datepicker/css/datepicker.css')}}" rel="stylesheet" media="screen">--}}
    <script>
       /* function carga(){
            $('#myModal').modal('show') // evento que lanza la ventana
            $('#modalContent').val('');
            $('#bodys').load($(this).attr('href'));
            return false;
        }*/
    </script>

<body onload="carga()">

    <div class="container">
        <img src="{{asset('images/banner.png')}}" width="1150px" height="200px" class="img-responsive" usemap="#map">

        <map name="map">
            <area shape="rect" coords="715,50,740,72" href="http://twitter.com/prensacapital" title="Twitter"/>
            <area shape="rect" coords="745,50,770,74" href="http://www.facebook.com/gobiernodel.distritocapital" title="Facebook" />
            <area shape="rect" coords="775,49,798,75" href="http://www.youtube.com/channel/UCkSbdOePnjXDHbWJt0rA_mw" title="Youtube"/>
            <area shape="rect" coords="802,49,828,75" href="http://instagram.com/prensacapital" title="Instagram"/>
        </map>



        @if (Auth::check())
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="navbar-brand" href="#">{{Auth::user()->nombre.'   '.Auth::user()->apellido}}</span>
                    </div>
                    <div>

                        <?php App\Menu::menu_complete(Auth::user()->cod_usua)  ?>




{{--<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{Auth::user()->nombre.'   '.Auth::user()->apellido}}</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Institución
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Jefes</a></li>
                        <li><a href="#">Tecnicos</a></li>
                        <li><a href="#">Oficinas</a></li>
                        <li><a href="#">Departamentos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tablas Básicas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Almacenes</a></li>
                        <li><a href="#">Marcas</a></li>
                        <li><a href="#">Modelos</a></li>
                        <li><a href="#">Proveedores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Insumos
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Articulos</a></li>
                        <li><a href="#">Tipo de Articulos</a></li>
                    </ul>
                </li>
                <li><a href="#">Solicitudes</a></li>
                <li><a href="#">Despachos</a></li>
                <li><a href="#">Inventario</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estadísticas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Gráficos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Gráficos</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>

            </ul>
        </div>
    </div>
</nav>--}}

            </div>
        </div>
    </nav>
        @endif
        {{--@if(Auth::user()->UserLevel===0)

        @endif--}}

@yield('content')
    </div>
    <footer style="margin-bottom:100px">
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p style="text-align: center;">Sitio Web Desarrollado Bajo la Filosofia del Software Libre<br>
                    Oficina de Tecnologia, Informatica y Telecomunicaciones del Gobierno del Distrito Capital
                </p>
            </div>
            </div>
    </footer>
</body>
</html>



{{--
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
--}}

{{--


<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Institución
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Jefes</a></li>
                        <li><a href="#">Tecnicos</a></li>
                        <li><a href="#">Oficinas</a></li>
                        <li><a href="#">Departamentos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tablas Básicas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Almacenes</a></li>
                        <li><a href="#">Marcas</a></li>
                        <li><a href="#">Modelos</a></li>
                        <li><a href="#">Proveedores</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Insumos
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Articulos</a></li>
                        <li><a href="#">Tipo de Articulos</a></li>
                    </ul>
                </li>
                <li><a href="#">Solicitudes</a></li>
                <li><a href="#">Despachos</a></li>
                <li><a href="#">Inventario</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estadísticas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Gráficos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Reportes</a></li>
                        <li><a href="#">Gráficos</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>

            </ul>
        </div>
    </div>
</nav>--}}
