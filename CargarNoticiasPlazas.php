<?php

include("../../includes/conexion.php");
include('../../funciones.php'); 

$plaza=$_POST["plaza"];
$arr1 = array();
$i="0";
$seccion_slidePrincipal='<div style="float:left;margin-right:-30000px;">
        				<div class="SubContenedorPrincipalSeccion">';


//$select_app="SELECT * FROM app_articulos WHERE plaza='".$plaza."' AND estatus='1' and posicion='Slide-Principal' ORDER BY id DESC  ";

$select_app="SELECT * FROM app_articulos WHERE posicion='Slide-Principal-Interior' and estatus='1' and plaza='".$plaza."'
							UNION
						SELECT * FROM app_publicidad where posicion='principal-interior' and estatus='1' and plaza='".$plaza."' ORDER BY orden DESC
						";



	$r_app=mysql_query($select_app,$conexion);
	while($f_app=mysql_fetch_assoc($r_app)):
	
		$id_nota_app=$f_app['id'];
		$id_articulo_app=$f_app['id_articulo'];
		$plaza_app=$f_app['plaza'];
		
		if($id_articulo_app==0)//publi
		{
			
			$seccion_slidePrincipal.='<div class="ContenidoPrincipalSeccion">
                <div class="PublicidadPrincipalSeccion"> <img src="'.$url_dominio_.'/images/imagenes-publicidad/'.$f_app['ruta'].'" > </div>
              </div>';
			
		}
		else
		{
			$select_ar="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app." WHERE id='".$id_articulo_app."'";
	$r_ar=mysql_query($select_ar,$conexion);
	while($f_ar=mysql_fetch_assoc($r_ar)):
		$TituloPlaza=$f_ar['titulo'];
		$SumarioPlaza=$f_ar['sumario'];
		$Id_SeccionPlaza=$f_ar['id_seccion'];
		$AutorPlaza=$f_ar['autor'];
		$NotaPlaza=$f_ar['nota'];
		$Fecha_CreacionPlaza=$f_ar['fecha_creacion'];
		
		$TituloPlaza=utf8_encode($TituloPlaza);
		$SumarioPlaza=utf8_encode($SumarioPlaza);
		$AutorPlaza=utf8_encode($AutorPlaza);
		$NotaPlaza=utf8_encode($NotaPlaza);
		
		$imagenPlaza=extraer_imagen($NotaPlaza);
		$imagenPlaza=utf8_decode($imagenPlaza);
		
		
		$select_pza="SELECT plaza FROM plazas WHERE seudonimo='".$plaza_app."'";
	$r_pza=mysql_query($select_pza,$conexion);
	while($f_pza=mysql_fetch_assoc($r_pza)):
		$PlazaNota=$f_pza['plaza'];
		$PlazaNota=utf8_encode($PlazaNota);
	endwhile;
	
	$select_se="SELECT seccion FROM secciones WHERE id='".$Id_Seccion."'";
	$r_se=mysql_query($select_se,$conexion);
	while($f_se=mysql_fetch_assoc($r_se)):
		$SeccionPlaza=$f_se['seccion'];
		$SeccionPlaza=utf8_encode($SeccionPlaza);
	endwhile;
		
		$seccion_slidePrincipal.='
		<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
              <div class="ContenidoPrincipalSeccion">
                <div class="ImagenPrincipalSeccion"><img src="'.$url_dominio_.'/images/imagenes-articulos/'.$imagenPlaza.'" ></div>
                <div class="TextoPrincipalSeccion">
                  <div class="TituloPrincipalSeccion">'.$TituloPlaza.'</div>
                  <div class="SeccionPrincipalSeccion">'.$SeccionPlaza.' </div>
                  <div class="AutorPrincipalSeccion"> '.$AutorPlaza.' </div>
                  <div class="FechaPrincipalSeccion"> '.$Fecha_CreacionPlaza.' </div>
                </div>
              </div>
              </a>
			  
			 
		';
		
	endwhile;
	
		}
	

	
	
	
	
	
endwhile;
$seccion_slidePrincipal.= "</div></div>";


$slide_vertical='<div  class="ContenedorSlideVertical" >';
	$cont_art=0;
	$cont_pub=0;
//$select_app="SELECT * FROM app_articulos WHERE plaza='".$plaza."' AND estatus='1' and posicion='Slide-Vertical' ORDER BY id DESC	 ";
$select_app="SELECT * FROM app_articulos WHERE posicion='Slide-Vertical' and estatus='1' and plaza='".$plaza."'
							UNION
				SELECT * FROM app_publicidad where posicion='Slide-Vertical' and estatus='1'  and plaza='".$plaza."'
				ORDER BY orden DESC";



