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
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail(array(1100,300)); // Declare pixel size you need inside the array ?>
          </a>
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
        <span class="divider">&#8226;</span>
        <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
        <?php if ( current_user_can('edit_posts') ) { echo '<span class="divider">&#8226;</span>'; } ?>
        <?php edit_post_link(); ?>
      </div><!-- .entry-meta -->

      <!-- post title -->
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>
      <!-- /post title -->

      <?php the_content( __( 'Continue reading')); ?>
    </div>
    <!--
    <footer class="entry-meta col-md-12">
      <?php edit_post_link(); ?>
    </footer><!-- .entry-meta -->

  </article>
  <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

  <!-- article -->
  <article>
    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
  </article>
  <!-- /article -->

<?php endif; ?>
