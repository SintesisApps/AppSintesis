<?php
/*Galeria de imagenes*/
include("../../includes/conexion.php");
include('../../funciones.php');
/*
$html='<ul id="Gallery" class="gallery">';

$select_app="SELECT * FROM galerias_imagenes_contenido";
$r_app=mysql_query($select_app,$conexion);

while($imagen=mysql_fetch_array($array_app))
{
	//verificamos si el archivo existe
	$ruta=$url_dominio_.'/images/imagenes-galeria/'.$imagen['imagen'];
	if (file_exists($ruta))
	{
		$html.='<li><a href="#"><img src="'.$ruta.'" alt="" width="150" height="150" /></a></li>';
	}
	
}

$html.="</ul>";
*/
$html='<ul id="Gallery" class="gallery">
    <li><a href="images/full/001.jpg"><img src="images/thumb/001.jpg" alt="" /></a></li>
    <li><a href="images/full/002.jpg"><img src="images/thumb/002.jpg" alt="" /></a></li>
    <li><a href="images/full/003.jpg"><img src="images/thumb/003.jpg" alt="" /></a></li>
    <li><a href="images/full/004.jpg"><img src="images/thumb/004.jpg" alt="" /></a></li>
    <li><a href="images/full/005.jpg"><img src="images/thumb/005.jpg" alt="" /></a></li>
    <li><a href="images/full/006.jpg"><img src="images/thumb/006.jpg" alt="" /></a></li>
    <li><a href="images/full/007.jpg"><img src="images/thumb/007.jpg" alt="" /></a></li>
    <li><a href="images/full/008.jpg"><img src="images/thumb/008.jpg" alt="" /></a></li>
    <li><a href="images/full/009.jpg"><img src="images/thumb/009.jpg" alt="" /></a></li>
    <li><a href="images/full/010.jpg"><img src="images/thumb/010.jpg" alt="" /></a></li>
    <li><a href="images/full/011.jpg"><img src="images/thumb/011.jpg" alt="" /></a></li>
    <li><a href="images/full/012.jpg"><img src="images/thumb/012.jpg" alt="" /></a></li>
    <li><a href="images/full/013.jpg"><img src="images/thumb/013.jpg" alt="" /></a></li>
    <li><a href="images/full/014.jpg"><img src="images/thumb/014.jpg" alt="" /></a></li>
    <li><a href="images/full/015.jpg"><img src="images/thumb/015.jpg" alt="" /></a></li>
    <li><a href="images/full/016.jpg"><img src="images/thumb/016.jpg" alt="" /></a></li>
    <li><a href="images/full/017.jpg"><img src="images/thumb/017.jpg" alt="" /></a></li>
    <li><a href="images/full/018.jpg"><img src="images/thumb/018.jpg" alt="" /></a></li>
  </ul>';
echo $html;


?>