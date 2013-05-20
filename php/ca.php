<?php

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

/*$cadena='<p>El comisionado de Seguridad del Gobierno Federal, Manuel Mondragón y el gobernador Gabino Cué, realizaron la apertura oficial del Centro Federal de Reinserción Social (Cefereso) número 13 en Mengolí de Morelos, Miahuatlán de Porfirio Díaz, que albergará a  reos sentenciados  del fuero federal.<br /><br />Al respecto, Mondragón Ikalab, reiteró que con el gobierno de Enrique Peña Nieto, se ha fijado como objetivos transformar el sistema penitenciario del país, el cual ve logrado una gran etapa con la puesta en marcha  del Cefereso número 13.</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penal.jpg" alt="" /></p>
<p><br />"Estamos realizando acciones precisas para transformar la política penitenciaria del país. Con trabajo y disciplina lograremos los propósitos sociales en beneficio del país".<br /><br />Precisó que la primera población de este Cefereso será de 126 reos de otras partes del país y 160 recluidos en los penales oaxaqueños.<br /><br />Durante su mensaje,  el Jefe del Ejecutivo Estatal, Gabino Cué Monteagudo, dijo que con este centro de mediana seguridad de consolida el nuevo modelo de reinserción social, además de que es una muestra de los lazos de unidad entre el gobierno estatal y el federal.<br /><br />Añadió que la apertura de este Cefereso, lleva a pensar en la reflexión que se debe de realizar como sociedad la cual se está lastimando con el incremento de la inseguridad y por consciencia la creación de centros penitenciarios para que se ubique a la población carcelaria.<br /><br />Ante la presencia de funcionarios estatales y representantes de los tres poderes de gobierno del estado, destacó que alrededor  de nueve ceferesos de este tipo se construyen en todo país de los cuales tres ya fueron puestos en funcionamiento.</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penalllllll2.jpg" alt="" /></p>
<p><br />Cué Monteagudo, mencionó que con la construcción del Cefereso se generaron poco más de mil 600 empleos, además de que se benefició a la población del Mengolí con la construcción de un acceso carretero  que conduce a las instalaciones del penal.<br /><br />Con la puesta en marcha de la instalación penitenciaria con sede en Miahuatlán, abundó que el 80 por ciento de los trabajadores son personas que viven en Miahuatlán y Ocotlán generando así un factor económico para la región.<br /><br />Al respecto, el titular de dicho centro de readaptación social, Eduardo Enrique Robles García, dijo que el  Cereso es de primer nivel, único en el país el cual cuenta con puertas automáticas, censores perimetrales así como tecnología que permite la detección de drogas , explosivos y variantes tecnológicas.</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penalllllll3.jpg" alt="" /></p>
<p><br />"De esta forma garantizamos que los inculpados cumplan con su proceso de reinserción a la sociedad", comentó.<br />Añadió que este Cereso se guía bajo el esquema de la nueva política penitenciaria el cual garantiza una reinserción social exitosa y un espacio seguro para los internos y el exterior.</p>';*/

$cadena='<p>una</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penal11.jpg" alt="" /></p>
<p><br />dos</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penalllllll21.jpg" alt="" /></p>
<p><br />tres</p>
<p><img src="http://166.78.193.53/images/imagenes-articulos/sintesis_penalllllll31.jpg" alt="" /></p>
<p><br />"De esta forma garantizamos que los inculpados cumplan con su proceso de reinserción a la sociedad", comentó.<br />Añadió que este Cereso se guía bajo el esquema de la nueva política penitenciaria el cual garantiza una reinserción social exitosa y un espacio seguro para los internos y el exterior.</p>';

$tamaño_total_cadena=strlen($cadena);
$numero_veces= substr_count($cadena, '<img'); // 2
//echo $tamaño_total_cadena."<br>";
$contador1==0;

//echo $numero_veces."<br>";
//echo $cadena;
while($contador1!=$numero_veces )
{
	$primera= primera_imagen($cadena); 
	echo "<br>".$primera;
	$tamaño_imagen=strlen($primera);
//	echo "<br>tamaño cadena imagen ". $tamaño_imagen;
	
	
	$pos1 = strpos($cadena,'<img');
	//echo "<br>posicion aparicion ".$pos1;
	
	$tamaño_aparicion_imagen=$pos1+$tamaño_imagen;
	//echo "total".$tamaño_aparicion_imagen;
	
	$cadena= substr($cadena, $tamaño_aparicion_imagen);    
	//echo "<br>nueva cadena<br>". $cadena;
	
	
	$contador1=$contador1+1;
	//echo $contador1;
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>