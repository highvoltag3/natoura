<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */

////////// New stuff move after the new theme is finished..


if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'tours',
		'id'   => 'sidebar-tours'
	));
}

/// Register custom walker for the sub-categories in the sidebar custom nav menu
	if ( function_exists( 'register_nav_menu' ) ) {
		register_nav_menu( 'menu_lateral', 'Menu Lateral' );
	}
	
	add_action('wp_loaded','register_nav_menu_class');
	
	function register_nav_menu_class(){
	
		class Custom_Walker_Nav_Menu extends Walker_Nav_Menu  {
	
		    function start_el(&$output, $item, $depth, $args) {
				global $wp_query;
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
				$class_names = $value = '';
		
				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = 'menu-item-' . $item->ID;
		
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';
		
				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
				$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		
		
				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		
				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
		
				if($item->object == 'category'){
					$child_cats = wp_list_categories('title_li=&echo=0&child_of='.$item->object_id);
					if( $child_cats ){
						$item_output .= '<ul class="sub-menu">' .$child_cats. '</ul>';
					}
			}
	
			$item_output .= $args->after;
	
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
	
		    }
		}
	}
////

// custom admin login logo
	function custom_login_logo() {
		echo '<style type="text/css">
		.login h1 a { background-image: url('.get_bloginfo('template_directory').'/images/logo_natoura_wp_admin.png) !important; height: 130px; background-size: auto; }
		</style>';
	}
	add_action('login_head', 'custom_login_logo');
/////

//remove no categories
function bm_dont_display_it($content) {
  if (!empty($content)) {
    $content = str_ireplace('<li>' .__( "No categories" ). '</li>', "", $content);
  }
  return $content;
}
add_filter('wp_list_categories','bm_dont_display_it');
//////


// load_theme_textdomain(domain-name); remplazado por lo siguiente

//Translate the Theme :D
if (isset($_GET['lang'])) {
	$lang = $_GET['lang'];

		$setlang = $lang;
		
		 define( 'WPLANG', $setlang );

		  if( $locale != $setlang ) {
		    $locale = $setlang;
		    load_default_textdomain();
		  }
} 
load_theme_textdomain('NatouraV3', get_template_directory().'/lang');

//REGISTRAR SIDEBARS
if (function_exists('register_sidebar'))
{

//Sidebar Widgets	
register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
		'name' => 'Barra_Lateral' 
));
	

//Footer Widgets

register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
'name' => 'Cuadro Sup. Izq. Footer',
'description'   => 'Cuadro superior izquierdo del Footer'
));

register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
'name' => 'Cuadro Sup. dere. Footer',
'description'   => 'Cuadro superior derecho del Footer'
));

register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
'name' => 'Cuadro Inf. Izq. Footer',
'description'   => 'Cuadro inferior izquierdo del Footer'
));

register_sidebar(array(
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
'name' => 'Cuadro Inf. dere. Footer',
'description'   => 'Cuadro inferior derecho del Footer'
));

}

//Limita la cantidad del texto del Excerpt/Content usando excerpt(x)/content(x) donde x es la cantidad de palabras. USADO EN INDEX.PHP
function content($num) {  
$theContent = get_the_content(); 
$link = get_permalink();
$limit = $num+1;  
$content = explode(' ', $theContent, $limit);  
array_pop($content);  
$content = implode(" ",$content)."<a href=".$link.">[...]</a>";  

// Vamos a revisar si el contenido tiene m&oacute;s de 40 palabras de ser as&iacute; le pondremos el ( + )
if ( str_word_count ($content) < 20 ) {
	echo $content;
	} else {
	echo $content;
	}
}    

//Limita la cantidad del Custom Field indicado. USADO EN SIGLE.PHP para los d&iacute;as
function customf($num, $cf_id) {  
$limit = $num+1;  
$customf = explode(' ', $cf_id, $limit);  
array_pop($customf);  
$customf = implode(" ",$customf)."[...]";  
echo $customf;  
}  

