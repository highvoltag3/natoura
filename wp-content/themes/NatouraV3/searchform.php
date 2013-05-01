<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<label class="hidden" for="s"></label>
<div><input name="s" type="search" id="s" value="<?php _e('&iquest;Qu&eacute; desea buscar?...', 'NatouraV3'); ?>" onfocus="if (this.value == '<?php _e('&iquest;Qu&eacute; desea buscar?...', 'NatouraV3'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('&iquest;Qu&eacute; desea buscar?...', 'NatouraV3'); ?>';}"  />
<input type="image" src="<?php bloginfo('template_directory'); ?>/images/search_lupa.png" id="searchsubmit" value="&nbsp;"  alt="<?php _e('BUSCAR', 'NatouraV3'); ?>" />
</div>
<?php if (isset($_GET['lang'])) {
		$lang = $_GET['lang']; 
		echo '<input type="hidden" name="lang" value="'.$lang.'" />';
		} else {
		echo '<input type="hidden" name="lang" value="es_es" />';
		}
?>
</form>