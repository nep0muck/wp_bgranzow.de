<?php

/*------------------------------------*\
    Partial for ACF get_row_layout() == 'table_block'
\*------------------------------------*/

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
        <td class="col-md-3">' . $row['facts_key'] . '</td><td class="col-md-9">' . $row['facts_value'] .'</td></tr>';
    }

    echo '</table>';
  }

?>