//Personalizar como se ven los comentarios.
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php //echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }
?>
<?php
//Breadbrumbs personalizados.
function el_breadcrumb() {
	if (!is_home()) {
		$home = __('Inicio', 'NatouraV3');
		echo "<a href='".get_option('home')."'>".$home."</a> &raquo; ";
		if (is_category()) {
			$current_category = single_cat_title("", false); 
				echo $current_category;
		}
		if (is_single()) {
		//Lets reset the query so it wont get wrong values
			wp_reset_query();
		//get and print the categories the post has assigned
			foreach((get_the_category()) as $category) {
				//get cant_ID to feed get_category_link function to get the URL
				$cat_id =  $category->cat_ID;
				//get the name of the category Daaa I need it for the link name.
				$cat_name = $category->cat_name;
				//Here we get the URL
				$category_link = get_category_link($cat_id);
    			//Print the link for each category assigned.
    			echo '<a href="'.$category_link.'" title="'.$cat_name.'">'.$category->cat_name.'</a> | '; 
			} 
			//Finaly at the end of all we add the >>
			echo "&raquo; ";
			//Then the title of the current post.
			$the_title = single_post_title("", false);
			echo "<span class='bread_actual'>".$the_title."</span>";
		}
		if (is_page()) {
			wp_reset_query();
			$the_title = single_post_title("", false);
			echo "<span class='bread_actual'>".$the_title."</span>";
		}
	}
}

// Multi lenguaje XILI Functions. USADO EN TODO EL SITE

function natoura_xili_language_list($before = '<li>', $after ='</li>') {
	$listlanguages = get_terms(TAXONAME, array('hide_empty' => false));
			$currenturl = get_bloginfo('wpurl') .'/?';
			$a = "";
			$lines = array();
			$lineorder = array('es_es'=>1,'en_us'=>2,'fr_fr'=>3,'gr_de'=>4); /* line to modify where to declare the top languages */
			foreach ($listlanguages as $language) {
				if ($before=='<li>') {
					if (the_curlang() == $language->slug) { 
						$beforee = '<li class="current-lang" >';
					} else {
						$beforee ='<li>';
					}
				}
				if (isset($lineorder[$language->slug])) { 
					$key = $lineorder[$language->slug]; /* set line sort */
				} else {
					$key = 1000 + $language->term_id; /* if array is empty */
				} 
				$lines[$key] = $beforee ."<a href='".$currenturl.QUETAG."=".$language->slug."' title='".__('Posts selected',THEME_TEXTDOMAIN)." ".__('in '.$language->description,THEME_TEXTDOMAIN)."'>"." <img src='".get_bloginfo('template_directory')."/images/flags/".$language->slug.".png' alt='' /></a>".$after;
	 
			}
			ksort($lines); /*sort lines by key */
			foreach ($lines as $line) {
				$a .= $line;
			}
	echo $a;
}
add_action('xili_language_list','natoura_xili_language_list',10,3); /* activate my_xili... instead the default in plugin */


//Agregar post_thumbnail
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails');
	set_post_thumbnail_size( 100, 100 ); // 100 pixels wide by 100 pixels tall, box resize mode
}

// smart jquery inclusion
if (!is_admin()) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"), false);
	wp_enqueue_script('jquery');
}

//check lang and change link to park according to the current lang
function checkLangParks() {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us";
				echo "english/national-parks/";
				
			break;
			
			case "es_es";
				echo "espanol/parques-nacionales/";
				
			break;
			
			case "fr_fr";
				echo "francais/parcs-nationaux/";
				
			break;
			
			case "gr_de";
				echo "deutsch/nationalparks/";
				
			break;
				
		}
	} else {
		//espaÐol.
			echo "espanol/parques-nacionales/";

	}
}
//check lang to do X
function checkLangRegions() {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us";
				echo "english/regions/";
				
			break;
			
			case "es_es";
				echo "espanol/regiones/";
				
			break;
			
			case "fr_fr";
				echo "francais/regions-francais/";
				
			break;
			
			case "gr_de";
				echo "deutsch/landschaften/";
				
			break;
				
		}
	} else {
		//espaÐol.
			echo "espanol/regiones/";

	}
}

function change_wp_search_size($queryVars) {
	if ( isset($_REQUEST['s']) ) // Make sure it is a search page
		$queryVars['posts_per_page'] = 30; // Change 10 to the number of posts you would like to show
	return $queryVars; // Return our modified query variables
}
add_filter('request', 'change_wp_search_size'); // Hook our custom function onto the request filter

