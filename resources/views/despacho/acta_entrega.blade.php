<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
    <title>Untitled</title>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <meta name="generator" content="Web Page Maker (unregistered version)">
    <style type="text/css">
        /*----------Text Styles----------*/
        .ws6 {font-size: 8px;}
        .ws7 {font-size: 9.3px;}
        .ws8 {font-size: 11px;}
        .ws9 {font-size: 12px;}
        .ws10 {font-size: 13px;}
        .ws11 {font-size: 15px;}
        .ws12 {font-size: 16px;}
        .ws14 {font-size: 19px;}
        .ws16 {font-size: 21px;}
        .ws18 {font-size: 24px;}
        .ws20 {font-size: 27px;}
        .ws22 {font-size: 29px;}
        .ws24 {font-size: 32px;}
        .ws26 {font-size: 35px;}
        .ws28 {font-size: 37px;}
        .ws36 {font-size: 48px;}
        .ws48 {font-size: 64px;}
        .ws72 {font-size: 96px;}
        .wpmd {font-size: 13px;font-family: Arial,Helvetica,Sans-Serif;font-style: normal;font-weight: normal;}
        /*----------Para Styles----------*/
        DIV,UL,OL /* Left */
{
            margin-top: 0px;
            margin-bottom: 0px;
        }
    </style>

</head>
<body>
<div id="table1" style="position:absolute; overflow:hidden; left:25px; top:150px; width:700px; height:52px; z-index:0">
    <div class="wpmd">
        <div>
            <table bordercolorlight="#C0C0C0" bordercolordark="#808080" bgcolor="#FFFFFF" border="1">
                <tbody>
                <tr valign="top">
                    <td width="160"><div class="wpmd">
                            <div align="center" class="ws9"><b>Nombre Beneficiario</b></div>
                        </div>
                    </td>
                    <td width="152"><div class="wpmd">
                            <div align="center" class="ws9"><b>Telefono Beneficiario</b></div>
                        </div>
                    </td>
                    <td width="181"><div class="wpmd">
                            <div align="center" class="ws9"><b>Correo Beneficiario</b></div>
                        </div>
                    </td>
                </tr>
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

<div id="text1" style="position:absolute; overflow:hidden; left:301px; top:380px; width:114px; height:20px; z-index:1">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Pedido</div>
    </div>
</div>

<div id="table1" style="position:absolute; overflow:hidden; left:25px; top:400px; width:700px; height:52px; z-index:0">
    <div class="wpmd">
        <div>
            <table bordercolorlight="#C0C0C0" bordercolordark="#808080" bgcolor="#FFFFFF" border="1">
                <tbody>
                <tr valign="top">
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>N° Orden</b></div>
                        </div>
                    </td>
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Descripción Articulo</b></div>
                        </div>
                    </td>
                    <td width="160"><div class="wpmd">
                            <div align="center" class="ws9"><b>Cantidad</b></div>
                        </div>
                    </td>
                    <td width="120"><div class="wpmd">
                            <div align="center" class="ws9"><b>Medida</b></div>
                        </div>
                    </td>
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

<div id="text1" style="position:absolute; overflow:hidden; left:301px; top:235px; width:114px; height:20px; z-index:1">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Solicitud</div>
    </div>
</div>

<div id="text2" style="position:absolute;  overflow:hidden; left:290px; top:130px; width:134px; height:21px; z-index:2">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Beneficiario</div>
    </div>
</div>

<div id="text3" style="position:absolute; overflow:hidden;  top:500px; width:706px; height:224px; z-index:3">
    <div class="wpmd">

        <div align="justify"><font class="ws10">Los equipos tecnológicos
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
                competentes. Se hacen dos (02) ejemplares en Caracas a los ({{\Carbon\Carbon::now()->format('d')}}) dias
                del mes de <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                echo $meses[date('n')-1];
                ?>
                 de {{\Carbon\Carbon::now()->format('Y')}}.</font></div>
    </div>
</div>

<?php setlocale(LC_ALL,"es_ES");?>
{{--echo strftime("%A %d de %B del %Y");--}}

<div id="text4" style="position:absolute; overflow:hidden; left:0px; top:81px; width:177px; height:20px; z-index:4">
    <div class="wpmd">
        <div><font class="ws10">GDC-OTIT-AE-{{\Carbon\Carbon::now()->format('Ym')}}-<?php echo $despacho->id_orden ?></font></div>
    </div>
</div>

<div id="table3" style="position:absolute; overflow:hidden; left:0px; top:255px; width:700px; height:80px; z-index:5">
    <div class="wpmd">
        <div>
            <table bordercolorlight="#C0C0C0" bordercolordark="#808080" bgcolor="#FFFFFF" border="1">
                <tbody>
                @foreach($oficinas as $oficina)
                <tr valign="top">
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Almacen:</b></div>
                        </div>
                    </td>
                    <td width="504"><?php echo $oficina->descrip_almacen ?><br>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100" ><div class="wpmd">
                            <div align="center" class="ws9"><b>Oficina:</b></div>
                        </div>
                    </td>
                    <td width="504"><?php echo $oficina->descrip_oficina ?><br>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Departamento:</b></div>
                        </div>
                    </td>
                    <td width="504"><?php echo $oficina->descrip_departamento ?><br>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
foreach($jefe as $jefe)
{
?>
<div id="text5" style="position:absolute; overflow:hidden; left:20px; top:700px; width:291px; height:92px; z-index:6">
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
<div id="text6" style="position:absolute; overflow:hidden; left:430px; top:700px; width:249px; height:146px; z-index:7">
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

<div id="text7" style="position:absolute; overflow:hidden; left:285px; top:54px; width:128px; height:19px; z-index:8">
    <div class="wpmd">
        <div class="ws10"><b>ACTA DE ENTREGA</b></div>
    </div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:625px; top:99px; width:70px; height:19px; z-index:9">
    <div class="wpmd">
        <div><?php echo $despacho->fecha_orden ?></div>
    </div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:637px; top:81px; width:52px; height:17px; z-index:10">
    <div class="wpmd">
        <div><?php echo $despacho->hora_orden ?></div>
    </div>
</div>

<?php
foreach($tecnicos as $tec)
{
?>
<div id="text10" style="position:absolute; overflow:hidden; left:300px; top:800px; width:126px; height:58px; z-index:11">
    <div class="wpmd">
        <div align="center" style="font-size: 15px">Técnico:</div>
        <div align="center" style="font-size: 13px" c>CI <?php echo $tec->cedula?><br></div>
        <div align="center" style="font-size: 15px"><font class="ws10"><?php echo $tec->nombres_apellidos?></font></div>
    </div></div>
<?php
}
?>

<div id="text11" style="position:absolute; overflow:hidden; left:0px; top:950px; width:441px; height:56px; z-index:12">
    <div class="wpmd">
        <div align="justify" class="ws9" >Esquina de Torre a Principal, Casa de Gobierno del Distrito Capital.</div>
        <div align="justify" style="font-size: 13px">frente a la Plaza Bolivar, Parroquia Catedral, Caracas 1010.</div>
        <div align="justify" style="font-size: 13px"><em><b>Tlfs:(58-0212)863.26.55-862.15.44</b></em></div>
    </div></div>

</body>
</html>