$r_app=mysql_query($select_app,$conexion);
while($f_app=mysql_fetch_assoc($r_app)):
	$id_nota_app=$f_app['id'];
	$id_articulo_app=$f_app['id_articulo'];
	$plaza_app=$f_app['plaza'];
	if($id_articulo_app==0)
	{
		if($cont_pub<3)
		{
			
			$slide_vertical.='
			<div > 
            <div class="PublicidadSlideVertical">
                <img src="'.$url_dominio_.'/images/imagenes-publicidad/'.$f_app['ruta'].'" >
            </div>
        </div>
			 ';
		
		$cont_pub++;	
		}
		
	}
	else
	{
		if($cont_art<3)
		{
				$select_ar="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app." WHERE id=".$id_articulo_app."";

	$r_ar=mysql_query($select_ar,$conexion);
	while($f_ar=mysql_fetch_assoc($r_ar)):
		$TituloSlideVertical=$f_ar['titulo'];
		$SumarioSlideVertical=$f_ar['sumario'];
		$Id_SeccionSlideVertical=$f_ar['id_seccion'];
		$AutorSlideVertical=$f_ar['autor'];
		$NotaSlideVertical=$f_ar['nota'];
		$Fecha_CreacionSlideVertical=$f_ar['fecha_creacion'];
		
		$TituloSlideVertical=utf8_encode($TituloSlideVertical);
		$SumarioSlideVertical=utf8_encode($SumarioSlideVertical);
		$AutorSlideVertical=utf8_encode($AutorSlideVertical);
		$NotaSlideVertical=utf8_encode($NotaSlideVertical);
		
		$TituloSlideVertical=substr($TituloSlideVertical,0,30)."...";
		$SumarioSlideVertical=substr($SumarioSlideVertical,0,100)."...";
		$imagen=extraer_imagen($NotaSlideVertical);
		$imagen=utf8_decode($imagen);
	endwhile;
	
	$select_se="SELECT seudonimo FROM secciones WHERE id='".$Id_SeccionSlideVertical."'";
	
	$r_se=mysql_query($select_se,$conexion);
	while($f_se=mysql_fetch_assoc($r_se)):
		$SeccionSlideVertical=$f_se['seudonimo'];
		$SeccionSlideVertical=strtolower(utf8_encode($SeccionSlideVertical));
		
	endwhile;
	/*<img src="'.$url_dominio_.'/images/imagenes-articulos/'.$imagenPlaza.'" >*/
	$slide_vertical.=' <div > <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
          <div class="SlideVerticalArticulo">
           
            <div class="SlideVerticalImagen"><img src="'.$url_dominio_.'/images/imagenes-articulos/'.$imagen.'" ></div>
            <div class="SlideVerticalContenido">
              <div class="SlideVerticalTitulo">'.$TituloSlideVertical.'</div>
              <div class="SlideVerticalAutor">'.$AutorSlideVertical.'</div>
              <div class="SlideVerticalFecha">'.$Fecha_CreacionSlideVertical.'</div>
            </div>
          </div>
          </a> </div>
		  
		  ';
			$cont_art++;
		}
		
	
	}


endwhile;
$slide_vertical.='</div>';




/*ULTIMAS NOTICIAS*/
function solo_hora($date_hora)
{
	$fecha = split("-",$date_hora); 
	
	$hora = split(":", $fecha[2]); 
	
	$fecha_hora = split(" ", $hora[0]);  
	
	$fecha_sola= $fecha[0]."-".$fecha[1].'-'.$fecha_hora[0];  
	$hora_sola=$fecha_hora[1].':'.$hora[1];
	return $hora_sola;
}

$ultimas_noticias="";
$select_app2="SELECT * FROM app_articulos WHERE  estatus='1' and plaza='".$plaza."' ORDER BY fecha DESC limit 4";
$r_app2=mysql_query($select_app2,$conexion);

while($f_app2=mysql_fetch_assoc($r_app2)):
	$id_nota_app2=$f_app2['id'];
	$id_articulo_app2=$f_app2['id_articulo'];
	$plaza_app2=$f_app2['plaza'];
	$fecha_app2=$f_app2['fecha'];
	
	$select_ar2="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app2." WHERE id=".$id_articulo_app2."";
	
	$r_ar2=mysql_query($select_ar2,$conexion);
	while($f_ar2=mysql_fetch_assoc($r_ar2)):
		$Titulo_nota2=$f_ar2['titulo'];;
		
		$Titulo_nota2=utf8_encode($Titulo_nota2);
		
		$Titulo_nota2=substr($Titulo_nota2,0,40)."...";
	endwhile;
	/*
	<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
	*/
	$ultimas_noticias.='
		<div style="width:87%;margin-left:10px;"><a href="#nota" onclick="LeerNota('.$id_nota_app2.')">
          <div style="display:inline-block; color: rgb(0,85,143);">'.solo_hora($fecha_app2).' </div>
          <div style="display:inline-block; color: rgb(151,151,151);"> / '.$Titulo_nota2.'</div></a>
          <hr>
        </div>
	';
	
	

endwhile;



/*ULTIMAS NOTICIAS*/



if($plaza_app=="nacionales")
{$url_video="nacionales";
$PlazaNota="NACI&Oacute;N";
$plaza_app="nacion";
}
else
{
$info_plaza=mysql_query("SELECT * FROM plazas WHERE seudonimo='".$plaza_app."'");
$array_plaza=mysql_fetch_array($info_plaza);

$url_video=$array_plaza['id_plaza'];	
}


	

$video='<a href="#video" onClick="galeria_video(\''.$url_video.'\')"><div class="Video" id="video_Seccion"> <img src="imagenes/video3.jpg"> </div></a>';

//publicidad
$pub="SELECT * FROM app_publicidad WHERE posicion='footer' and  plaza='".$plaza."' ORDER BY id DESC LIMIT 1";
$puclicidad=mysql_query($pub,$conexion);
$array_pub=mysql_fetch_array($puclicidad);


$ruta_publi="http://166.78.193.53/images/imagenes-publicidad/".$array_pub['ruta'];
$script='<script>
$("div.Suplementos img").attr("src","");
$("div.Suplementos img").css({"height":"89.5%"});
$("div.ContSuplemento img").attr("src","'.$ruta_publi.'");</script>';
	
	$arr1[$i]=array(
	'titulo_seccion' => $PlazaNota,
	'slide_principal' => $seccion_slidePrincipal,
	'slide_vertical' => $slide_vertical,
	'ultimas_noticias' => $script.$ultimas_noticias,
	'video' => $video ,
	'pseudo' => $plaza_app ,
	);
	
echo  json_encode($arr1);



?>