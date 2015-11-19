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

                    <td width="160" class="ws9"><?php echo $beneficiarios->beneficiario?></td>
                    <td width="152" class="ws9"><?php echo $beneficiarios->telef_beneficiario?></td>
                    <td width="181" class="ws9"><a href="mailto:<?php echo $beneficiarios->email?>"><?php echo $beneficiarios->email?></td>
                    <?php
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div></div>

<div id="text1" style="position:absolute; overflow:hidden; left:301px; top:205px; width:114px; height:20px; z-index:1">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Solicitud</div>
    </div>
</div>

<div id="text2" style="position:absolute;  overflow:hidden; left:290px; top:130px; width:134px; height:21px; z-index:2">
    <div class="wpmd">
        <div style="font-size: 16px">Datos Beneficiario</div>
    </div>
</div>

<div id="text3" style="position:absolute; overflow:hidden;  top:311px; width:706px; height:224px; z-index:3">
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
                competentes. Se hacen dos (02) ejemplares en Caracas a los Seis(06) dias
                del mes de Febrero de 2015.</font></div>
    </div>
</div>

<div id="text4" style="position:absolute; overflow:hidden; left:0px; top:81px; width:177px; height:20px; z-index:4">
    <div class="wpmd">
        <div><font class="ws10">GDC-OTIT-AE-201511-54</font></div>
    </div>
</div>

<div id="table3" style="position:absolute; overflow:hidden; left:0px; top:224px; width:600px; height:80px; z-index:5">
    <div class="wpmd">
        <div>
            <table bordercolorlight="#C0C0C0" bordercolordark="#808080" bgcolor="#FFFFFF" border="1">
                <tbody><tr valign="top">
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Almacen:</b></div>
                        </div>
                    </td>
                    <td width="504"><br>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100" ><div class="wpmd">
                            <div align="center" class="ws9"><b>Oficina:</b></div>
                        </div>
                    </td>
                    <td width="504"><br>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="100"><div class="wpmd">
                            <div align="center" class="ws9"><b>Departamento:</b></div>
                        </div>
                    </td>
                    <td width="504"><br>
                    </td>
                </tr>
                </tbody></table>
        </div>
    </div>
</div>


<div id="text5" style="position:absolute; overflow:hidden; left:20px; top:550px; width:291px; height:92px; z-index:6">
    <div class="wpmd">
        <div align="center"><font class="ws11">Entrega:</font></div>
        <div align="center"><font class="ws11"><br></font></div>
        <div align="center"><font class="ws11">Sheiffield Mejicano</font></div>
        <div align="center"><font class="ws11">Jefe de la Oficina de Tecnológia, Informática</font></div>
        <div align="center"><font class="ws11"> y Telecomunicaciones</font></div>
    </div>
</div>

<div id="text6" style="position:absolute; overflow:hidden; left:430px; top:550px; width:249px; height:146px; z-index:7">
    <div class="wpmd">
        <div align="center" style="font-size: 15px">Recibe:</div>
        <div align="center" style="font-size: 15px"><br></div>
        <div align="center" style="font-size: 15px">Wakefield Jose Gregorio Cabrera</div>
        <div align="center" style="font-size: 15px">Jefe de la Unidad de Tecnológia de la Información y Comunicaciones.</div>
        <div align="center" style="font-size: 15px">Protección Civil.</div>
    </div>
</div>

<div id="text7" style="position:absolute; overflow:hidden; left:285px; top:54px; width:128px; height:19px; z-index:8">
    <div class="wpmd">
        <div class="ws10"><b>ACTA DE ENTREGA</b></div>
    </div></div>

<div id="text8" style="position:absolute; overflow:hidden; left:625px; top:99px; width:70px; height:19px; z-index:9">
    <div class="wpmd">
        <div>2015-12-11</div>
    </div></div>

<div id="text9" style="position:absolute; overflow:hidden; left:637px; top:81px; width:52px; height:17px; z-index:10">
    <div class="wpmd">
        <div>14:23:25</div>
    </div>
</div>

<div id="text10" style="position:absolute; overflow:hidden; left:300px; top:652px; width:126px; height:58px; z-index:11">
    <div class="wpmd">
        <div align="center" style="font-size: 15px">Técnico:</div>
        <div align="center" style="font-size: 15px"><br></div>
        <div align="center" style="font-size: 15px"><font class="ws11">Oswaldo Morgado</font></div>
    </div></div>

<div id="text11" style="position:absolute; overflow:hidden; left:0px; top:800px; width:441px; height:56px; z-index:12">
    <div class="wpmd">
        <div align="justify" style="font-size: 15px">Esquina de Torre a Principal, Casa de Gobierno del Distrito Capital.</div>
        <div align="justify" style="font-size: 15px">frente a la Plaza Bolivar, Parroquia Catedral, Caracas 1010.</div>
        <div align="justify" style="font-size: 15px"><b>Tlfs:(58-0212)863.26.55-862.15.44</b></div>
    </div></div>

</body>
</html>
