<?php

/*------------------------------------*\
    Partial for ACF get_row_layout() == 'gallery_block'
\*------------------------------------*/

  $images = get_sub_field('gallery');
  $count = count($images);

  $image_classes = compare_array_count_to_params($images, 'col-xs-12 col-sm-12 col-md-12', 'col-xs-12 col-sm-6 col-md-6', 'col-xs-12 col-sm-12 col-md-4', 'col-xs-12 col-sm-6 col-md-3');

  if( $images ): ?>

    <ul class="row img-list">
      <?php foreach( $images as $image ): ?>
        <li class="<?php echo $image_classes; ?>">
          <a href="<?php echo $image['url']; ?>" class="thumbnail">
               <img src="<?php echo $image['sizes'][compare_array_count_to_params($images, 'large', 'medium', 'small')]; ?>" alt="<?php echo $image['alt']; ?>" />
          </a>
          <p><?php echo $image['caption']; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

  <?php endif;

?>