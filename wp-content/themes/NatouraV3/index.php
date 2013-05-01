<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 */
get_header(); ?>

<?php get_sidebar(); ?>

<div id="content">
                
                <div id="display_fotos_inner">
           
              		<ul id="display_fotos_innerContent">
	                 	<?php $galleryID = 35;
	                           
	                       if ($galleryID) {
							    $ngg_options = get_option ('ngg_options');  
							    $pictures    = $wpdb->get_results("SELECT t.*, tt.* FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ON t.gid = tt.galleryid WHERE t.gid = '$galleryID' AND tt.exclude != 1 ORDER BY tt.$ngg_options[galSort] $ngg_options[galSortDir] ");
							    $mainURL 	 = get_bloginfo(url);
							               
							    $final = array();    
							    foreach($pictures as $picture) {
							      $aux = array();
							      $aux["title"] = $picture->alttext; // $picture->alttext;
							      $aux["desc"]  = $picture->description;
							      $aux["img"]   = $mainURL . "/" . $picture->path ."/" . $picture->filename;
							      
							      $final[] = $aux;
							    }
							    
							    $pictures = $final;
							    
							  }
							  
							  foreach ($pictures as $picture)
							    if ($picture["img"]) {
							    	echo '<li class="display_fotos_innerImage">
									          <img src="'. $picture["img"] .'" alt="'. $picture["title"] .'" />
									          <span class="bottom"><strong>'. $picture["title"] .'</strong><br />'. $picture["desc"] .'</span>
									      </li>';
							    }
	                    ?>
	                    <script type="text/javascript">$(document).ready(function() 
		                    { 
		                    	//Launch the displays		
								$('#display_fotos_inner').s3Slider({
									timeOut: 4000
								});
		                    }); 
		                </script>
	                </ul>
	                
				</div> <!-- END display_fotos_inner -->
            	 
                 <div id="content_front_only">
                 
                 	<div id="content_front_only_inner_left">
                    	<?php _e('<h1>Bienvenidos a <strong>Venezuela</strong> y a <strong>Natoura</strong></h1>','NatouraV3'); ?>
                        <?php _e('<p>&iquest;Desear&iacute;an sentirse parte de uno de los lugares m&oacute;s ex&oacute;ticos y menos tocados de la naturaleza, y estar en uno de los ecosistemas menos perturbados del mundo?	<br /><br />
Natoura le har&oacute; sentirse parte de la naturaleza, teniendo especial cuidado en respetar los delicados recursos de estos majestuosos y geogr&oacute;ficamente diversos medioambientes.
<br /><br />
<strong>&iexcl;Esto es lo que nosotros le ofrecemos en Natoura!</strong></p>','NatouraV3'); ?>
                   <div align="center">
                   		<img src="<?php bloginfo('template_directory'); ?>/images/firma_jlt_renate.png" alt="Jos&eacute; Luis y Renate" width="266" height="96" align="absbottom" /> 
                   		<img src="<?php bloginfo('template_directory'); ?>/images/20_an_small.png" alt="20 Años… 20 Years…" width="90" height="89" align="absbottom" />
                   		
                   </div>
                    
                   </div> <!--END INNER LEFT-->
                   
                 	<div align="right" id="content_front_only_inner_right"> 
                    	<?php
                    	//revisar y fijar contenidos segun lang.
							if (isset($_GET['lang'])) 
							{
								$lang = $_GET['lang'];
								
								switch ($lang) 
								{
									
									case "en_us":
										$glb_catID = 179; //se cat_id for the english cat that contains the destinations.
									break;
									
									case "es_es":
										$glb_catID = 178; //lo mismo q el anterior pero en espa–ol... y asi los demas.
									break;
									
									case "fr_fr":
										$glb_catID = 180;
									break;
									
									case "gr_gr":
										$glb_catID = 181;
									break;
										
								}
							} else 
							{
								//espa–ol.
									$glb_catID = 178;
							}
							//query (filtrar) solo los de la categor’a seleccionada
							$args = array
							(
								'cat='.$glb_catID.'',
								'post__in'  => get_option( 'sticky_posts' ),
								'ignore_sticky_posts' => 1
							);
							query_posts( $args );
                    		if (have_posts()) : while (have_posts()) : the_post(); 
                    	?>

                        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                            <h3 class="storytitle"><a href="<?php the_permalink() ?>?lang=<?php echo the_curlang(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                            <div class="meta"><!--<?php _e("Filed under:",'NatouraV3'); ?> <?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: ','NatouraV3'), ', ', ' &#8212; '); ?> <?php the_author() ?> @ <?php the_time() ?> --><?php edit_post_link(__('Edit This','NatouraV3')); ?></div>
                        
                            <div id="story" class="storycontent">
                                <?php							
								   //ahora a mostrar los resultados personalisados
                                   the_post_thumbnail(); //llama al thumnbnail asignado al post.
                                   content(40); // Se uso content en vez de the_content('<span class="read_more">&nbsp;</span>'); para utilizar la funci&oacute;n content en function.php 
                                ?>
                            </div>
                        </div><!-- END POST-->
                    

                    
                    
						<?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.','NatouraV3'); ?></p>
                        <?php endif; 
                          	  wp_reset_query(); //resetearlo para q no fastidie en las dem‡s ?>   
                             
                                                
                 	</div><!-- END INNER RIGHT-->
                 	<script>
                 	$(function(){
                 		$("#why").fancybox({
                 		autoDimensions: false,
                 		width: 720,
                 		height: 480
                 		});
                 		
                 		$("#content_front_only_whyve").click(function(){ 
                 			$("a#why").click();     
                 			return false;
                 		});
                 		
                 		
                 	});
                 	</script>
                 	<div id="content_front_only_whyve"> <!-- porq venezuela -->
                 		<img src="<?php bloginfo('template_directory'); ?>/images/why_ve.png" alt="why_ve" width="58" height="67" align="left" />
                 		<p><?php _e('La geograf&iacute;a de Venezuela permite a NATOURA brindarle una gran variedad de aventuras en plena naturaleza en un solo paquete','NatouraV3');  ?>
                 		</p>
                 		<a id="why" href="#porq"></a>
                 		<div style="display:none">
                 			<div id="porq">
	                 			
	                 			<?php
	                 			//revisar y fijar contenidos segun lang.
									if (isset($_GET['lang'])) {
										$lang = $_GET['lang'];
										
										switch ($lang) {
											
											case "en_us":
												$porq_catID = 298; //se cat_id for the english cat that contains the destinations.
											break;
											
											case "es_es":
												$porq_catID = 298; //lo mismo q el anterior pero en espa–ol... y asi los demas.
											break;
											
											case "fr_fr":
												$porq_catID = 298;
											break;
											
											case "gr_gr":
												$porq_catID = 298;
											break;
												
										}
									} else {
										//espa–ol.
											$porq_catID = 298;
									}
	                 			//query (filtrar) solo los de la categor’a seleccionada
	                    		query_posts('cat='.$porq_catID.'');
	                    		if (have_posts()) : while (have_posts()) : the_post(); 
		                    	?>
		
		                        <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		                            <h3 class="storytitle"><a href="<?php the_permalink() ?>?lang=<?php echo the_curlang(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		                            <div class="meta"><!--<?php _e("Filed under:",'NatouraV3'); ?> <?php the_category(',') ?> &#8212; <?php the_tags(__('Tags: ','NatouraV3'), ', ', ' &#8212; '); ?> <?php the_author() ?> @ <?php the_time() ?> --><?php edit_post_link(__('Edit This','NatouraV3')); ?></div>
		                        
		                            <div id="story" class="storycontent">
		                               <div class="tour_thumb">
		                                <?php							
										   //ahora a mostrar los resultados personalisados
		                                   the_post_thumbnail(); //llama al thumnbnail asignado al post.
		                                ?>
		                               </div>
		                                <p>
		                                <!-- // Se uso content en vez de the_content('<span class="read_more">&nbsp;</span>'); para utilizar la funci&oacute;n content en function.php  -->
		                                <?php content(40); ?>
		                                </p> 
		                                
		                                
		                            </div>
		                        </div><!-- END POST-->
		                        
		                        <?php endwhile; endif; 
                          	    wp_reset_query(); //resetearlo para q no fastidie en las dem‡s ?>
                 			
                 			</div>
                 		</div>
                 		
                 		<iframe width="373" height="280" src="http://www.youtube.com/embed/D3K7YHvnZw8" frameborder="0" allowfullscreen></iframe>

                 	</div> <!-- END porq venezuela -->
                    
                 </div> <!--END content_front_only-->

          </div> <!--END CONTENT-->  
          <br class="clear" />  	  
          
<?php get_footer(); ?>