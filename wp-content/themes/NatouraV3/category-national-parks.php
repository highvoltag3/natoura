<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 * Region and Parks template
 */
?>
<head>
	    <style rel="stylesheet" type="text/css" />
	    	body  {
			color: #4D4D4D;
			font-family: Arial,Helvetica,sans-serif;
			}
	    
			#content h1 {
			color: #008193;
			font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
			font-size: 1.8em;
			margin-left: 0;
			font-weight: normal;
			}
			#content_category {
			font-size: 0.85em;
			}
	    </style>
</head>

<div id="content">
            	 
                 <div id="content_category">
                 						
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <h1><?php the_title(); ?></h1>
                                          
                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                
                    
                                <div class="entry">
                                    <?php the_content('<p class="serif">'.__('Read the rest of this entry &raquo;','NatouraV3').'</p>'); ?>
                    
                                    <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','NatouraV3').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                    <?php the_tags( '<p>'.__('Tags','NatouraV3').': ', ', ', '</p>'); ?>
                                        
                                </div>
                            </div>
                       
            		<?php // comments_template(); ?>
                    
                        <?php endwhile; else: ?>
                    
                            <?php _e('<p>Sorry, no posts matched your criteria.</p>','NatouraV3'); ?>
                    
                    <?php endif; ?>
                 
                 
                 </div> <!--END content_page-->

          
          </div> <!--END CONTENT-->
	      <br clear="all" />