<?php
/*Galeria video*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html='';

$select_app="SELECT * FROM galeria_videos  WHERE status='1' ORDER BY fecha DESC ";
$r_app=mysql_query($select_app,$conexion);
$i=0;//cuenta el  video principal

$html.='
		<div id="videogaleria">
      	<div class="VideoTituloPrincipal">
        	<strong>Confía EPN en superar prospectivas de crecimiento</strong>
        </div>
            <object width="100%" height="49%">
              <param name="movie" value="http://youtube.com/v/M885NmIBLlc?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=0&modestbranding=1"/>
              <param value="true" name="allowFullScreen"/>
              <param value="always" name="allowscriptaccess"/>
              <param value="transparent" name="wmode"/>
              <embed width="100%" height="49%" wmode="transparent"  allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" src="http://youtube.com/v/M885NmIBLlc?fs=1&amp;hl=es_ES&amp;rel=0&amp;autoplay=0&showinfo=0&modestbranding=1"/>
            </object>
      </div>
		';
		


echo $html;


?>