<div id="comments" class="comments cards-vertical-2 row clearfix">
  <div class="col-md-12">
  	<?php if (post_password_required()) : ?>
  	<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'html5blank' ); ?></p>
  </div>
</div>

	<?php return; endif; ?>

  <?php if (have_comments()) : ?>

  	<h2><?php comments_number(); ?></h2>

  	<ul>
  		<?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
  	</ul>


  <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

  	<p><?php _e( 'Comments are closed here.', 'html5blank' ); ?></p>

  <?php endif; ?>

  <?php // Template for comment_form(), saved to $comment_args ?>
  <?php include ('template-comments.php'); ?>

  <?php // $comment_args from template-comments.php included and used ?>
  <?php comment_form($comment_args); ?>

  </div>
</div>






