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

					<?php if (have_posts()) : ?>
				
						<h2 class="pagetitle"><?php _e('Search Results', 'NatouraV3'); ?></h2>
				
						<div class="navigation">
							<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries', 'NatouraV3')) ?></div>
							<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;', 'NatouraV3')) ?></div>
						</div>
						<br />
						<br />
				
						<?php while (have_posts()) : the_post(); ?>
				
							<div <?php post_class(); ?>>
								<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'NatouraV3'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				
								<p class="postmetadata"><?php the_tags(__('Tags:', 'NatouraV3') . ' ', ', ', '<br />'); ?> </p>
							</div>
				
						<?php endwhile; ?>

				
					<?php else : ?>
				
						<h2 class="center"><?php _e('No posts found. Try a different search?', 'NatouraV3'); ?></h2>
						<?php get_search_form(); ?>
				
					<?php endif; ?>


				</div>
</div>

<br clear="all" />
          
<?php get_footer(); ?>
