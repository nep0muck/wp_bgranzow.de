<?php

/*------------------------------------*\
    Partial for ACF get_row_layout() == 'list_block'
\*------------------------------------*/

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