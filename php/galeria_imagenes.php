<?php
/*Galeria de imagenes*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html='<ul id="Gallery" class="gallery">';

$select_app="SELECT * FROM galerias_imagenes_contenido";
$r_app=mysql_query($select_app,$conexion);

while($imagen=mysql_fetch_array($array_app))
{
	//verificamos si el archivo existe
	$ruta=$url_dominio_.'/images/imagenes-galeria/'.$imagen['imagen'];
	if (file_exists($ruta))
	{
		$html.='<li><a href="#"><img src="'.$ruta.'" alt="" /></a></li>';
	}
	
}

$html.="</ul>";

echo $html;


?>