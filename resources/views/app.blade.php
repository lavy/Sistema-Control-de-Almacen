<!DOCTYPE html>
<html lang="es">
<head>
    <title>Sistema Control de Almacen - @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <script src="{{asset ('jquery/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('moments/moment.js')}}"></script>
    <script src="{{asset ('moments/locale/es.js')}}"></script>
    <script src="{{asset('bootstrap/js/transition.js')}}"></script>
    <script src="{{asset ('bootstrap/js/collapse.js')}}"></script>
    <script src="{{asset ('datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <link rel="shortcut icon" href="{{asset('images/estrella-trans.ico')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <script src="{{asset('bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('bootstrap-select/dist/js/i18n/defaults-es_CL.min.js')}}"></script>
    <link href="{{asset ('select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
</head>
<body>

<div class="container">
        <img src="{{asset('images/banner.png')}}" width="1150px" height="200px" class="img-responsive" usemap="#map">

        <map name="map">
            <area shape="rect" coords="715,50,740,72" href="http://twitter.com/prensacapital" title="Twitter"/>
            <area shape="rect" coords="745,50,770,74" href="http://www.facebook.com/gobiernodel.distritocapital" title="Facebook" />
            <area shape="rect" coords="775,49,798,75" href="http://www.youtube.com/channel/UCkSbdOePnjXDHbWJt0rA_mw" title="Youtube"/>
            <area shape="rect" coords="802,49,828,75" href="http://instagram.com/prensacapital" title="Instagram"/>
            <area shape="rect" coords="980,30,945,85" href="http://gdc.gob.ve" title="GDC WEB"/>
        </map>

@if(Auth::check() && Auth::user()->UserLevel !=1)
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <?php
            $nombre=Auth::user()->nombre;
            ?>
            <a class="navbar-brand">{{strtoupper($nombre[0]).'   '.Auth::user()->apellido}}</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('menu')}}">Inicio</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Institución
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('jefes')}}"><i class="fa fa-gavel"></i>Supervisores</a></li>
                        <li><a href="{{URL::to('tecnico')}}"><i class="fa fa-life-ring"></i>Tecnicos</a></li>
                        <li><a href="{{URL::to('oficina')}}"><i class="fa fa-building"></i>Oficinas</a></li>
                        <li><a href="{{URL::to('departamento')}}"><i class="fa fa-university"></i>Departamentos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tablas Básicas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('almacen')}}"><i class="fa fa-industry"></i>Almacenes</a></li>
                        <li><a href="{{URL::to('marca')}}"><i class="fa fa-registered"></i>Marcas</a></li>
                        <li><a href="{{URL::to('modelos')}}"><i class="fa fa-registered"></i>Modelos</a></li>
                        <li><a href="{{URL::to('proveedor')}}"><i class="fa fa-bus"></i>Proveedores</a></li>
                        {{--<li><a href="{{URL::to('categoria')}}"><i class="fa fa-bars"></i>Categorias</a></li>--}}
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Insumos
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('renglones')}}"><i class="fa fa-cubes"></i>Articulos</a></li>
                        <li><a href="{{URL::to('tiporenglon')}}"><i class="fa fa-cube"></i>Tipo de Articulos</a></li>
                    </ul>
                </li>
                <li><a href="{{URL::to('solicitudes')}}">Solicitudes</a></li>
                <li><a href="{{URL::to('despacho')}}">Despachos</a></li>
                <li><a href="{{URL::to('inventario')}}">Inventario</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estadísticas
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('reportes')}}"><i class="fa fa-fax"></i>Reportes</a></li>
                        <li><a href="{{URL::to('estadisticas')}}"><i class="fa fa-pie-chart"></i>Gráficos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('usuarios')}}"><i class="fa fa-users"></i>Usuarios</a></li>
                        <li><a href="{{URL::to('niveles')}}"><i class="fa fa-align-center"></i>Niveles</a></li>
                        {{--<li><a href="{{URL::to('permisos')}}">Permisos</a></li>--}}
                    </ul>
                </li>
                <li><a href="{{URL::to('auth/logout')}}"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>

            </ul>
        </div>
    </div>
</nav>

@elseif(Auth::check() && Auth::user()->UserLevel ==1)
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">{{Auth::user()->nombre.'   '.Auth::user()->apellido}}</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav">
                            <li ><a href="{{URL::to('menu')}}">Inicio</a></li>

                            <li><a href="{{URL::to('solicitudes')}}">Solicitudes</a></li>
                            <li><a href="{{URL::to('despacho')}}">Despachos</a></li>

                            <li><a href="{{URL::to('auth/logout')}}"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
@endif

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

@stack('scripts')
</body>
</html>

