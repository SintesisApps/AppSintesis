
<?php
include("../../../includes/conexion.php");
include('../../../funciones.php'); 

function extraer_imagen_nota($cadena){
	
	$maximo= strlen ($cadena); 
	$ide= "imagenes-articulos/"; 
	$ide2= 'alt=""'; 
	$total= strpos($cadena,$ide); 
	$total2= stripos($cadena,$ide2); 
	$total3= ($maximo-$total2-0); 
	$imagen= substr ($cadena,$total+19,-$total3-2); 
	
	$imagen=htmlentities($imagen);
		
		return $imagen;				
	}

$id=$_POST['id'];
$arr1 = array();
$i=0;
$ContenidoExtra2="";


$select_app="SELECT * FROM app_articulos WHERE id='".$id."'";
	$r_app=mysql_query($select_app,$conexion);
	while($f_app=mysql_fetch_assoc($r_app)):
		$id_nota_app=$f_app['id'];
		$id_articulo_app=$f_app['id_articulo'];
		$plaza_app=$f_app['plaza'];
	

	$select_ar="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app." WHERE id=".$id_articulo_app."";

	$r_ar=mysql_query($select_ar,$conexion);
	while($f_ar=mysql_fetch_assoc($r_ar)):
		$Titulo=$f_ar['titulo'];
		$Sumario=$f_ar['sumario'];
		$Id_Seccion=$f_ar['id_seccion'];
		$id_secc=$f_ar['id_seccion'];
		$Autor=$f_ar['autor'];
		$Nota=$f_ar['nota'];
		$Fecha_Creacion_p=$f_ar['fecha_creacion'];
		$Nota_extraer=$f_ar['nota'];
		
		$Titulo_p=utf8_encode($Titulo);
		$Sumario_p=utf8_encode($Sumario);
		$Autor_p=utf8_encode($Autor);
		//$Nota=utf8_encode($Nota);
		
		$imagen=extraer_imagen_nota($Nota);
		$imagen_p=$imagen;
		
		$Nota=strip_tags($Nota);
		$Nota_p=utf8_encode($Nota);
		
		
	endwhile;
	
	if($id_secc==7)
	{
		$c_co="SELECT * FROM columnistas WHERE nombre_completo LIKE '%".$Autor_p."%'";
						$r_co=mysql_query($c_co,$conexion);
						while($f_co=mysql_fetch_assoc($r_co)):
							$id_columnista=$f_co['id'];
							$nombre_columnista=$f_co['nombre_completo'];
							$foto=$f_co['foto'];
						
							$nombre_columnista=utf8_encode($nombre_columnista);
							$foto=utf8_encode($foto);
						endwhile;
						$imagen_p="imagenes-columnistas/".$foto;		
	}
	else
	{
		$imagen_p="imagenes-articulos/".$imagen_p;
	}
	
	
	
	$imagen2=$url_dominio_.'/images/imagenes-articulos/'.$imagen;
	$Nota=str_replace($imagen,'',$Nota);
	$Nota=str_replace('<img src="" alt="" />','',$Nota);
	
	
	$imagen2='<img src="'.$imagen.'">';
	
	$select_se="SELECT seccion,seudonimo FROM secciones WHERE id='".$Id_Seccion."'";
	$r_se=mysql_query($select_se,$conexion);
	while($f_se=mysql_fetch_assoc($r_se)):
		$Seccion=$f_se['seccion'];
		$SeccionSeudonimo=$f_se['seudonimo'];
		$Seccion=utf8_encode($Seccion);
	endwhile;
	
	
	
	
	
endwhile;


$html="back_".$SeccionSeudonimo.'&'.$Seccion.'&'.$imagen.'&'.$Titulo.'&'.$Sumario.'&'.$Autor.'&'.$Fecha_Creacion.'&'.$Nota;

	  
$select_app="SELECT * FROM app_articulos WHERE id!='".$id."' AND plaza='".$plaza_app."' ORDER BY id DESC ";
$r_app=mysql_query($select_app,$conexion);
$contador=0;
while($f_app=mysql_fetch_assoc($r_app)):
	$id_nota_app=$f_app['id'];
	$id_articulo_app=$f_app['id_articulo'];
	$plaza_app=$f_app['plaza'];
	

