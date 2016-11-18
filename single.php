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

				<?php

					if ( have_rows('flexible_post_content') ):

						// loop through the rows of data
						while ( have_rows('flexible_post_content') ) : the_row(); ?>

							<?php if( get_row_layout() == 'textfield_block' ): ?>

								<?php the_sub_field('textfield'); ?>

							<?php elseif( get_row_layout() == 'teasertext_block' ):  ?>

								<p class="lead"><?php the_sub_field('teasertext', false, false); ?></p>

							<?php elseif( get_row_layout() == 'gallery_block' ):  ?>

								<?php

									$images = get_sub_field('gallery');

									if( $images ): ?>
								    <ul class="row img-list">
								        <?php foreach( $images as $image ): ?>
								            <li class="col-xs-12 col-sm-6 col-md-3">
								                <a href="<?php echo $image['url']; ?>" class="thumbnail">
								                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
								                </a>
								                <p><?php echo $image['caption']; ?></p>
								            </li>
								        <?php endforeach; ?>
								    </ul>
									<?php endif; ?>

							<?php elseif( get_row_layout() == 'table_block' ):  ?>

								<?php
									$heading = get_sub_field('table_heading');
									$rows = get_sub_field('table');

									// count columns of repeaterfield 'table' for colspan
									$count = count($rows[0]);

									if($rows)
									{
										echo '<table class="table table-hover">';
										echo '<th colspan="' . $count . '">' . $heading . '</th>';
										foreach($rows as $row)
										{
											echo '<tr>
												<td>' . $row['facts_key'] . '</td><td>' . $row['facts_value'] .'</td></tr>';
										}

										echo '</table>';
									}
								?>

							<?php elseif( get_row_layout() == 'list_block' ):  ?>

								<?php
									$heading = get_sub_field('list_heading');
									$rows = get_sub_field('list');

									if($rows)
									{
										if ($heading) {
											echo '<h3>' . $heading . '</h3>';
										}
										echo '<ul>';

										foreach($rows as $row)
										{
											echo '<li>' . $row['list_element'] . '</li>';
										}

										echo '</ul>';
									}
								?>

							<?php elseif( get_row_layout() == 'downloads_block' ):  ?>

								<?php $file = get_sub_field('download_link'); ?>

<!-- 								<table class="table">
									<tr>
										<th>Downloads</th>
									</tr>
									<tr>
										<td><?php the_sub_field('download_text'); ?></td>
										<td><a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a></td>
									</tr>
								</table> -->

								<?php
									$heading = get_sub_field('downloads_heading');
									$rows = get_sub_field('downloads');

									// count columns of repeaterfield 'table' for colspan
									$count = count($rows[0]);

									if($rows)
									{
										echo '<table class="table table-hover">';
										echo '<th colspan="' . $count . '">' . $heading . '</th>';
										foreach($rows as $row)
										{
											echo '<tr>
												<td>' . $row['downloads_link_text'] . '</td><td><a href="' . $row['downloads_link']['url'] . '">' . $row['downloads_link']['filename'] . '</a></td></tr>';
										}

										echo '</table>';
									}
								?>

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
