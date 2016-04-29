<?php
  $published_posts = wp_count_posts()->publish;
  $posts_per_page = get_option('posts_per_page');

  if ($published_posts > $posts_per_page) {
?>
  <!-- pagination -->
  <div class="pagination">
  	<?php html5wp_pagination(); ?>
  </div>
  <!-- /pagination -->
<?php } ?>