<?php
/*
Plugin Name: Change Font/-size
Plugin URI: http://bueltge.de/wp-schift-veraendern-fontsize-und-font-plugin/140/
Description: Change the size and style of fonts via Link.
Version: 1.1
Author: Frank Bueltge
Author URI: http://bueltge.de/
*/

/*
Instruction:

1. Copy the folder with the php- and the js-file in your Plugin-Folder (/wp-content/plugins/)
2. Edit content or template of your theme.
                <a href="javascript:fname('style','id');" >fontstyle</a>
                <a href="javascript:fsize('size','unit','id');" >fontsize</a>
		
		Example:
		<a href="javascript:fname('serif','content');" >fontstyle serif on ID content</a>
		<a href="javascript:fsize('1.2','em','content');" >fontsize 1.2em on ID content</a>
		
3. Activate this Plugin in the Admin-area
*/

// Function for include js
function change_fontsize_header() {
	$change_fontsize_pluginpath = get_option('siteurl')."/wp-content/plugins/change_fontsize";
	$change_fontsizeHead.= "\n\t<script type=\"text/javascript\" src=\"".$change_fontsize_pluginpath."/change_fontsize.js\"></script>\n";
	print($change_fontsizeHead);
}

// Include js in the <head>-area
if (function_exists('add_action')) {
	add_action('wp_head', 'change_fontsize_header');
}
?>