<?php
/*Galeria de imagenes*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html='';

$select_app="SELECT * FROM galeria_imagenes_contenido";
$r_app=mysql_query($select_app,$conexion);

while($imagen=mysql_fetch_array($r_app))
{
	//verificamos si el archivo existe
	$ruta="http://166.78.193.53/images/imagenes-galeria/";
	if(file_exists("../../images/imagenes-galeria/".$imagen['imagen'].""))
	{
		//$html.='<li><a href="http://166.78.193.53/images/imagenes-galeria/'.$imagen['imagen'].'"><img src="http://166.78.193.53/images/imagenes-galeria/'.$imagen['imagen'].'" alt="" width="150" height="150" /></a></li>';
		$html.='<li><a href="http://166.78.193.53/images/imagenes-galeria/globo2.jpg"><img src="http://166.78.193.53/images/imagenes-galeria/globo2.jpg" width="150" height="150" alt="" /></a></li>';
		
	}
		
	
	
}

echo $html;


?>