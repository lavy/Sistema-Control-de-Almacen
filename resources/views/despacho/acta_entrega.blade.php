<!DOCTYPE html>
<html lang="es">
<head>
    <title>Acta de Entrega</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/planilla.css">
</head>
<body>

<?php setlocale(LC_ALL,"es_ES");?>
<div style="margin-left: 0">
    <img src="images/gdc.png" width="160px" height="70px" >
</div>

<div id="text7" style="position:absolute; overflow:hidden; left:285px; top:54px; width:128px; height:19px; z-index:8">
    <div class="wpmd">
        <div class="ws10"><b>ACTA DE ENTREGA</b></div>
    </div>
</div>

<div id="text2" style="position:absolute;  overflow:hidden; left:290px; top:140px; width:134px; height:21px; z-index:2">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Beneficiario</div>
    </div>
</div>

<div id="beneficiario">
    <div class="wpmd">
        <div>
            <table>
                <tr valign="top">
                    <th width="160">
                        <div class="wpmd">
                            <b>Nombre Beneficiario</b>
                        </div>
                    </th>
                    <th width="152">
                        <div class="wpmd">
                            <b>Telefono Beneficiario</b>
                        </div>
                    </th>
                    <th width="181">
                        <div class="wpmd">
                            <b>Correo Beneficiario</b>
                        </div>
                    </th>
                </tr>
                <tbody>
                <tr valign="top">
                    <?php
                    foreach($beneficiario as $beneficiarios)
                    {
                    ?>

                    <td width="160" class="ws9" style="text-align: center"><?php echo $beneficiarios->beneficiario?></td>
                    <td width="152" class="ws9" style="text-align: center"><?php echo $beneficiarios->telef_beneficiario?></td>
                    <td width="181" class="ws9" style="text-align: center"><a href="mailto:<?php echo $beneficiarios->email?>"><?php echo $beneficiarios->email?></td>
                    <?php
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="text1" style="position:absolute; overflow:hidden; left:301px; top:265px; width:114px; height:20px; z-index:1">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Solicitud</div>
    </div>
</div>

<div id="table3" style="position:absolute; overflow:hidden; left:0px; top:285px;  height:80px; z-index:0">
    <div class="wpmd">
        <div>
            <table style="justify-content: inherit;text-align: justify;border-collapse: collapse;width: 99%" colspan="2">
                <tbody>
                @foreach($oficinas as $oficina)
                    <tr valign="top">
                        <td width="100"><div class="wpmd" style="background-color:#e1e1e8">
                                <div align="center" class="ws9"><b>Almacen:</b></div>
                            </div>
                        </td>
                        <td width="504"><?php echo $oficina->descrip_almacen ?></td>
                    </tr>
                    <tr valign="top">
                        <td width="100" ><div class="wpmd" style="background-color:#e1e1e8">
                                <div align="center" class="ws9"><b>Oficina:</b></div>
                            </div>
                        </td>
                        <td width="504"><?php echo $oficina->descrip_oficina ?></td>
                    </tr>
                    <tr valign="top">
                        <td width="100"><div class="wpmd" style="background-color:#e1e1e8">
                                <div align="center" class="ws9"><b>Departamento:</b></div>
                            </div>
                        </td>
                        <td width="504"><?php echo $oficina->descrip_departamento ?></td>
                    </tr>
                @endforeach

                <?php
                foreach($tipo as $t)
                {
                ?>
                <tr valign="top">
                    <td width="100"><div class="wpmd" style="background-color:#e1e1e8">
                            <div align="center" class="ws9"><b>Tipo Solicitud:</b></div>
                        </div>
                    </td>
                    <td width="20"><?php echo $t->tipo_solicitud?></td>

                @if($t->desde !=NULL && $t->hasta !=NULL)
                    <td width="20">Desde:<?php echo date('d-m-Y',strtotime($t->desde)); ?></td>
                    <td width="20">Hasta:<?php echo date('d-m-Y',strtotime($t->hasta)); ?></td>
                @endif
                <?php
                }
                ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="text1" style="position:absolute; overflow:hidden; left:301px; top:415px; width:114px; height:20px; z-index:1">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Pedido</div>
    </div>
</div>

<div id="table2" style="position:absolute; overflow:hidden; left:15px; top:435px; width:700px; height:52px; z-index:1">
    <div class="wpmd">
        <div>
            <table>
                <tbody>
                <tr valign="top">
                    <th width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>N° Orden</b></div>
                        </div>
                    </th>
                    <th width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Descripción Articulo</b></div>
                        </div>
                    </th>
                    <th width="160"><div class="wpmd">
                            <div align="center" class="ws9"><b>Cantidad</b></div>
                        </div>
                    </th>
                    <th width="120"><div class="wpmd">
                            <div align="center" class="ws9"><b>Medida</b></div>
                        </div>
                    </th>
                </tr>
                <tr valign="top">
                    <?php
                    foreach($tabla as $tablas)
                    {
                    ?>

                    <td width="100" class="ws9" style="text-align: center"><?php echo $tablas->id_orden?></td>
                    <td width="100" class="ws9" style="text-align: center"><?php echo $tablas->descrip_renglon?></td>
                    <td width="160" class="ws9" style="text-align: center"><?php echo $tablas->cantidad?></td>
                    <td width="120" class="ws9" style="text-align: center"><?php echo $tablas->unidad_medida?></td>
                    <?php
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="normas">
    <div class="wpmd">

             <p>Los equipos tecnológicos
                en esta acta señalados, se entregan bajo las siguientes condiciones: 1)
                El Equipo(s) ya identificado(s) es propiedad del Gobierno del Distrito
                Capital y se entrega para uso exclusivo relacionado con las actividades
                inherentes al desempeño laboral; 2) El Equipo(s) se encuentra en
                perfecto estado y debe mantenerse en iguales condiciones de funcionamiento, limpieza e higiene;
                3) La pérdida o extravío del Equipo(s) o cualquiera de sus partes aqui
                entregadas, será responsabilidad del funcionario quien está obligado a
                pagar el costo del equipo o las partes extraviadas, según sea el caso.
                De conformidad con lo establecido en el numeral 7 del artículo 33 de la Ley del Estatuto de la
                Función Pública, sin perjuicio de la aplicación de lo dispuesto en los articulos: 52, 53
                y 54 de la Ley Contra la Corrupción; numeral 2 del artículo 83 y
                numeral 8 del artículo 86 de la Ley del Estatuto de la Función Pública.
                Así mismo se obliga a presentar de inmediato, la denuncia, ante los cuerpos judiciales
                competentes. Se hacen dos (02) jemplares en Caracas a los ({{\Carbon\Carbon::now()->format('d')}}) dias
                del mes de <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                echo $meses[date('n')-1];
                ?>
                 de {{\Carbon\Carbon::now()->format('Y')}}.</p>
    </div>
