<?php

/*------------------------------------*\
    Partial for ACF get_row_layout() == 'gallery_block'
\*------------------------------------*/

  $images = get_sub_field('gallery');
  $count = count($images);

  $image_classes_array = array(
    0 => "col-xs-12 col-sm-12 col-md-12",
    1 => "col-xs-12 col-sm-6 col-md-6",
    2 => "col-xs-12 col-sm-12 col-md-4",
    3 => "col-xs-12 col-sm-6 col-md-3"
  );

  $image_sizes_array = array('large', 'medium', 'small');

  $image_classes = compare_array_count_to_params($images, $image_classes_array);

  if( $images ): ?>

    <ul class="row img-list">
      <?php foreach( $images as $image ): ?>
        <li class="<?php echo $image_classes; ?>">
          <a href="<?php echo $image['url']; ?>" class="thumbnail">
               <img src="<?php echo $image['sizes'][compare_array_count_to_params($images, $image_sizes_array)]; ?>" alt="<?php echo $image['alt']; ?>" />
          </a>
          <p><?php echo $image['caption']; ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

  <?php endif;

?>