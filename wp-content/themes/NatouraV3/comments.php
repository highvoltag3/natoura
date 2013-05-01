<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'NatouraV3'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments', 'NatouraV3'); ?>.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

	
	<h3 id="comments"><?php comments_number(__('No Responses', 'NatouraV3'), __('One Response', 'NatouraV3'), __('% Responses', 'NatouraV3') );?> &#8220;<?php the_title(); ?>&#8221;</h3>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
     
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed', 'NatouraV3'); ?>.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>


<div id="respond">

<h3><?php comment_form_title( __('Leave a Reply', 'NatouraV3'), __('Leave a Reply to %s', 'NatouraV3')); ?></h3>


<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>

<p><?php _e('You must be', 'NatouraV3'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"> <?php _e('logged in</a> to post a comment', 'NatouraV3'); ?>.</a></p>
<?php else : ?>


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>


<p><?php _e('Logged in as', 'NatouraV3'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"> <?php _e('Log out', 'NatouraV3'); ?> &raquo;</a></p>

<?php else : ?>


<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small> <?php _e('Name', 'NatouraV3'); if ($req) __('required', 'NatouraV3'); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('Mail (will not be published)', 'NatouraV3'); if ($req) __('required', 'NatouraV3'); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'NatouraV3'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'NatouraV3'); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
