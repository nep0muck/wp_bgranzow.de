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
	        <span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php the_date(); ?> - <?php the_time(); ?></span>
	        <?php
	          $categories = get_the_category();
	          $cat_slug = $categories[0]->slug;

	          if ( ! empty( $categories ) ) {
	            echo '<span class="divider">&#8226;</span>';
	            echo '<span class="entry-category">';
	              echo '<a class="label label-'. $cat_slug .'" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
	            echo '</span>';
	          }
	        ?>
	        <?php if (comments_open( get_the_ID() ) ) {
	          echo '<span class="divider">&#8226;</span>';
	          echo '<span class="comments">';
	          comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); echo '</span>';
	        } ?>
	        <?php if ( current_user_can('edit_posts') ) {
	        	echo '<span class="divider">&#8226;</span>';
		        echo '<span class="edit">';
		        	edit_post_link();
		        echo "</span>";
	        } ?>
	      </div><!-- .entry-meta -->

	      <!-- post title -->
	      <h2 class="entry-title">
	        <?php the_title(); ?>
	      </h2>
	      <!-- /post title -->

				<p class="lead"><?php the_field('teasertext', false, false); ?></p>

				<?php

					if ( have_rows('flexible_post_content') ):

						// loop through the rows of data
						while ( have_rows('flexible_post_content') ) : the_row(); ?>

							<?php if( get_row_layout() == 'textfield_block' ): ?>

								<?php get_template_part( 'partials/textfield-block' );	?>

							<?php elseif( get_row_layout() == 'teasertext_block' ):  ?>

								<?php get_template_part( 'partials/teasertext-block' );	?>

							<?php elseif( get_row_layout() == 'gallery_block' ):  ?>

								<?php get_template_part( 'partials/gallery-block' );	?>

							<?php elseif( get_row_layout() == 'table_block' ):  ?>

								<?php get_template_part( 'partials/table-block' );	?>

							<?php elseif( get_row_layout() == 'list_block' ):  ?>

								<?php get_template_part( 'partials/list-block' ); ?>

							<?php elseif( get_row_layout() == 'downloads_block' ):  ?>

								<?php get_template_part( 'partials/downloads-block' ); ?>

							<?php endif; ?>
				<?php
				    endwhile;
				  else :
				    // no layouts found
				  endif;
				?>

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
			<div class="col-md-12">
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</div>
		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
