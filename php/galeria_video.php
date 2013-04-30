<?php
/*Galeria video*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html='';

$select_app="SELECT * FROM galeria_videos  WHERE status='1' ORDER BY fecha DESC limit 1";
$r_app=mysql_query($select_app,$conexion);
$i=0;//cuenta el  video principal

while($video=mysql_fetch_array($r_app))
{
	
		$html.='<div id="videogaleria">
		<div class="VideoTituloPrincipal">
        	<strong>Confía EPN en superar prospectivas de crecimiento</strong>
        </div>
            <object width="100%" height="49%">
              <param name="movie" value="http://youtube.com/v/M885NmIBLlc?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=0&modestbranding=1"/>
              <param value="true" name="allowFullScreen"/>
              <param value="always" name="allowscriptaccess"/>
              <param value="transparent" name="wmode"/>
              <embed width="100%" height="49%" wmode="transparent"  allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://youtube.com/v/M885NmIBLlc?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=0&showinfo=0&modestbranding=1"/>
            </object></div>
		';
}

$html.='<div class="contvideogaleriaimg"> 
      	<div class="contvideogaleriaimg_secundario">';

		$reg="SELECT * FROM galeria_videos WHERE id NOT IN (SELECT max(id) FROM galeria_videos) ORDER BY fecha DESC";
		$registros=mysql_query($reg);
		while($video2=mysql_fetch_array($registros))
		{
			$html.='
			 <div class="VideoImagen">
                <a href="http://youtube.com/v/IomwuczBqJY" onclick="return cambiarvideo(this.href,this.title)" title="Toma protesta de diputados"> <img src="http://img.youtube.com/vi/IomwuczBqJY/0.jpg" />
                  <div class="titulo_video"> <strong>Toma protesta de diputados</strong> </div>
                </a> 
            </div> 
			';
		}
		
		
		
		
$html.='</div></div>';




echo $html;


?>