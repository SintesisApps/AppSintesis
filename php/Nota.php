
<?php
include("../../includes/conexion.php");
include('../../funciones.php'); 


$id=$_POST['id'];

/*
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
	
	$imagen=$url_dominio_.'/images/imagenes-articulos/'.$imagen;
	$Nota=str_replace($imagen,'',$Nota);
	$Nota=str_replace('<img src="" alt="" />','',$Nota);
	
	
	$imagen='<img src="'.$imagen.'">';
	
	$select_se="SELECT seccion,seudonimo FROM secciones WHERE id='".$Id_Seccion."'";
	$r_se=mysql_query($select_se,$conexion);
	while($f_se=mysql_fetch_assoc($r_se)):
		$Seccion=$f_se['seccion'];
		$SeccionSeudonimo=$f_se['seudonimo'];
		$Seccion=utf8_encode($Seccion);
	endwhile;
endwhile;


$html="back_".$SeccionSeudonimo.'&'.$Seccion.'&'.$imagen.'&'.$Titulo.'&'.$Sumario.'&'.$Autor.'&'.$Fecha_Creacion.'&'.$Nota;

	  
$select_app="SELECT * FROM app_articulos WHERE id!='".$id."' AND plaza='".$plaza_app."' ORDER BY id DESC LIMIT 3";
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
	
	$imagen=$url_dominio_.'/images/imagenes-articulos/'.$imagen;
	$Nota=str_replace($imagen,'',$Nota);

$ContenidoExtra.='
			<div class="NotaExtraContenedor">
            	<div class="NotaExtraTitulo back_'.$SeccionSeudonimo.'">
					'.$Titulo.'
				</div>
				
				<div class="NotaExtraImagen">
					<img src="'.$imagen.'">
				</div>
				
				<div class="NotaExtraSumario">
					'.$Sumario.'
				</div>
				
				<a href="#nota" onclick="LeerNota('.$id_nota_app.')">
				<div class="NotaExtraLeerMas back_'.$SeccionSeudonimo.'">
					Leer Más
				</div>
				</a>
            </div>
			';
endwhile;

$html.="&".$ContenidoExtra;*/

$html='
<div id="contenedor_Nota">
<div id="Gallery"  class="SlidePrincipal ImagenesNota" >
   		
        <div style="display:inline-block; overflow:hidden">
          <div class="ImagenesNotaImagen">
          	<img src="imagenes/imagenes-articulos/1.jpg">
          	<div class="ZoomImagenNota">
                <a href="imagenes/imagenes-articulos/1.jpg">
                <img src="imagenes/iconos/azules/ampliar@2x.png">
                </a>
            </div>
            <div class="MasImagenNota">
              	<img src="imagenes/iconos/azules/otras@2x.png">
          	</div>
         </div>
        </div>
        <div style="display:inline-block; overflow:hidden">
          <div class="ImagenesNotaImagen">
              <img src="imagenes/imagenes-articulos/2.jpg">
              <div class="ZoomImagenNota">
                  <a href="imagenes/imagenes-articulos/2.jpg">
                    <img src="imagenes/iconos/azules/ampliar@2x.png">
                  </a>
              </div>
          
          </div>
        </div>
      
      
   		 </div>
  
  
        <div class="NotaTitulo"> Kristen Stewart la actriz NOTA PHP </div>
        <div class="NotaSumario">Kristen Stweart. La estrella de Twilight es la primera de nueve de la lista de un portal británico para encontrar a la actriz de Hollywood menos sexy. </div>
        
         <div class="NotaAutor">AP/Roswell</div>
         <div class="NotaFechaCreacion">32-93-2013 14:33:00</div>
        
        <div class="NotaCompleta">  La Secretaría de Salud (SSA) informó que permanecen hospitalizadas ocho personas que resultaron heridas en la explosión ocurrida el 31 de enero en la Torre B2 del Centro Administrativo Pemex, en la ciudad de México.
         En su reporte diario, la dependencia federal indicó que el estado de salud de todos los pacientes internados en diferentes nosocomios del Distrito Federal es delicado.
         La SSA detalló que uno de los pacientes recibe atención médica en el Centro de Neurorehabilitación Ángeles; cuatro en el Hospital Central Sur Picacho, de Petróleos Mexicanos (Pemex), y tres en el Hospital de Pemex Central Norte, uno de los cuales fue reportado grave la víspera y hoy se califica como delicado. 
        </div>
        
        <div class="ExtrasPlaza">
            <div class="NotaExtraContenedor">
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraTitulo borde_metropoli">
                        Kristen Stewart la actriz menos atractiva de Hollywood
                    </div>
                    </a>
                    
                    <div class="NotaExtraImagen">
                        <img src="imagenes/imagenes-articulos/2.jpg" >
                    </div>
                    
                    <div class="NotaExtraSumario">
                        Kristen Stweart. La estrella de Twilight es la primera de nueve de la lista de un portal británico para encontrar a la actriz de Hollywood menos sexy.
                    </div>
                    
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraLeerMas borde_metropoli ">
                        Leer Más
                    </div>
                    </a>
             </div>
             
             <div class="NotaExtraContenedor">
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraTitulo borde_metropoli">
                        Kristen Stewart la actriz menos atractiva de Hollywood
                    </div>
                    </a>
                    
                    <div class="NotaExtraImagen">
                        <img src="imagenes/imagenes-articulos/2.jpg" >
                    </div>
                    
                    <div class="NotaExtraSumario">
                        Kristen Stweart. La estrella de Twilight es la primera de nueve de la lista de un portal británico para encontrar a la actriz de Hollywood menos sexy.
                    </div>
                    
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraLeerMas borde_metropoli ">
                        Leer Más
                    </div>
                    </a>
             </div>
             
             <div class="NotaExtraContenedor">
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraTitulo borde_metropoli">
                        Kristen Stewart la actriz menos atractiva de Hollywood
                    </div>
                    </a>
                    
                    <div class="NotaExtraImagen">
                        <img src="imagenes/imagenes-articulos/2.jpg" >
                    </div>
                    
                    <div class="NotaExtraSumario">
                        Kristen Stweart. La estrella de Twilight es la primera de nueve de la lista de un portal británico para encontrar a la actriz de Hollywood menos sexy.
                    </div>
                    
                    <a href="#nota" onclick="LeerNota('.$id_nota_app.')">
                    <div class="NotaExtraLeerMas borde_metropoli ">
                        Leer Más
                    </div>
                    </a>
             </div>
         </div>
	</div>
';
echo $html;


?>