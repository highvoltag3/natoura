<?php
/**
 * @package WordPress
 * @subpackage Natoura3.0_Theme
 * by Dario Novoa V.
 * darionovoa@ideartte.com
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="keywords" content="<?php _e('travel,latin america,south america,caribbean,holiday,vacation,small group,group holiday,flight,international flights,domestic flights,ecotourism,Venezuela,green tourism,andes,roraima,amazon,Orinoco delta,angel falls,canaima,kavac,paramo,pico boliar,llanos,Caribbean,wildlife safari,los roques,margarita island,lohas','NatouraV3'); ?>" />
    <meta name="description" content="<?php _e('Natoura is a tour operator who is specialized in organizing safe and exciting eco & adventure tours throughout the beautiful and diverse country of Venezuela.','NatouraV3'); ?>" />
    <meta name="title" content="<title><?php _e('Natoura :: Specializing in Adventure Travel and Ecotourism throughout Venezuela since 1991.', 'NatouraV3'); ?></title>" />
    <meta http-equiv="content-language" content="en,es,de,fr" />
    
   <title><?php _e('Natoura :: Specializing in Adventure Travel and Ecotourism throughout Venezuela since 1991.', 'NatouraV3'); ?></title>
     
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/uniform.default.css" type="text/css" media="screen" />


<?php wp_head(); ?>    

    <!--[if lte IE 7]>
        <script type="text/javascript"> 
            /*Load jQuery if not already loaded*/ 
            if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>");  var __noconflict = true; } 
            var IE6UPDATE_OPTIONS = {
                icons_path: "http://static.ie6update.com/hosted/ie6update/images/",
                message: "<?php _e('This site cannot be rendered correctly, Internet Explorer is missing updates required to view this site. Click here to update...', 'NatouraV3'); ?>"
            }
        </script>
        <script type="text/javascript" src="http://static.ie6update.com/hosted/ie6update/ie6update.js"></script>
	<![endif]-->
   
    <!--[if lte IE 9]>
           <link href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" rel="stylesheet" type="text/css" /> 
    <![endif]-->
     <!--[if IE 8]>
          <style>
           #fix, #sidebar { width: 209px; } /*this is an IE8 Only issue the strangest thing IE9 nor IE7 suffer from an extra pixel.*/ 
          </style> 
    <![endif]-->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.fancybox-1.3.1.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/s3Slider.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jtruncate.pack.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>
	
	<!-- Google Analitics code. -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-23678796-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>

</head>

<body>

	<div id="wrapper">
    	<div id="container">
          <div id="header">
           	<div id="badge"><a href="http://adventure.nationalgeographic.com/adventure/outfitter_profile/id161"></a></div>
            <div id="logo"><h1><a href="<?php bloginfo('wpurl'); ?>"><span class="hidden">NATOURA</span></a></h1></div>
            <!-- 20 AÑOS -->
            <div id="an"> <?php $current_lang = the_curlang(); if ($current_lang == 'fr_fr') { echo '<a href="http://www.petitfute.com/adresse/etablissement/id/212837/natoura-adventure-tours"><img src="http://www.petitfute.com/media/plaque2011.png"/></a>'; } else if ($current_lang == 'en_us') { echo '<a href="http://www.footprinttravelguides.com/"><img src="' . get_bloginfo('template_directory') . '/images/footprints.jpg"/></a>'; } ?> </div> <!-- 20 AÑOS -->
            <div id="extrainfo">
            	<div id="social">
            		<a href="mailto:&#105;&#110;&#102;&#111;&#064;&#110;&#097;&#116;&#111;&#117;&#114;&#097;&#046;&#099;&#111;&#109;"><img src="<?php bloginfo('template_directory'); ?>/images/icono_arroba.png" alt="icono_arroba" width="34" height="34" /></a>
					<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icono_rss.png" alt="icono_rss" width="34" height="34" /></a>
					<a href="https://www.facebook.com/pages/Natoura-Travel-Adventure-Tours/144636898987747"><img src="<?php bloginfo('template_directory'); ?>/images/icono_facebook.png" alt="icono_facebook" width="34" height="34" /></a>
            	</div>
            	<div id="contact">
            		<a href="<?php contactURL(); ?>">
            			<p><?php _e("Cont&aacute;ctenos",'NatouraV3'); ?></p>
            			<img src="<?php bloginfo('template_directory'); ?>/images/icono_contacto.png" alt="icono_contacto" width="28" height="34" />
            		</a>
            	</div>
            	<div id="callus">
            		<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
            		<a href="skype:joseluistroconis6231?call">
            			<p><?php _e("Ll&aacute;menos",'NatouraV3'); ?></p>
            			<img src="<?php bloginfo('template_directory'); ?>/images/icono_llamada.png" alt="Skype Meª!" width="28" height="34" />
            		</a>
            	</div>
            	<div id="reserv">
            		<a href="<?php reservURL(); ?>">
            			<p><?php _e("Reserve su vuelo a <br /><span>Venezuela</span>",'NatouraV3'); ?></p>
            			<img src="<?php bloginfo('template_directory'); ?>/images/icono_reserva.png" alt="icono_reserva" width="28" height="34" />
            		</a>
            	</div>
            </div> <!-- end extrainfo -->
            <div id="toolbar">
            	<span class="flags_cont"><?php natoura_xili_language_list(); ?></span> 
            	<ul id="toolbar_right" class="fr">
            		<li><?php if(function_exists('chgfontsize_display_options')) { chgfontsize_display_options(); } ?></li>
                	<li class="search_bar"><?php include (TEMPLATEPATH . '/searchform.php'); ?></li>                    
                </ul>
            </div>
            <span id="#top"></span>
		  </div> <!--END HEADER-->