function formsLang() {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us":
				add_filter("gform_name_first", "change_name_first_en_us", 10, 2);
				function change_name_first_en_us($label, $form_id){
				    return "First Name";
				}
				add_filter("gform_name_last", "change_name_last_en_us", 10, 2);
				function change_name_last_en_us($label, $form_id){
				    return "Last Name";
				}
				add_filter("gform_address_street", "change_address_street_en_us", 10, 2);
				function change_address_street_en_us($label, $form_id){
				    return "Address Street";
				}
				add_filter("gform_address_street2", "change_address_street2_en_us", 10, 2);
				function change_address_street2_en_us($label, $form_id){
				    return "Address Street 2";
				}
				add_filter("gform_address_street", "change_address_city_en_us", 10, 2);
				function change_address_city_en_us($label, $form_id){
				    return "Address City";
				}
				add_filter("gform_address_state", "change_address_state_en_us", 10, 2);
				function change_address_state_en_us($label, $form_id){
				    return "Address State";
				}
				add_filter("gform_address_zip", "change_address_zip_en_us", 10, 2);
				function change_address_zip_en_us($label, $form_id){
				    return "Address Zip";
				}
				add_filter("gform_address_country", "change_address_country_en_us", 10, 2);
				function change_address_country_en_us($label, $form_id){
				    return "Address Country";
				}
				
			break;
			
			case "es_es":
				add_filter("gform_name_first", "change_name_first_es_es", 10, 2);
				function change_name_first_es_es($label, $form_id){
				    return "Nombre";
				}
				add_filter("gform_name_last", "change_name_last_es_es", 10, 2);
				function change_name_last_es_es($label, $form_id){
				    return "Apellido";
				}
				add_filter("gform_address_street", "change_address_street_es_es", 10, 2);
				function change_address_street_es_es($label, $form_id){
				    return "Dirección línea 1";
				}
				add_filter("gform_address_street2", "change_address_street2_es_es", 10, 2);
				function change_address_street2_es_es($label, $form_id){
				    return "Dirección línea 2";
				}
				add_filter("gform_address_street", "change_address_city_es_es", 10, 2);
				function change_address_city_es_es($label, $form_id){
				    return "Ciudad";
				}
				add_filter("gform_address_state", "change_address_state_es_es", 10, 2);
				function change_address_state_es_es($label, $form_id){
				    return "Estado / Provincia / Región";
				}
				add_filter("gform_address_zip", "change_address_zip_es_es", 10, 2);
				function change_address_zip_es_es($label, $form_id){
				    return "Código Postal";
				}
				add_filter("gform_address_country", "change_address_country_es_es", 10, 2);
				function change_address_country_es_es($label, $form_id){
				    return "Páis";
				}
				
			break;
			
			case "fr_fr":
				add_filter("gform_name_first", "change_name_first", 10, 2);
				function change_name_first($label, $form_id){
				    return "Prénom";
				}
				add_filter("gform_name_last", "change_name_last", 10, 2);
				function change_name_last($label, $form_id){
				    return "Nom de famille";
				}
				add_filter("gform_address_street", "change_address_street", 10, 2);
				function change_address_street($label, $form_id){
				    return "Adresse ligne 1";
				}
				add_filter("gform_address_street2", "change_address_street2", 10, 2);
				function change_address_street2($label, $form_id){
				    return "Adresse ligne 2";
				}
				add_filter("gform_address_street", "change_address_city", 10, 2);
				function change_address_city($label, $form_id){
				    return "Ville";
				}
				add_filter("gform_address_state", "change_address_state", 10, 2);
				function change_address_state($label, $form_id){
				    return "Etat / Province / Région";
				}
				add_filter("gform_address_zip", "change_address_zip", 10, 2);
				function change_address_zip($label, $form_id){
				    return "Code postal";
				}
				add_filter("gform_address_country", "change_address_country", 10, 2);
				function change_address_country($label, $form_id){
				    return "Pays";
				}
				
			break;
			
			case "gr_de":
				add_filter("gform_name_first", "change_name_first", 10, 2);
				function change_name_first($label, $form_id){
				    return "Vorname";
				}
				add_filter("gform_name_last", "change_name_last", 10, 2);
				function change_name_last($label, $form_id){
				    return "Familienname";
				}
				add_filter("gform_address_street", "change_address_street", 10, 2);
				function change_address_street($label, $form_id){
				    return "Adresse 1 Zeile";
				}
				add_filter("gform_address_street2", "change_address_street2", 10, 2);
				function change_address_street2($label, $form_id){
				    return "Adresse 2 Zeile";
				}
				add_filter("gform_address_street", "change_address_city", 10, 2);
				function change_address_city($label, $form_id){
				    return "Bundesland";
				}
				add_filter("gform_address_state", "change_address_state", 10, 2);
				function change_address_state($label, $form_id){
				    return "Stadt";
				}
				add_filter("gform_address_zip", "change_address_zip", 10, 2);
				function change_address_zip($label, $form_id){
				    return "Postleitzahl";
				}
				add_filter("gform_address_country", "change_address_country", 10, 2);
				function change_address_country($label, $form_id){
				    return "Land";
				}
				
			break;
				
		}
	} else 
			{
				add_filter("gform_name_first", "change_name_first_es_es", 10, 2);
				function change_name_first_es_es($label, $form_id){
				    return "Nombre";
				}
				add_filter("gform_name_last", "change_name_last_es_es", 10, 2);
				function change_name_last_es_es($label, $form_id){
				    return "Apellido";
				}
				add_filter("gform_address_street", "change_address_street_es_es", 10, 2);
				function change_address_street_es_es($label, $form_id){
				    return "Dirección línea 1";
				}
				add_filter("gform_address_street2", "change_address_street2_es_es", 10, 2);
				function change_address_street2_es_es($label, $form_id){
				    return "Dirección línea 2";
				}
				add_filter("gform_address_street", "change_address_city_es_es", 10, 2);
				function change_address_city_es_es($label, $form_id){
				    return "Ciudad";
				}
				add_filter("gform_address_state", "change_address_state_es_es", 10, 2);
				function change_address_state_es_es($label, $form_id){
				    return "Estado / Provincia / Región";
				}
				add_filter("gform_address_zip", "change_address_zip_es_es", 10, 2);
				function change_address_zip_es_es($label, $form_id){
				    return "Código Postal";
				}
				add_filter("gform_address_country", "change_address_country_es_es", 10, 2);
				function change_address_country_es_es($label, $form_id){
				    return "Páis";
				}
				
			}
}

