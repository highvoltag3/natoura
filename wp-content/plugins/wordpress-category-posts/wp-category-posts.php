<?php
/*
Plugin Name: List Posts in Category
Description: List the posts in a specific category
Author: Watershed Studio, LLC MODED BY DARIO NOVOA
Version: 2.1
Author URI: http://darionovoa.info/
*/ 

//Listar las categorías con los respectivos post que contiene
/* Parte del código pertenece al plugin WordPress Category Posts de Watershed Studio, LLC y fue modificado por Dario Novoa*/ 

function wp_cat_posts( $catID, $numofpost, $order, $orderby, $catClass ) {
	$catID = (int) $catID;
	$category = get_cat_name($catID);
	$entradas = get_posts(array('category' => $catID, 'numberposts' => $numofpost, 'order' => $order, 'orderby' => $orderby));
	
	echo "<li class='".$catClass."'>".$category."</li>";

	foreach( (array) $entradas as $entrada ) {
		echo '<li><a href="'.get_permalink($entrada->ID).'?lang='.the_curlang().'">' . $entrada->post_title . '</a></li>';
	}
}
?>