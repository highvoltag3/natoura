<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 */
?>
<div id="sidebar_tours">
	<div id="imagen_mapa">
		<?php 
			$lat = get_meta('lat');
			$lng = get_meta('lng');
		
            if($lat || $lng) 
            { 
        
	            $mymap = new Mappress_Map(array("width" => 165, "height" => 132, 'autocenter' => true, 'maptypeid' => 'terrain', 'tooltips' => false)); 
				$mypoi = new Mappress_Poi(array("point" => array("lat" => $lat, "lng" => $lng)));
				$mymap->pois = array($mypoi);
				echo $mymap->display();
        
         	} else 
         	{
         		//show map paragraph or img that say's "no map"..
         		echo '<p class="nodisponible">'; _e('No existe un mapa disponible para el tour', 'NatouraV3'); echo "</p>";
         	}
        ?>
     </div> <!-- end imagen_mapa -->
         
    
    <div id="extra_info">
    
         <ul>
         	 <li><?php $region = get_meta('region');
                    if($region) { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/region.png" alt="region" width="43" height="34" />
                    <a class="iframe" href="<?php echo "http://natoura.com/new/"; checkLangRegions(); echo $region ?>"><?php _e('Regi&oacute;n', 'NatouraV3'); ?></a> 
                    <?php } else { ?>
                    
                    	<p class="nodisponibleli"><?php _e('No existen una regi&oacute;n disponible', 'NatouraV3'); ?></p>
                    <?php } ?>                                                
             </li>
             
             <li><?php $parques = get_meta('parques');
                    if($parques) { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/icono_parques.png" alt="icono_parques" width="43" height="34" />
                    <a class="iframe" href="<?php echo "http://natoura.com/new/"; checkLangParks(); echo $parques; ?>"><?php _e('Parques Nacionales', 'NatouraV3'); ?></a> 
                    <?php } else { ?>
                    	<p class="nodisponibleli"><?php _e('No existen Parques Nacionales disponibles', 'NatouraV3'); ?></p>
                    <?php } ?>
             </li> 
             
            <li id="incluye">
            <img src="<?php bloginfo('template_directory'); ?>/images/incluye_check.png" width="43" height="34" align="middle" alt="<?php _e('Incluye','NatouraV3'); ?>" />
            <a class="tipExtraInfo inline" href="#incluye_detail"><?php _e('El Tour Incluye','NatouraV3'); ?></a>
            <div style="display:none"><div id="incluye_detail">
            	 <?php $incluye = get_meta('incluye');
					if($incluye) : ?>
					<?php echo $incluye ?>
                 <?php endif; ?>
            </div></div>
            </li>
            
            <li id="no_incluye">
            <img src="<?php bloginfo('template_directory'); ?>/images/incluye_x.png" width="43" height="34" align="middle" alt="<?php _e('No Incluye','NatouraV3'); ?>" /> 
            <a class="tipExtraInfo inline" href="#noincluye_detail"><?php _e('El Tour No Incluye','NatouraV3'); ?></a>
            <div style="display:none"><div id="noincluye_detail">
            <?php $noincluye = get_meta('noincluye');
						if($noincluye) : ?>
						<?php echo $noincluye ?> 
                   <?php endif; ?>
            </div></div>
            </li>
            
            <li id="recomendaciones">
            <img src="<?php bloginfo('template_directory'); ?>/images/incluye_mas.png" width="43" height="34" align="middle" alt="<?php _e('Le recomendamos','NatouraV3'); ?>" /> 
            <a class="tipExtraInfo inline" href="#recomendaciones_detail"><?php _e('Le recomendamos que traiga consigo','NatouraV3'); ?></a>
            <div style="display:none"><div id="recomendaciones_detail">
            	<?php $recomendaciones = get_meta('recomendaciones');
					if($recomendaciones) : ?>
					<?php echo $recomendaciones ?>
                <?php endif; ?>
            </div></div>
            </li>
            
            <li id="como_llegar">
            <img src="<?php bloginfo('template_directory'); ?>/images/incluye_flecha.png" width="43" height="34" align="middle" alt="<?php _e('Como llegar a...','NatouraV3'); ?>" /> 
            <a class="tipExtraInfo inline" href="#como_llegar_detail"><?php _e('Como llegar a...','NatouraV3'); ?></a>
            <div style="display:none"><div id="como_llegar_detail">
            	<?php $como_llegar = get_meta('como_llegar');
					if($como_llegar) : ?>
					<?php echo $como_llegar ?>
                <?php endif; ?>
            </div></div>
            </li>
        </ul>
        
		<?php 
			$lat = get_meta('lat');
			$lng = get_meta('lng');
		
            if($lat || $lng) 
            { ?>
        		<div id="clima">
	            	<?php 
	            		include_once("wp-content/themes/NatouraV3/includes/weather_formaat_lang.php");						
	            		echo do_shortcode('[forecast location="'.$lat.','.$lng.'"]'); 
	            	?>
	            </div> <!-- end imagen_mapa -->
        
      <?php } ?>
      
	</div>   <!--END extra_info-->
	
</div>  <!--END sidebar_tours-->

   	   <!-- Widgetized sidebar, if you have the plugin installed. -->
       <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar tours')) : else : ?>


		<?php endif; ?> <!--fin de codigo de Widgetized-->     