<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	  <?php
	    $articleClasses = array(
	      'cards-vertical-2',
	      'clearfix',
	      'row',
	    );
	  ?>
	  <!-- article -->
	  <article id="post-<?php the_ID(); ?>" <?php post_class( $articleClasses ); ?>>

	    <!-- post thumbnail -->
	    <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
	      <header class="entry-header col-md-12">
	        <div class="image">
	          <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
	        </div>
	      </header><!-- .entry-header -->
	    <?php endif; ?>
	    <!-- /post thumbnail -->

	    <div class="entry-content col-md-12">
	      <div class="entry-meta">
	        <i class="fa fa-clock-o" aria-hidden="true"></i>
	        <span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
	        <?php
	          $categories = get_the_category();
	          $cat_slug = $categories[0]->slug;

	          if ( ! empty( $categories ) ) {
	            echo '<span class="divider">&#8226;</span>';
	            echo '<span class="entry-category label label-'. $cat_slug .'">';
	              echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
	            echo '</span>';
	          }
	        ?>
	        <span class="divider">&#8226;</span>
	        <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
	        <?php if ( current_user_can('edit_posts') ) { echo '<span class="divider">&#8226;</span>'; } ?>
	        <?php edit_post_link(); ?>
	      </div><!-- .entry-meta -->

	      <!-- post title -->
	      <h2 class="entry-title">
	        <?php the_title(); ?>
	      </h2>
	      <!-- /post title -->

	      <?php the_content(); ?>
	    </div>
	    <footer class="entry-meta col-md-12">
	      <?php edit_post_link(); ?>
	      <?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
	    </footer><!-- .entry-meta -->

	  </article>
	  <!-- /article -->


			<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
