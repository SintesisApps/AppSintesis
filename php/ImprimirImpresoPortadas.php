<?php

/*echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/PUEBLA/","../ImpresoPortadas/Puebla/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/TLAXCALA/","../ImpresoPortadas/Tlaxcala/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/HIDALGO/","../ImpresoPortadas/Hidalgo/Thumbs/");

echo CrearImagendeImpresoAPP("../../portadas/SEMANARIOS/OAXACA/","../ImpresoPortadas/Oaxaca/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SEMANARIOS/Tuxtla/","../ImpresoPortadas/Chiapas/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SEMANARIOS/Yucatan/","../ImpresoPortadas/Yucatan/Thumbs/");

echo CrearImagendeImpresoAPP("../../portadas/SECCION B/","../ImpresoPortadas/Nacional/Thumbs/");





function CrearImagendeImpresoAPP($path,$RutaImagen){

$directorio=dir($path);

while ($archivo = $directorio->read()):
 set_time_limit(0);
	if($archivo!="." OR $archivo!=".." ):
	
		if (strtolower(substr($archivo, -3) == "pdf")):
			$archivofecha=substr($archivo,0,8);
			
			$ImagenPortada=strtolower(substr($archivo, -6,2));
			if($archivofecha==date("dmY") && $ImagenPortada==01):
				
					$pdf=$archivo;
					
					  $file_extension = explode(".", $pdf[0]);
					  $file_extension = array_pop($file_extension);
					  $archivo=str_replace(".pdf","",$archivo);
					  
					   //if(!file_exists($RutaImagen.$archivo.".jpg")):
							  $img = new imagick($path.$pdf."[0]");
							  $img->setCompression(Imagick::COMPRESSION_JPEG);
							  $img->setCompressionQuality(70);
							  $img->setImageFormat("jpg");
							  $img->thumbnailImage(340, 0);
							  $img->writeImages($RutaImagen."portada.jpg", true);
						//endif;
						
						//$html.="&".$archivo;
					
			endif;
		endif;
	endif;
endwhile;
$directorio->close();

return $html;
}



function CrearImagendeSemanariosAPP($path,$RutaImagen){

$directorio=dir($path);
while ($archivo = $directorio->read()):
set_time_limit(0);
	if($archivo!="." OR $archivo!=".."):
	
		if (strtolower(substr($archivo, -3) == "pdf")):
			$archivofecha=substr($archivo,0,8);
			$NombreImagen=strtolower(substr($archivo, -6,2));
			
			if($archivofecha==date("dmY") && $NombreImagen==01):
					$pdf=$archivo;
					
					  $file_extension = explode(".", $pdf[0]);
					  $file_extension = array_pop($file_extension);
					  $archivo=str_replace(".pdf","",$archivo);
					   if(!file_exists($RutaImagen.$archivo.".jpg")):
							  
							  $img = new imagick($path.$pdf."[0]");
							  $img->setCompression(Imagick::COMPRESSION_JPEG);
							  $img->setCompressionQuality(70);
							  $img->setImageFormat("jpg");
							  $img->thumbnailImage(340, 0);
							  $img->writeImages($RutaImagen.$archivo.".jpg", true);
						endif;
						
						$html.="&".$archivo;
				
					
			endif;
		endif;
	endif;
endwhile;


$directorio->close();

return $html;
}*/
?>

<?php

echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/PUEBLA/","../ImpresoPortadas/Puebla/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/TLAXCALA/","../ImpresoPortadas/Tlaxcala/Thumbs/");
echo CrearImagendeImpresoAPP("../../portadas/SECCIÓN A/HIDALGO/","../ImpresoPortadas/Hidalgo/Thumbs/");

echo CrearImagendeSemanariosAPP("../../portadas/SEMANARIOS/OAXACA/","../ImpresoPortadas/Oaxaca/Thumbs/");
echo CrearImagendeSemanariosAPP("../../portadas/SEMANARIOS/Tuxtla/","../ImpresoPortadas/Chiapas/Thumbs/");
echo CrearImagendeSemanariosAPP("../../portadas/SEMANARIOS/Yucatan/","../ImpresoPortadas/Yucatan/Thumbs/");

echo CrearImagendeImpresoAPP("../../portadas/SECCION B/","../ImpresoPortadas/Nacional/Thumbs/");





function CrearImagendeImpresoAPP($path,$RutaImagen){
/*
//Eliminar Imagenes pasadas
$directorio=dir($RutaImagen);
while ($archivo = $directorio->read()):
	if($archivo!="." OR $archivo!=".."):
		if (strtolower(substr($archivo, -3) == "jpg") && substr($archivo,0,8)!=date("dmY") && file_exists($RutaImagen.$archivo)):
			unlink($RutaImagen.$archivo);
		endif;
	endif;

endwhile;
$directorio->close();
//Eliminar Imagenes pasadas*/

$directorio=dir($path);

while ($archivo = $directorio->read()):
 set_time_limit(0);
	if($archivo!="." OR $archivo!=".." ):
	
		if (strtolower(substr($archivo, -3) == "pdf")):
			$archivofecha=substr($archivo,0,8);
			
			$ImagenPortada=strtolower(substr($archivo, -6,2));
			if($archivofecha==date("dmY") && $ImagenPortada==01):
				
					$pdf=$archivo;
					
					  $file_extension = explode(".", $pdf[0]);
					  $file_extension = array_pop($file_extension);
					  $archivo=str_replace(".pdf","",$archivo);
					  
					   //if(!file_exists($RutaImagen.$archivo.".jpg")):
							  $img = new imagick($path.$pdf."[0]");
							  $img->setCompression(Imagick::COMPRESSION_JPEG);
							  $img->setCompressionQuality(70);
							  $img->setImageFormat("jpg");
							  $img->thumbnailImage(340, 0);
							  $img->writeImages($RutaImagen."portada.jpg", true);
						//endif;
						
						$html.="&portada";
					
			endif;
		endif;
	endif;
endwhile;
$directorio->close();

return $html;
}



function CrearImagendeSemanariosAPP($path,$RutaImagen){

$directorio=dir($path);
while ($archivo = $directorio->read()):
set_time_limit(0);
	if($archivo!="." OR $archivo!=".."):
	
		if (strtolower(substr($archivo, -3) == "pdf")):
			$NombreImagen=strtolower(substr($archivo, -6,2));
			
			
			if($NombreImagen==01 && substr($archivo, 4,4)==date("Y") && substr($archivo, 2,2)==date("m")):
					
					$archivo=str_replace(".pdf","",$archivo);
					$archivofecha[]=$archivo;		
					$pdf=$archivo;
					
					  $file_extension = explode(".", $pdf[0]);
					  $file_extension = array_pop($file_extension);
					  
					   if(!file_exists($RutaImagen.$archivo.".jpg")):
							  $img = new imagick($path.$pdf.".pdf");
							  $img->setCompression(Imagick::COMPRESSION_JPEG);
							  $img->setCompressionQuality(70);
							  $img->setImageFormat("jpg");
							  $img->thumbnailImage(300, 0);
							  $img->writeImages($RutaImagen."portada.jpg", true);
							   
						endif;
						
						$html.="&portada";
				
					
			endif;
		endif;
	endif;
endwhile;

$directorio->close();

return $html;
}



?>