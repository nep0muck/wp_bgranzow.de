<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
      <div class="row">
        <div class="col-md-12">
    			<h1><?php _e( 'Tag Archive: ', 'html5blank' ); echo single_tag_title('', false); ?></h1>
        </div>
      </div>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