$select_ar="SELECT titulo,sumario,id_seccion,autor,fecha_creacion,nota FROM articulos_".$plaza_app." WHERE id=".$id_articulo_app."  and id_seccion = ".$Id_Seccion ;

	$r_ar=mysql_query($select_ar,$conexion);
	
	if(mysql_num_rows($r_ar)>0)
	{
		if($contador <1)
		{
			while($f_ar=mysql_fetch_assoc($r_ar)):
		$Titulo=$f_ar['titulo'];
		$Sumario=$f_ar['sumario'];
		$Id_Seccion=$f_ar['id_seccion'];
		$Autor=$f_ar['autor'];
		$Nota=$f_ar['nota'];
		$Fecha_Creacion=$f_ar['fecha_creacion'];
		
		$Titulo=utf8_encode($Titulo);
		$Sumario=utf8_encode($Sumario);
		$Autor=utf8_encode($Autor);
		$Nota=utf8_encode($Nota);
		
		$imagen=extraer_imagen($Nota);
		$imagen=utf8_decode($imagen);
		
	endwhile;
	
	if($Id_Seccion==7)
	{
		$c_co="SELECT * FROM columnistas WHERE nombre_completo LIKE '%".$Autor."%'";
						$r_co=mysql_query($c_co,$conexion);
						while($f_co=mysql_fetch_assoc($r_co)):
							$id_columnista=$f_co['id'];
							$nombre_columnista=$f_co['nombre_completo'];
							$foto=$f_co['foto'];
						
							$nombre_columnista=utf8_encode($nombre_columnista);
							$foto=utf8_encode($foto);
						endwhile;
						$imagen_vox="imagenes-columnistas/".$foto;		
	}
	else
	{
		$imagen_vox="imagenes-articulos/".$imagen;
	}
	
	
	//$imagen2=$url_dominio_.'/images/imagenes-articulos/'.$imagen;
	
			$imagen=$url_dominio_.'/images/'.$imagen_vox;
	$Nota=str_replace($imagen,'',$Nota);

$ContenidoExtra.='
			<div class="NotaExtraContenedor">
				<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
					<div class="NotaExtraTitulo borde_'.$SeccionSeudonimo.'" style="width:197px; height:59px;" >
						'.substr($Titulo,0,50).'
					</div>
				</a>	
			
				
				<div class="NotaExtraImagen" style="text-align:center">
					<img src="'.$imagen.'" >
				</div>
				
				<div class="NotaExtraSumario" style="width:210px;">
					'.substr($Sumario,0,70).'...
				</div>
				
				<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
				<div class="NotaExtraLeerMas borde_'.$SeccionSeudonimo.'">
					Leer Más
				</div>
				</a>
            </div>
			';
			
			$contador++;
					
		}	
	}
	

endwhile;

//$html.="&".$ContenidoExtra;
//$arr1["nota_extra"]=$ContenidoExtra;
//echo $html;
$css='
<style>
 @media screen and (min-width: 0px) and (max-width: 1024px) {
 .ImagenesNotaImagen img{
	  width:400px;
	  }
 }
 @media screen and (min-width: 0px) and (max-width: 768px) {
 .ImagenesNotaImagen img{
	  width:300px;
	  }
 }
</style>
<script>

</script>
';


$cadena1='<p><br />Cali, Col. El presidente de México, Enrique Peña Nieto, participará la mañana de este jueves en la inauguración de los trabajos de la VII Cumbre de la Alianza del Pacífico, que se lleva a cabo en esta ciudad de Colombia.<br /><br /> <br />Al mediodía el mandatario mexicano se reunirá con representantes del Consejo Empresarial de la Alianza, integrado por 18 empresarios de la región, además de que participará en la Tercera Edición de la muestra gastronómica "Sabores de la Alianza".<br /><br /> <br />La Alianza del Pacífico, conformada por Chile, Colombia, Perú y México, prevé "avanzar progresivamente hacia el objetivo de alcanzar la libre circulación de bienes, servicios, capitales y personas, así como proyectar y vincular a la región hacia los mercados de Asia-Pacífico".<br /><br /> <br />Dicho acuerdo representa un mercado de 209 millones de personas, un Producto Interno Bruto (PIB) de dos billones de dólares, 35 por ciento del PIB de América Latina y el Caribe, 50 por ciento de las exportaciones de la región, recibe 30 por ciento de la inversión latinoamericana.<br /><br /> <br />En el encuentro entre los mandatarios integrantes de la Alianza: Chile, Sebastián Piñera; Colombia, Juan Manuel Santos; Perú, Ollanta Humala, y México, Enrique Peña Nieto, participarán por primera vez jefes de Estado y de Gobierno de países observadores.<br /><br /> <br />Entre ellos están los presidentes Laura Chinchilla, de Costa Rica; Mariano Rajoy, de España; Ricardo Martinelli, de Panamá; Otto Pérez Molina, de Guatemala; así como Stephen Harper, premier de Canadá, y Timothy John Groser, ministro de Comercio de Nueva Zelanda.<br /><br /> <br />La clausura de la Cumbre de la Alianza del Pacífico y firma de la declaración presidencial está programada a las 18:00 horas de este jueves.<br /><br /></p>
<p style="text-align: center;"><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_peña23052013.jpg" alt="" /></p>';



