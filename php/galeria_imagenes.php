<?php
/*Galeria de imagenes*/
include("../../includes/conexion.php");
include('../../funciones.php');

$html="
<script type='text/javascript'>

		(function(window, PhotoSwipe){
		
			document.addEventListener('DOMContentLoaded', function(){
			
				var
					options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll('#Gallery a'), options );
					
					
					// onBeforeShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeShow, function(e){
						console.log('onBeforeShow');
					});
					
					// onShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onShow, function(e){
						console.log('onShow');
					});
					
					// onBeforeHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeHide, function(e){
						console.log('onBeforeHide');
					});
					
					// onHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onHide, function(e){
						console.log('onHide');
					});
					
					// onDisplayImage
					instance.addEventHandler(PhotoSwipe.EventTypes.onDisplayImage, function(e){
						console.log('onDisplayImage{');
						console.log('onDisplayImage - e.action = ' + e.action);
						console.log('onDisplayImage - e.index = ' + e.index);
						console.log(instance.getCurrentImage());
						console.log('onDisplayImage}');
					});
					
					// onResetPosition
					instance.addEventHandler(PhotoSwipe.EventTypes.onResetPosition, function(e){
						console.log('onResetPosition');
					});
					
					// onSlideshowStart
					instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStart, function(e){
						console.log('onSlideshowStart');
					});
					
					// onSlideshowStop
					instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStop, function(e){
						console.log('onSlideshowStop');
					});
					
					// onTouch
					instance.addEventHandler(PhotoSwipe.EventTypes.onTouch, function(e){
						console.log('onTouch{');
						console.log('onTouch - e.action = ' + e.action);
						console.log('onTouch - e.point = ');
						console.log(e.point);
						console.log('onTouch}');
					});
					
					// onBeforeCaptionAndToolbarShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeCaptionAndToolbarShow, function(e){
						console.log('onBeforeCaptionAndToolbarShow');
					});
					
					// onCaptionAndToolbarShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onCaptionAndToolbarShow, function(e){
						console.log('onCaptionAndToolbarShow');
					});
					
					// onBeforeCaptionAndToolbarHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeCaptionAndToolbarHide, function(e){
						console.log('onBeforeCaptionAndToolbarHide');
					});
					
					// onCaptionAndToolbarHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onCaptionAndToolbarHide, function(e){
						console.log('onCaptionAndToolbarHide');
					});
					
					// onToolbarTap
					instance.addEventHandler(PhotoSwipe.EventTypes.onToolbarTap, function(e){
						console.log('onToolbarTap');
						console.log(e);
					});
					
					// onBeforeZoomPanRotateShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeZoomPanRotateShow, function(e){
						console.log('onBeforeZoomPanRotateShow');
					});
					
					// onZoomPanRotateShow
					instance.addEventHandler(PhotoSwipe.EventTypes.onZoomPanRotateShow, function(e){
						console.log('onZoomPanRotateShow');
					});
					
					// onBeforeZoomPanRotateHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onBeforeZoomPanRotateHide, function(e){
						console.log('onBeforeZoomPanRotateHide');
					});
					
					// onZoomPanRotateHide
					instance.addEventHandler(PhotoSwipe.EventTypes.onZoomPanRotateHide, function(e){
						console.log('onZoomPanRotateHide');
					});
					
					// onZoomPanRotateTransform
					instance.addEventHandler(PhotoSwipe.EventTypes.onZoomPanRotateTransform, function(e){
						console.log('onZoomPanRotateTransform');
						console.log(e);
					});
					
			}, false);
			
			
		}(window, window.Code.PhotoSwipe));
		
	</script>

";

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