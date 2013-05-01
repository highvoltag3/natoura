<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 */
?>
<?php 
	$cur_post_id = get_the_ID();
	$cur_lang = get_cur_language($cur_post_id);
	if ( isset($_GET['lang']) ) { $cur_lang = $_GET['lang']; }

	if (!empty($cur_lang))  {  
		$lang = $cur_lang;
		
		switch ($lang) {
			
			case "en_us";
				$defaults = array(
				  'menu'            => 'Ingles', 
				  'container'       => 'div', 
				  'container_class' => 'menu-english-container',
				  'walker' => new Custom_Walker_Nav_Menu()
				);
			break;
			
			case "es_es";
				$defaults = array(
				  'menu'            => 'Espanol', 
				  'container'       => 'div', 
				  'container_class' => 'menu-spanish-container',
				  'walker' => new Custom_Walker_Nav_Menu()
				);
			break;
			
			case "fr_fr";
				$defaults = array(
				  'menu'            => 'Frances', 
				  'container'       => 'div', 
				  'container_class' => 'menu-french-container',
				  'walker' => new Custom_Walker_Nav_Menu()
				);
			break;
			
			case "gr_de";
				$defaults = array(
				  'menu'            => 'Aleman', 
				  'container'       => 'div', 
				  'container_class' => 'menu-german-container',
				  'walker' => new Custom_Walker_Nav_Menu()
				);
			break;
				
		}
	} else {
		//espa–ol.
			$defaults = array(
				  'menu'            => 'Espanol', 
				  'container'       => 'div', 
				  'container_class' => 'menu-spanish-container',
				  'walker' => new Custom_Walker_Nav_Menu()
				);
	}
	
?>
<div id="fix">
    <div id="sidebar">
                 
                 <div id="sidebar_content">
                 
                    <?php wp_nav_menu($defaults); ?>                       
                        
                    <ul>
                        <?php 	/* Widgetized sidebar, if you have the plugin installed. */
                                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
                        
                        <?php endif; ?> <!--fin de codigo de Widgetized-->
                    </ul>
                    
                 </div> <!--END SIDEBAR CONTENT-->
    </div> <!--END SIDEBAR-->
</div> <!--END FIX-->                        