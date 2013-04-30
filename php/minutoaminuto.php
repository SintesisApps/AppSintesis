<?php
/*Minuto a Minuto*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html="";
$select_app="SELECT * FROM app_articulos WHERE  estatus='1' ORDER BY fecha DESC limit 4";
$r_app=mysql_query($select_app,$conexion);

while($f_app=mysql_fetch_assoc($r_app)):
	$id_nota_app=$f_app['id'];
	$id_articulo_app=$f_app['id_articulo'];
	$plaza_app=$f_app['plaza'];
	
	$select_ar="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app." WHERE id=".$id_articulo_app."";
	
	$r_ar=mysql_query($select_ar,$conexion);
	while($f_ar=mysql_fetch_assoc($r_ar)):
		$Titulo_nota=$f_ar['titulo'];
		$Id_SeccionS=$f_ar['id_seccion'];
		$Autor=$f_ar['autor'];
		$Nota=$f_ar['nota'];
		$Fecha_Creacion=$f_ar['fecha_creacion'];
		
		$Titulo_nota=utf8_encode($Titulo_nota);
		$Autor=utf8_encode($Autor);
		$Nota=utf8_encode($Nota);
		
		$Titulo_nota=substr($Titulo_nota,0,100)."...";
		$imagen=extraer_imagen($Nota);
		$imagen=utf8_decode($imagen);
	endwhile;
	/*
	<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
	*/
	$html.='
		<div style="width:87%;margin-left:10px;"><a href="#nota" onclick="LeerNota('.$id_nota_app.')">
          <div style="display:inline-block; color: rgb(0,85,143);"> 10:49 PM </div>
          <div style="display:inline-block; color: rgb(151,151,151);"> / '.$Titulo_nota.'</div></a>
          <hr>
        </div>
	';
	
	

endwhile;

echo $html;


?>