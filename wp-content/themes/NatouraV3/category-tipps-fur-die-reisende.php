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
                 						
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                        <h1><?php the_title(); ?></h1>
                                          
                            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                                
                    
                                <div class="entry">
                                	<table width="210" cellpadding="10" align="right">
                										<tbody>
                                      <tr bgcolor="#ffffcc">
                                      <td bgcolor="#dde6ea">
                                      <h1>Tipps f&Yuml;r die Reisende:</h1>
                                      <h2><strong>Vor der Reise</strong></h2>
                                      <ul>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/geldangelegenheiten-und-wahrungsumstellung?lang=gr_de">Geldangelegenheiten und W&auml;hrungsumstellung</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/visa?lang=gr_de">Visa</a></li><li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/flughafenausreisesteuer?lang=gr_de">Flughafenausreisesteuer</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/gesundheit?lang=gr_de">Gesundheit</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/nutzliche-information-vor-ihrer-ankunft-in-caracas?lang=gr_de">N&uuml;tzliche Information vor Ihrer Ankunft in Caracas</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/flugbestatigung?lang=gr_de">Flugbest&auml;tigung</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/klima-und-kleidung?lang=gr_de">Klima und Kleidung</a></li>
                                      </ul>
                                      <ul></ul>
                                      <h2><strong>In Venezuela</strong></h2>
                                      <ul>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/kultur-und-religion?lang=gr_de">Kultur und Religion</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/umwelt?lang=gr_de">Umwelt</a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/sicherheit?lang=gr_de">Sicherheit  </a></li><li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/telefon-und-email?lang=gr_de">Telefon und Email </a></li>
                                        <li><a href="http://natoura.com/new/deutsch/tipps-fur-die-reisende/essen-trinken?lang=gr_de">Essen &amp; Trinken</a></li>                     
                                      </ul>
                                      </td>
                                      </tr>
                                    </tbody>
                                  </table>
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
                       
            		<?php // comments_template(); ?>
                    
                        <?php endwhile; else: ?>
                    
                            <?php _e('<p>Sorry, no posts matched your criteria.</p>','NatouraV3'); ?>
                    
                    <?php endif; ?>
                 
                 
                 </div> <!--END content_page-->

          
          </div> <!--END CONTENT-->
	      <br clear="all" />
          
<?php get_footer(); ?>