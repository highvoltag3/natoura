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
            	 
                 <div id="content_category">
                 						
					<?php 
						$thisCat = get_category(get_query_var('cat'),false);
						query_posts('posts_per_page=-1&order=ASC&cat='.$thisCat->cat_ID.''); 
					?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                          
                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                
                    
                                <div class="entry">
                                
                            		<?php
                            		if (get_meta('galeria')) 
                                	{
			                 			$galleryID = get_meta('galeria'); 
			                 			$ngg_options = get_option ('ngg_options');  
									    $pictures    = $wpdb->get_results("SELECT t.*, tt.* FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ON t.gid = tt.galleryid WHERE t.gid = '$galleryID' AND tt.exclude != 1 ORDER BY tt.$ngg_options[galSort] $ngg_options[galSortDir] ");
									    $mainURL 	 = get_bloginfo(url);
										
										$path     = $mainURL."/".$pictures[0]->path."/";
										$filename = $pictures[0]->filename;
										$imgTitle = $pictures[0]->title;
										if( !empty($filename) )
										{
							    			echo '
							    			<div class="tour_thumb">
							    				<img src="'.$path.$filename.'" alt="'.$imgTitle.'" title="'. $pictures[0]->alttext .'" />
							    			</div>';
							    		}
							    	}
									?>
                                	
                                	<h3><a href="<?php the_permalink(); ?>?lang=<?php echo the_curlang(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                    <?php the_excerpt(); ?>
                    					
                    				<div class="more_meta">
                    					<table border="0" cellspacing="0" cellpadding="0">
										  <tr>
										    <td class="more_meta_icon"><img src="<?php bloginfo('template_directory'); ?>/images/region.png" alt="region" width="43" height="34" /></td>
										    <td>
										    	<?php $region = get_meta('region');
	                                            if($region)
	                                        	  echo "<p>".__('Regi&oacute;n','NatouraV3')."</p> <p class='meta_result'>".$region."</p>"; 
	                                        	?>
										    </td>
										    <td class="more_meta_icon"><img src="<?php bloginfo('template_directory'); ?>/images/dificultad_facil.png" alt="dificultad_facil" width="32" height="32" /></td>
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
                    				
                                    <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','NatouraV3').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                    <?php the_tags( '<p>'.__('Tags','NatouraV3').': ', ', ', '</p>'); ?>
                    				
                    				<br class="clear"> <!-- needed!! -->
                    				
                                </div> <!-- end entry -->
                            </div> <!-- end post -->
                       
            		<?php // comments_template(); ?>
                    
                        <?php endwhile; else: ?>
                    
                            <?php _e('<p>Sorry, no posts matched your criteria.</p>','NatouraV3'); ?>
                    
                    <?php endif; ?>
                 
                 
                 </div> <!--END content_page-->

          
          </div> <!--END CONTENT-->
	      <br class="clear" />
          
<?php get_footer(); ?>