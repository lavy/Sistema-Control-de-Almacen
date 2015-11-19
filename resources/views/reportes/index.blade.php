<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Sistema de Control Almacen</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
        <script src="{{asset ('jquery/jquery.js')}}"></script>
        <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset ('moments/moment.js')}}"></script>
        <script src="{{asset('bootstrap/js/transition.js')}}"></script>

        <script src="{{asset ('bootstrap/js/collapse.js')}}"></script>
        <script src="{{asset ('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js')}}"></script>
        <link rel="shortcut icon" href="{{asset('images/estrella-trans.ico')}}">
    <body>
    <div class="container">
        <img src="{{asset('images/banner.png')}}" width="1150px" height="200px" class="img-responsive">
        <ul class="nav nav-tabs">
            <li role="presentation"><a href="{{URL::to('reportes/oficinas')}}">Solicitudes por Oficinas</a></li>
            <li role="presentation"><a href="{{URL::to('reportes/departamentos')}}">Solicitudes por Departamentos</a></li>
            <li role="presentation"><a href="{{URL::to('reportes/inventario')}}">Historico Inventario</a></li>
            <li role="presentation"><a href="{{URL::to('reportes/salidas')}}">Salidas del Almacen</a></li>
            <li role="presentation"><a href="{{URL::to('reportes/prestamos')}}">Solicitudes de Prestamos</a></li>
            <li role="presentation"><a href="{{URL::to('reportes/productos')}}">Demanda por consumo de productos</a></li>
        </ul>
        @yield('reporte')
    </div>
    <footer style="margin-bottom:100px">
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text text-mutter">Sitio Desarrollado Bajo Software Libre</p>
            </div>
        </div>
    </footer>
    </body>
    </html>