$cadena0='<p>México. Senadores y diputados federales del Partido Acción Nacional (PAN) felicitaron al nuevo coordinador de su bancada en el Senado de la República, Jorge Luis Preciado, y consideraron que se debe trabajar para abonar a la unidad partidista.</p>
<p>México. Senadores y diputados federales del Partido Acción Nacional (PAN) felicitaron al nuevo coordinador de su bancada en el Senado de la República, Jorge Luis Preciado, y consideraron que se debe trabajar para abonar a la unidad partidista.</p>
<p><br />En entrevistas por separado, el senador Héctor Larios Córdova y el diputado Ricardo Anaya recordaron que la decisión de relevar a Ernesto Cordero Arroyo de esa coordinación es facultad del presidente del partido, Gustavo Madero, porque así lo mandatan los estatutos.</p>
<p><br />Al reconocer que existe una crisis en la fracción legislativa del PAN en la Cámara de Senadores, Larios Córdova destacó que todos tienen que abonar para restablecer la unidad del grupo legislativo porque es fundamental para lograr resultados.</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_nacion2.jpg" alt="" /></p>';


$imagen_p='<div id="Gallery"  class="SlidePrincipal ImagenesNota" >';

function primera_imagen($texto) {
    $foto = '';
    ob_start();
    ob_end_clean();
    preg_match_all("/<img[\s]+[^>]*?src[\s]?=[\s\"\']+(.*\.([gif|jpg|png|jpeg]{3,4}))[\"\']+.*?>/", $texto, $array);
    $foto = $array [1][0];
    if(empty($foto)){
        $foto = '';
    }
    return $foto;
}
$cadena=$Nota_extraer;

$tamaño_total_cadena=strlen($cadena);
$numero_veces= substr_count($cadena, '<img'); 
$contador1==0;
$limit_num_veces=$numero_veces-1;

while($contador1!=$numero_veces )
{
	$primera= primera_imagen($cadena); 
	$primera=utf8_encode($primera);
	$tamaño_imagen=strlen($primera);
	 $imagen_p.='<div style="display:inline-block; overflow:hidden">
          <div class="ImagenesNotaImagen">
          	<img src="'.$primera.'">
          	<div class="ZoomImagenNota">
                <a href="'.$primera.'" id="">
              
                </a>
            </div>
            ';
/*			if($numero_veces > 1 && $contador1==0) 
*/			if($numero_veces > 1 && $contador1!=$limit_num_veces) 
			{$imagen_p.='<div ><img style="width:32px; height:32px; position:relative;position:center center; margin-top:-20%; margin-left:80%;" src="imagenes/iconos/azules/otras@2x.png"></div>';
				}
              	
          	$imagen_p.='
         </div>
        </div>';
	 
	 
	 
	$pos1 = strpos($cadena,'<img');
	
	$tamaño_aparicion_imagen=$pos1+$tamaño_imagen;
	
	$cadena= substr($cadena, $tamaño_aparicion_imagen);   
	
	
	$contador1=$contador1+1;
}


$imagen_p.='
   		 </div>
		
		<script>
      jQuery(document).ready(function($) {

  $(".SlidePrincipal").royalSlider({
    autoHeight: false,
    arrowsNav: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: "tabs",
    imageScaleMode: "none",
    imageAlignCenter:false,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 6,
    keyboardNavEnabled: false,
    usePreloader: true
  });
 
  
  
  });</script>
		
		';


$arr1[$i]=array(
	'titulo' => $Titulo_p,
					'sumario' => $css.$Sumario_p,
					'autor' => $Autor_p,
					'nota' => $Nota_p,
					'imagen' => $imagen_p,
					'fecha' => $Fecha_Creacion_p,
	'seccion' => $Seccion,
	'seccion_pseudo' => $SeccionSeudonimo,
	'nota_extra' => $ContenidoExtra,
	
	);
 echo  json_encode($arr1);

?>