function reservURL() {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us";
				$url = "http://natoura.com/reservations-en?lang=en_us";
				echo $url;
			break;
			
			case "es_es";
				$url = "http://natoura.com/reservaciones?lang=es_es";
				echo $url;
				
			break;
			
			case "fr_fr";
				$url = "http://natoura.com/reservations?lang=fr_fr";
				echo $url;
				
			break;
			
			case "gr_de";
				$url = "http://natoura.com/reservierungen?lang=gr_de";
				echo $url;
				
			break;
				
		}
	} else 
	{
		//ask XILI the lang
			$current_lang = the_curlang(); //function from XILI
			
			switch ($current_lang) 
			{
			
				case "en_us";
					$url = "http://natoura.com/reservations-en?lang=en_us";
					echo $url;
				break;
				
				case "es_es";
					$url = "http://natoura.com/reservaciones?lang=es_es";
					echo $url;
					
				break;
				
				case "fr_fr";
					$url = "http://natoura.com/reservations?lang=fr_fr";
					echo $url;
					
				break;
				
				case "gr_de";
					$url = "http://natoura.com/reservierungen?lang=gr_de";
					echo $url;
					
				break;
				
			}
	}
}

function contactURL() {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us";
				$url = "http://natoura.com/contact_us?lang=en_us";
				echo $url;
				
			break;
			
			case "es_es";
				$url = "http://natoura.com/contactenos?lang=es_es";
				echo $url;
				
			break;
			
			case "fr_fr";
				$url = "http://natoura.com/contactez-nous?lang=fr_fr";
				echo $url;
				
			break;
			
			case "gr_de";
				$url = "http://natoura.com/kontakt?lang=gr_de";
				echo $url;
				
			break;
				
		}
	} else 
	{
		//ask XILI the lang
			$current_lang = the_curlang();
			
			switch ($current_lang) 
			{
			
				case "en_us";
					$url = "http://natoura.com/contact_us?lang=en_us";
					echo $url;
					
				break;
				
				case "es_es";
					$url = "http://natoura.com/contactenos?lang=es_es";
					echo $url;
					
				break;
				
				case "fr_fr";
					$url = "http://natoura.com/contactez-nous?lang=fr_fr";
					echo $url;
					
				break;
				
				case "gr_de";
					$url = "http://natoura.com/kontakt?lang=gr_de";
					echo $url;
					
				break;	
			}

	}
}

/*function checkLangAndDo () {
	if (isset($_GET['lang'])) {
		$lang = $_GET['lang'];
		
		switch ($lang) {
			
			case "en_us";
				$des_catID = 194;
				
			break;
			
			case "es_es";
				$des_catID = 112;
				
			break;
			
			case "fr_fr";
				$des_catID = 203;
				
			break;
			
			case "gr_de";
				$des_catID = 212;
				
			break;
				
		}
	} else {
		//espaÐol.
			$des_catID = 112;

	}
}*/

?>