</div>



<div id="text4" style="position:absolute; overflow:hidden; left:0px; top:81px; width:177px; height:20px; z-index:4">
    <div class="wpmd">
        <div><font class="ws10">GDC-OTIT-AE-{{\Carbon\Carbon::now()->format('Ym')}}-<?php echo $despacho->id_orden ?></font></div>
    </div>
</div>

<?php
foreach($jefe as $jefe)
{
?>
<div id="text5" style="position:absolute; overflow:hidden; left:20px; top:730px; width:291px; height:92px; z-index:6">
    <div class="wpmd">
        <div align="center"><font class="ws11">Entrega:</font></div>
        <div align="center"><font class="ws10"><?php echo $jefe->nombre ?><br></font></div>
        <div align="center"><font class="ws10">CI <?php echo $jefe->cedula?></font></div>
        <div align="center"><font class="ws10">Jefe De La <?php echo $jefe->descrip_oficina?></font></div>
        <div align="center"><font class="ws11"></font></div>
    </div>
</div>
<?php
}
?>


<?php
foreach($usuario as $usuario)
{
?>
<div id="text6" style="position:absolute; overflow:hidden; left:430px; top:730px; width:249px; height:146px; z-index:7">
    <div class="wpmd">
        <div align="center" style="font-size: 15px">Recibe:</div>
        <div align="center" style="font-size: 13px"><?php echo $usuario->nombre.'  '.$usuario->apellido?><br></div>
        <div align="center" style="font-size: 13px">CI <?php echo $usuario->ci_usua ?></div>
        <div align="center" style="font-size: 13px"><?php echo $usuario->cargo ?></div>
        <div align="center" style="font-size: 13px"></div>
    </div>
</div>
<?php
}
?>


<?php
foreach($tecnicos as $tec)
{
?>
<div id="text10" style="position:absolute; overflow:hidden; left:300px; top:835px; width:126px; height:58px; z-index:11">
    <div class="wpmd">
        <div align="center" style="font-size: 15px">Técnico:</div>
        <div align="center" style="font-size: 13px">CI <?php echo $tec->cedula?><br></div>
        <div align="center" style="font-size: 15px"><font class="ws10"><?php echo $tec->nombres_apellidos?></font></div>
    </div></div>
<?php
}
?>


<div id="text8" style="position:absolute; overflow:hidden; left:625px; top:99px; width:70px; height:19px; z-index:9">
    <div class="wpmd">
        <div><?php echo $despacho->fecha_orden ?></div>
    </div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:637px; top:81px; width:52px; height:17px; z-index:10">
    <div class="wpmd">
        <div><?php echo $despacho->hora_orden ?></div>
    </div>
</div>


<footer>
    <div class="wpmd">
        <div align="justify" class="ws9" >Esquina de Torre a Principal, Casa de Gobierno del Distrito Capital.</div>
        <div align="justify" style="font-size: 13px">frente a la Plaza Bolivar, Parroquia Catedral, Caracas 1010.</div>
        <div align="justify" style="font-size: 13px"><em><b>Tlfs:(58-0212)863.26.55-862.15.44</b></em></div>
    </div>
</footer>

</body>
</html>
