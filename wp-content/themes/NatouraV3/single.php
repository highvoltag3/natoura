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
           		                
      <div id="breadcrumb">
		<?php
         if(function_exists('el_breadcrumb'))
         {
         el_breadcrumb();
         }
        ?>
      </div>
      
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      	<h1><?php the_title(); ?></h1>	<a id="view_img_gal"><?php _e('Ver las fotos de este tour','NatouraV3'); ?></a>
      	<script>
      		$(function() {
      		/*place jQuery actions here*/
      			$('#view_img_gal').click(function(e) {
      				e.preventDefault();
      				$('.fotos_tour').click();
      			});
      		});
      		
      	</script>
      
      	<div id="display_fotos_inner">
      		<ul id="display_fotos_innerContent">
      		   	<?php
      		   	if (get_meta('galeria')) 
      		   	{
             		$galleryID = get_meta('galeria');
                       
                   if ($galleryID) {
					    $ngg_options = get_option ('ngg_options');  
					    $pictures    = $wpdb->get_results("SELECT t.*, tt.* FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ON t.gid = tt.galleryid WHERE t.gid = '$galleryID' AND tt.exclude != 1 ORDER BY tt.$ngg_options[galSort] $ngg_options[galSortDir] ");
					    $mainURL 	 = get_bloginfo(url);        
					    
					    $final = array();    
					    foreach($pictures as $picture) 
					    {
					      $aux = array();
					      $aux["title"] = $picture->alttext; // $picture->alttext;
					      $aux["desc"]  = $picture->description;
					      $aux["img"]   = $mainURL . "/" . $picture->path ."/" . $picture->filename;
					      $aux["link"]  = $mainURL . "/" . $picture->path ."/" . $picture->filename;
					      
					      $final[] = $aux;
					    }
					    
					    $pictures = $final;
					    
					  }
					  
					  foreach ($pictures as $picture)
					    if ($picture["img"]) 
					    {
					    	echo '<li class="display_fotos_innerImage">
					    			<a class="fotos_tour" href="'. $picture["img"] .'" rel="galeria_tour">
							          <img src="'. $picture["img"] .'" alt="'. $picture["title"] .'" />
							        </a>
							        <span class="bottom"><strong>'. $picture["title"] .'</strong><br />'. $picture["desc"] .'</span>
							      </li>';
					    }
				} else 
				{
					_e('<li class="nogaleria"><span>No existen fotos disponibles para est&eacute; tour...</span></li>','NatouraV3');
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
	 
	 <?php get_sidebar('tours'); ?>
	 
     <div id="content_single">
     	
		<div id="info_del_tour">
        	<div id="info_del_tour_resumen">
                
                <div class="more_meta_single">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
					    <td class="more_meta_icon" style="padding-left: 0;"><img src="<?php bloginfo('template_directory'); ?>/images/region.png" alt="region" width="43" height="34" /></td>
					    <td>
					    	<?php $region = get_meta('region');
                            if($region)
                        	  echo "<p>".__('Regi&oacute;n','NatouraV3')."</p> <p class='meta_result'>".$region."</p>"; 
                        	?>
					    </td>
					    <td>
				    		<?php $dificultad = get_meta('dificultad');
                            if($dificultad)
                        	  echo "<p>".__('Dificultad','NatouraV3')."</p> <p class='meta_result'>".$dificultad."</p>"; 
                        	?>
					    </td>
					    <td class="more_meta_icon"><img src="<?php bloginfo('template_directory'); ?>/images/duracion.png" alt="duracion" width="26" height="32" /></td>
					    <td>
							<?php $duracion = get_meta('duracion');
                            if($duracion)
                        	  echo "<p>".__('Duraci&oacute;n','NatouraV3')."</p> <p class='meta_result'>".$duracion."</p>"; 
                        	?>

					    </td>
					    <td class="more_meta_icon"><img src="<?php bloginfo('template_directory'); ?>/images/temporada.png" alt="temporada" width="26" height="32" /></td>
					    <td>
					    	<?php $temporada = get_meta('temporada');
                            if($temporada)
                        	  echo "<p>".__('Temporada','NatouraV3')."</p> <p class='meta_result'>".$temporada."</p>"; 
                        	?>
					    </td>
					  </tr>
					</table>
				</div>
                
            </div> <!--END info_del_tour_resumen-->

          
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    
        
                    <div class="entry">
                    	<h2><?php the_title(); ?></h2>
                        <?php the_content('<p class="serif">'.__('Read the rest of this entry &raquo;','NatouraV3').'</p>'); ?>
        
                        <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','NatouraV3').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                        <?php the_tags( '<p>'.__('Tags','NatouraV3').': ', ', ', '</p>'); ?>
        
                        <p class="postmetadata alt">
                            <small>
                                <?php _e('This entry was posted','NatouraV3'); ?>
                                <?php /* This is commented, because it requires a little adjusting sometimes.
                                    You'll need to download this plugin, and follow the instructions:
                                    http://binarybonsai.com/wordpress/time-since/ */
                                    /* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
                                <?php _e('on','NatouraV3'); ?> <?php the_time('l, F jS, Y') ?> <?php _e('at','NatouraV3'); ?> <?php the_time() ?>
                                <?php _e('and is filed under','NatouraV3'); ?> <?php the_category(', ') ?>.
                                <?php _e('You can follow any responses to this entry through the','NatouraV3'); ?> <?php post_comments_feed_link('RSS 2.0'); ?> <?php _e('feed','NatouraV3'); ?>.
        
                                <?php if ( comments_open() && pings_open() ) {
                                    // Both Comments and Pings are open ?>
                                    <?php _e('You can <a href="#respond">leave a response</a>, or','NatouraV3'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback</a> from your own site.','NatouraV3'); ?>
        
                                <?php } elseif ( !comments_open() && pings_open() ) {
                                    // Only Pings are Open ?>
                                    <?php _e('Responses are currently closed, but you can','NatouraV3'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"> <?php _e('trackback</a> from your own site','NatouraV3'); ?>.
        
                                <?php } elseif ( comments_open() && !pings_open() ) {
                                    // Comments are open, Pings are not ?>
                                    <?php _e('You can skip to the end and leave a response. Pinging is currently not allowed','NatouraV3'); ?>.
        
                                <?php } elseif ( !comments_open() && !pings_open() ) {
                                    // Neither Comments, nor Pings are open ?>
                                    <?php _e('Both comments and pings are currently closed','NatouraV3'); ?>.
        
                                <?php } edit_post_link(__('Edit this entry','NatouraV3'),'','.'); ?>
        
                            </small>
                        </p>
        
                    </div>
                </div>
        </div> <!--END info_del_tour-->
        
        <!-- Itinerario y info de los d&iacute;as -->
        <?php $testday1 = get_meta('dia1');
        	  if ($testday1)
        {?>   
            <script>
        		$().ready(function() {
					$('.trigger_jtrun').click(function(e) 
					{  
				     e.preventDefault();
				     if ( $(this).text() == 'Ver' )
				     { 
					     $(this).text('Esconder'); 
					     $(this).removeClass('mostrar'); 
					     $(this).addClass('esconder'); 
				     }
				     else
				     { 
				    	 $(this).text('Ver'); 
				    	 $(this).removeClass('esconder');
				     	 $(this).addClass('mostrar'); 
				     }
				      
				      	var n = $('.info_del_dia').length;
				      	for (i=0; i < n; i++) 
				      	{
				         	$('.truncate_more_link').eq(i).click();
				        } 
				     });
				});  

        	</script>
            	
            <h1 id="itinerario_title"><?php _e('Itinerario','NatouraV3'); ?></h1>
            <a href="#" class="trigger_jtrun mostrar" style="display: block;"><?php _e('Ver','NatouraV3'); ?><!--  <?php _e('Esconder','NatouraV3'); ?> --></a>
            
            <div id="info_dias_container">
            	<script>
            		$().ready(function() {
					    $('.contenido_dia').jTruncate({
					    moreText: "<?php _e('Ver','NatouraV3'); ?>",
					    lessText: "<?php _e('Esconder','NatouraV3'); ?>",
					    moreAni: "fast",
					    lessAni: "fast",
					    length: 200
					    });  
					});  

            	</script>	
            		
            		
            	
                <?php
                	$numerodeDias = 16; //Indicar el nÏmero maximo de d'as es decir el q se le indique en los campos creados						
					$i=0;
					do
					  {
					  $i++; //comenzamos a incrementar a i a partir de 0 (q esta 3 lineas màs arriba)
					  $arr_textdia = array("$texto_dia[$i]" => get_meta('dia'.$i));
					  
					  $arr_diaID = array("$diaID[$i]" => "diaID$i");
					  
					  if(get_meta('dia'.$i)):
					   echo '<div class="info_del_dia">';
					   
						   echo '<p><span class="dia">';
						   _e('D&iacute;a','NatouraV3');
						   echo ''.$i.': </span></p>';
						   echo '<div id="'.$arr_diaID["$diaID[$i]"].'" class="contenido_dia">
									  '.strip_tags($arr_textdia["$texto_$dia[$i]"], "<br><br /><strong>").'
						   		 </div>';
							
					   echo '</div>'; //tres lineas arriba con strip_tags removemos el formato para q jTruncate funcione bien
						
						endif;
					  }
					while ($i<=$numerodeDias);
				?>
			<br clear="all" />
            </div><!--END info_dias_container -->
      
      <?php } //END of if(get_meta dia1) so if there's any info about at least the first day display... ?>
                    

     <br clear="all" />

        
            <?php endwhile; else: ?>
        
                <?php _e('<p>Sorry, no posts matched your criteria.</p>','NatouraV3'); ?>
        
        <?php endif; ?>
     
     
     </div> <!--END content_single-->


</div> <!--END CONTENT-->
<br class="clear" />
          
<?php get_footer(); ?>