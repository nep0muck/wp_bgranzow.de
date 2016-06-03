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
				<div class="col-md-12">
					<h2 class="entry-title">
						<?php the_title(); ?>
					</h2>

					<?php the_content(); ?>

					<?php edit_post_link(); ?>
				</div>
			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>
				<div class="col-md-12">
					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
				</div>
			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
