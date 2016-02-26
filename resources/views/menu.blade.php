@extends('app')
@section('title', 'Menú Principal')
@section('content')

    <script type="text/javascript">
        $('.modalLoad').click(function() {
            $.get("prueba",function(data) {
                $('#myModal').modal('show') // evento que lanza la ventana
                $('#modalContent').val('');
                $('#bodys').html(data);
                return false;
            })
        });
    </script>

    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>


    <div class="container" style="margin-top: 30px;">
        <br>


            {{--<a href='modal/'.$renglon->id_renglon id='$renglon->id_renglon' data-toggle='modal'   class='modalLoad btn btn-primary btn-xs' data-target='#myModal'>Detalles</a>;--}}
            {{--{!! Html::link('prueba', '', array('class'=>'modalLoad glyphicon glyphicon-eye-open btn btn-primary btn-xs','data-toggle'=>'modal','data-target'=>'#myModal','id'=>'')) !!}--}}

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Articulos Prestados Proximos A Entrega</h4>
                        </div>
                        <div class="modal-body" id="bodys">



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="images/gdc.jpg" alt="Gobierno del Distrito Capital" width="460" height="345">
                    <div class="carousel-caption">
                        <h3>Gobierno del Distrito Capital</h3>
                        <p></p>
                    </div>
                </div>

                <div class="item">
                    <img src="images/almacen.jpeg" alt="Almacen del Gobierno del Distrito Capital" width="460" height="345">
                    <div class="carousel-caption">
                        <h3>Almacen</h3>
                        <p>Mediante la Tecnología se Hace el Control del Inventario del Almacen.</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection