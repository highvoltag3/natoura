<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 */
?>
			
<!-- begin footer -->

			<div id="footer">
				<div id="tldiv" class="fl width210 bodertoporange">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Cuadro Sup. Izq. Footer') ) ?>
				</div>
				<div id="trdiv" class="fl bodertoporange footerrightdivs">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Cuadro Sup. dere. Footer') ) ?>					
				</div>
				<div id="bldiv" class="clear fl width210 bodertopgray">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Cuadro Inf. Izq. Footer') ) ?>
				</div>
				<div id="brdiv" class="fl bodertopgray footerrightdivs">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Cuadro Inf. dere. Footer') ) ?>
					<table border="0" cellspacing="0" cellpadding="0">
					<?php 
						$cur_post_id = get_the_ID();
						$cur_lang = get_cur_language($cur_post_id);
						if ( isset($_GET['lang']) ) { $cur_lang = $_GET['lang']; }
					
						if (!empty($cur_lang))  {  
							$lang = $cur_lang;
							
							switch ($lang) {
								
								case "en_us";
									echo '<tr>
										    <td valign="middle"><img src="' . get_bloginfo('template_directory') . '/images/flags/en_us.png" alt="en_us" width="" height="" /></td>
										    <td valign="middle"><p>Call + 58 274 2524216 to speak with one of our Travel Consultants, or within the US at 303-800-4639 Monday-Friday 8:30AM-6:00 PM Eastern Time<br />
																   Our office hours: 15:00h - 0:30h(European summer time) / 14:00h - 23:30h  (European winter time) or 8:30h - 18:00h (Venezuelan time)
															    </p>
										    </td>
										  </tr>';
								break;
								
								case "es_es";
									echo '<tr valign="middle">
										    <td><img src="' . get_bloginfo('template_directory') . '/images/flags/es_es.png" alt="es_es" width="" height="" /></td>
										    <td><p>Tel&eacute;fono de atenci&oacute;n al cliente: +58 274 2524216.<br />
													Nuestro horario de oficina: 15:00 Uhr - 00:30 Uhr (horario de verano europeo) / 14:00 Uhr - 23:30 Uhr (horario de invierno europeo) o 8:30 Uhr - 18:00 Uhr (hora venezolana)
										    	</p>
										    </td>
										    
										  </tr>';
								break;
								
								case "fr_fr";
									echo '<tr valign="middle">
										    <td><img src="' . get_bloginfo('template_directory') . '/images/flags/fr_fr.png" alt="fr_fr" width="" height="" /></td>
										    <td><p>Appelez en France: 0970 449 206.<br />
													Notre horaire de travail: 15:00 Uhr - 00:30 Uhr (horaire d&#8217;&eacute;t&eacute; europeen) / 14:00 Uhr - 23:30 Uhr (horaire d`hiver europeen) ou 8:30 Uhr - 18:00 Uhr (heure locale au Venezuela)
										    	</p>
										    </td>
										  </tr>';
								break;
								
								case "gr_de";
									echo '<tr valign="middle">
										    <td><img src="' . get_bloginfo('template_directory') . '/images/flags/gr_de.png" alt="gr_de" width="" height="" /></td>
										    <td><p>Unsere Telefonnummer in Deutschland: 05906 30 33 64 <br />
										    	Unsere Buerozeiten: 15:00 Uhr &#8211; 00:30 Uhr (deutsche Sommerzeit) / 14:00 Uhr - 23:30 Uhr (deutsche Winterzeit) oder 8:30 Uhr - 18:00 Uhr (venezolanische Zeit)
												</p>
										    </td>
										  </tr>';
								break;
									
							}
						} else {
							//espa–ol.
							echo '<tr valign="middle">
								    <td><img src="' . get_bloginfo('template_directory') . '/images/flags/es_es.png" alt="es_es" width="" height="" /></td>
								    <td><p>Tel&eacute;fono de atenci&oacute;n al cliente: +58 274 2524216.<br />
											Nuestro horario de oficina: 15:00 Uhr - 00:30 Uhr (horario de verano europeo) / 14:00 Uhr - 23:30 Uhr (horario de invierno europeo) o 8:30 Uhr - 18:00 Uhr (hora venezolana)
								    	</p>
								    </td>
								    
								  </tr>';
						}
					 ?>
					 
					</table>
					
					<div id="cc_logos">
						<img src="<?php bloginfo('template_directory'); ?>/images/icono_tarjetas_de_credito.png" alt="icono_tarjetas_de_credito" />
					</div> <!-- /cc_logos -->
					
				</div>
			
			<br class="clear">
	        </div>   <!--  end footer  -->
          
        </div> <!--END CONTAINER-->
    </div> <!--END WRAPPER-->  
      
<?php wp_footer(); ?>

</body>
</html>