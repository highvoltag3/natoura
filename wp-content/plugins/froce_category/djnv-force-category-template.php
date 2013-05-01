<?php
/*
Plugin Name: Force Category Template with slung
Plugin URI: http://darionovoa.info original -> http://txfx.net/code/wordpress/force-category-template/
Description: Moded Force Category Template to support Slung also.
Author: Dario Novoa V.
Based on Mark Jaquith Plugin.
Version: 0.2
Author URI: http://darionovoa.info/
*/

function djnv_force_category_template() {
 	
 	//for natouraV3 we need to assign sub-categories templates from their parents and here's how we do it..
 	global $wp_query;

	$cat_ID = get_query_var('cat');
	
	//if is a child cat get parent
	if (is_category()) 
	{
		$parentCatList = get_category_parents($cat_ID,false,',', true);
		
	} 	  
		$parentCatListArray = split(",",$parentCatList);
		$secondParentName = $parentCatListArray[1];
	
	if ( file_exists(TEMPLATEPATH . "/category-" . $secondParentName . '.php') ) 
    {
		include(TEMPLATEPATH . "/category-" . $secondParentName . '.php');
		exit;
	} 

	if ( !is_single() || is_404() ) return; // we only care about single posts

	global $posts, $post, $wp_query;

	$post = $posts[0];
	$categories = get_the_category($post->ID);
		
	
	if ( !count($categories) ) return; // no category with which to work

	foreach ( $categories as $category ) 
	{
		if ( file_exists(TEMPLATEPATH . "/category-" . $category->cat_ID . '.php') ) 
		{
			include(TEMPLATEPATH . "/category-" . $category->cat_ID . '.php');
			exit;
		}
        if ( file_exists(TEMPLATEPATH . "/category-" . $category->category_nicename . '.php') ) 
        {
			include(TEMPLATEPATH . "/category-" . $category->category_nicename . '.php');
			exit;
		}
	}
}

add_action('template_redirect', 'djnv_force_category_template');
?>
